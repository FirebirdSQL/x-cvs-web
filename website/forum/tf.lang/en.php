<?php

#
# txtForum 0.7.x language file
# ============================
# By:    Lauri Kasvandik, <lauri_k@mail.ru>
# Date:  15.06.2003 - 27.06.03
#
# Notes: Because English is not my mother-tongue, it may contain grammatical
#        errors. If You find any, please let me know so i can correct them!
#
#        If You need to add in to some string apostrophe (' - upper comma), 
#        then use such combo: \'
#

# language name in your own language
$l['LANG'] = 'English';

# language name in english
$l['LANG_E'] = 'English';

# html encoding. if you dont know your language encoding then try if it works 
# with this value then is all ok. But if it dosen't work then You should seek
# this value from some webpage from your country. Or ask from somebody..
# (in beginning of html file is such line:
# <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />)

$l['ENCODING'] = 'iso-8859-1';


# General
$l['Board_name'] = 'Board name';
$l['Default'] = 'Default';
$l['Name'] = 'Name';
$l['Description'] = 'Description';
$l['Url'] = 'Web address';
$l['Text'] = 'Text';
$l['Image'] = 'Image';
$l['Username'] = 'Username';
$l['Password'] = 'Password';
$l['Language'] = 'Language';
$l['Template'] = 'Template';
$l['Forums'] = 'Forums';
$l['Postings'] = 'Postings';
$l['Views'] = 'Views';
$l['Subject'] = 'Subject';
$l['Topic'] = 'Topic';
$l['Topics'] = 'Topics';
$l['Replies'] = 'Replies';
$l['Topic_start'] = 'Topic Start';
$l['Topic_starter'] = 'Topic Starter';
$l['Last_post'] = 'Last post';
$l['Last_poster'] = 'Last poster';
$l['Pages'] = 'Pages';
$l['Re'] = 'Re: '; # abbreviation from Reply
$l['Sticky'] = 'Sticky';
$l['Members'] = 'Members';
$l['Posting_icon'] = 'Posting icon';
$l['Icon'] = 'Icon';
$l['Anonymous'] = 'Anonymous';
$l['Author'] = 'Author';

# Email stuff...
$l['Email'] = 'Email';
$l['At'] = 'at'; # spelled "@"-mark (Alt + 64, NumLock should work ;-)
$l['Point'] = 'point'; # spelled "."
$l['Unknown'] = 'Unknown';

# buttons
$l['Submit'] = 'Submit';
$l['Reset'] = 'Reset';
$l['Login'] = 'Login';
$l['Logout'] = 'Logout';
$l['Back'] = 'Back';
$l['Move'] = 'Move';
$l['Delete_selected'] = 'Delete selected topics';

# links etc...
$l['New_topic'] = 'New topic';
$l['Reply'] = 'Reply';
$l['Quote'] = 'Reply with quote';
$l['Profile'] = 'Profile';
$l['Modify'] = 'Modify';
$l['Delete'] = 'Delete';
$l['Up'] = 'Up';
$l['Down'] = 'Down';
$l['Registration'] = 'Create Account';
$l['Register'] = "Register";
$l['Disable_smileys'] = 'Disable smileys in message';
$l['Select_forum'] = 'Select a forum';
$l['Hop_to'] = 'Hop to:';
$l['Make_sticky'] = 'Sticky';
$l['Make_unsticky'] = 'Unsticky';
$l['Delete_all_topics'] = 'Delete all topics';
$l['Lock_topic'] = 'Lock';
$l['Unlock_topic'] = 'Unlock';
$l['No_icon'] = 'No icon';
$l['View_img'] = 'View in original location';
$l['Remember_me'] = 'Remember me';

# User profile/adding/modifing
$l['Reg_info'] = 'Registration info';
$l['Profile_info'] = 'Profile info';
$l['Preferences'] = 'Preferences';
$l['Short_description'] = 'Short description';
$l['Avatar'] = 'Avatar';
$l['Choose_avatar'] = 'Choose Avatar';
$l['Msn'] = 'MSN';
$l['Homepage'] = 'Homepage';
$l['Location'] = 'Location';
$l['Occupation'] = 'Occupation';
$l['Signature'] = 'Signature';
$l['Create_admin'] = 'Now we create new admin user account';
$l['Current_user'] = 'Current user';
$l['Admin'] = 'Administrator';
$l['Mode'] = 'Moderator';	// there is moderator usergroup bat actual benefits for this group havent yet added

# Online users
$l['Moment_online_users'] = 'At the moment there are online';
$l['User'] = 'user';
$l['Users'] = 'users';
$l['Guest'] = 'guest';
$l['Guests'] = 'guests';
$l['Total'] = 'total';
$l['And'] = 'and';
$l['Or'] = 'or';
$l['Total_users'] = 'Total registrered users';
$l['Newest_user'] = 'Newest user';

