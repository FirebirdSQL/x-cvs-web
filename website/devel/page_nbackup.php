<?php
if (eregi("page_nbackup.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>NBackup</H4>
Planned for inclusion in Firebird 2.0
<p>
The backup engine comprises two parts:</ul>
<li>NBAK, the engine support module
<li>NBACKUP, the tool that does the actual backups
</ul>
<h5>NBAK</h5>
The functional responsibilities of NBAK are:<ol>
<li> to redirect writes to difference files when asked (ALTER DATABASE BEGIN BACKUP statement)
<li>to produce a GUID for the database snapshot and write it into the database header before the ALTER DATABASE BEGIN BACKUP statement returns
<li>to merge differences into the database when asked (ALTER DATABASE END BACKUP statement)
<li>to mark pages written by the engine with the current SCN [page scan] counter value for the database
<li>to increment SCN on each change of backup state
</ol>

The backup state cycle is:
<blockquote>
nbak_state_<b>normal</b> -> nbak_state_<b>stalled</b> -> nbak_state_<b>merge</b> -> nbak_state_<b>normal</b>
</blockquote>
<ul type=square>
<li>In <b>normal</b> state writes go directly to the main database files.
<li>In <b>stalled</b> state writes go to the difference file only and the main files are read only.
<li>In <b>merge</b> state new pages are not allocated from difference files.
Writes go to the main database files.
Reads of mapped pages compare both page versions and return the version which is fresher, because we don't know if it is merged or not.
</ul>
This merge state logic has one quirky part.  Both Microsoft and Linux define the contents of file growth as &quot;undefined&quot;
i.e., garbage, and both zero-initialize them. <p>
This is why we don't read mapped pages beyond the original end of the main database file and keep them
current in difference file until the end of a merge.  This is almost half of nbak fetch and write logic, tested by
using modified PIO on existing files containing garbage.

<h5>NBACKUP</h5>
The functional responsibilities of NBACKUP are<ol>
<li>to provide a convenient way to issue ALTER DATABASE BEGIN/END BACKUP
<li>to fix up the database after filesystem copy (physically change nbak_state_diff to nbak_state_normal in the database header)
<li>to create and restore incremental backups.<br>
Incremental backups are multi-level. That means if you do a Level 2 backup every day and a Level 3 backup every hour, 
each Level 3 backup contains all pages changed from the beginning of the day till the hour when the Level 3 backup is made.
</ol>
Creating incremental backups has the following algorithm:<ol>
<li>Issue ALTER DATABASE BEGIN BACKUP to redirect writes to the difference file
<li>Look up the SCN and GUID of the most recent backup at the previous level 
<li>Stream database pages having SCN larger than was found at step 2 to the backup file. 
<li>Write the GUID of the previous-level backup to the header, to enable the consistency of the backup chain to be 
checked during restore.
<li>Issue ALTER DATABASE END BACKUP
<li>Add a record of this backup operation to RDB$BACKUP_HISTORY. 
Record current level, SCN, snapshot GUID and some miscellaneous stuff for user consumption.
</ol>
<h5>Restore</h5>
Restore is simple:  we reconstruct the physical database image for the chain of backup files,
 checking that the backup_guid of each file matches prev_guid of the next one,
 then fix it up (change its state in header to nbak_state_normal).
<p>
<i>Nickolay Samofatov</i>
<br>&nbsp;


