<?php
global $admin;
if ($index == 1) {
    echo "<td>&nbsp;</td><td valign=\"top\" width=150>";
    bigstory();
    pollNewest();
    loginbox();
    oldNews($storynum);
    rightblocks();
    ephemblock();
    headlines();
}
echo "</td></tr></table></td></tr></table>";
footmsg();
?>