# BBcode strings
$l['Bb_code'] = 'BB-Code';
$l['Bold'] = 'Bold';
$l['Underline'] = 'Underiline';
$l['Italic'] = 'Italic';
$l['Quotation'] = 'Quotation';
$l['Codesnippet'] = 'Code snippet';
$l['Php_code'] = 'PHP code';
$l['Colored_text'] = 'Colored text';
$l['Big_text'] = 'Big text';
$l['Small_text'] = 'Small text';
$l['Text_size'] = 'Text size';

# Error messages
$l['Error'] = 'Error';
$l['Unable_write_file'] = 'Unable to write file';
$l['Chmod_datadir'] = 'Check that datadir (default "./tf.data/") is CHMOD-ed -&gt; 777 and all files inside it -&gt; 666';
$l['Rtfm'] = 'For more info read the fine manual (<a href="./tf.doc/readme.htm">/tf.doc/readme.htm</a>)';
$l['Unable_load_template'] = 'Unable to load template';
$l['Unallowed_chars'] = 'One or more field contains unallowed chars';
$l['Missing_password'] = 'Missing password';
$l['Missing_username'] = 'Missing username';
$l['Missing_cat_name'] = 'Missing category name';
$l['Missing_board_name'] = 'Missing board name';
$l['Missing_subject'] = 'Missing subject';
$l['Missing_content'] = 'Missing posting content';
$l['At_least_n_chars'] = 'At least %s chars';
$l['No_topics_selected'] = 'No topics selected';
$l['No_forum_selected'] = 'No forum selected';
$l['Incorrect_email'] = 'Incorrect email';
$l['Incorrect_username'] = 'Incorrect username or password';
$l['Incorrect_avatar_type'] = 'Incorrect avatar type';
$l['Username_exists'] = 'There already exists such username';
$l['User_not_exists'] = 'There aren\'t such user';
$l['Not_for_your_eyes'] = 'Not for Your eyes, my friend!';
$l['Only_admin_can_post'] = 'Only admin and moderators can start new thread in this category';
$l['Only_users_can_post'] = 'Only registrered users can post in this category';
$l['Only_users_can_read'] = 'Only registrered users can read in this category';
$l['No_topics'] = 'There are not topics in this category';
$l['Topic_not_found'] = 'Topic not found!  (maybe deleted :´-(';
$l['Please_wait'] = 'You have just posted message. Please wait %s seconds!';
$l['Avatar_is_too_big'] = 'Avatar is too big';
$l['Destination_equal_source'] = 'Destination forum is same as source!';
$l['File_not_found'] = 'File not found';
$l['Dir_not_found'] = 'Directory not found';
$l['Archive_error'] = 'There are no files in archive or it is damaged.';
$l['Thread_is_locked'] = 'This topic is locked for posting';

# Admin & moderator panel settings
$l['Admin_panel'] = 'Admin Control Panel';
$l['Moderator_panel'] = 'Moderator Control Panel';
$l['Forum_main_settings'] = 'Main settings';
$l['Categories_settings'] = 'Categories settings';
$l['Data_backup'] = 'Forums/settings backup';
$l['Add_new_category'] = 'Add new category';
$l['All_pipl_can_read'] = 'All visitors can read';
$l['All_pipl_can_post'] = 'All visitors can post';
$l['Hidden'] = 'Hidden';
$l['Only_admin_can_start_thread'] = 'Only admin can start new thread';
$l['Upgrade'] = 'Upgrade from 0.6.x to 0.7.x';
$l['Archive_name'] = 'Archive name';
$l['Compress'] = 'Compress';
$l['Uncompress'] = 'Uncompress';
$l['Uncompress_dir'] = 'Uncompress dir';
$l['Are_you_sure'] = 'Are You really sure?';
$l['Fix_categories'] = 'Repair categories file';
$l['New_news'] = 'Add News Item';

# help strings
$l['Help_categories'] = 'If there is defined only one category then forum shows automagically postings from this catergory; else shows categories list.';
$l['Help_backup'] = 'Notes: Here You can backup whole forum messages and settings. 
<br>Its useful, when you wish to move forum to another server and as a rule
<br>you may be calm, when you have some fresh backup copies.
<p>YoU can use either tar- or gzip method. Tar method only puts files into
<br>archive without actual compressing (archive goes even bigger because it contains 
<br>files dates, permissions etc), but this method should work with every server. 
<br>Instead gzip compressing ratio is much better but its work only when PHP is 
<br>compiled --with-zlib.';

?>