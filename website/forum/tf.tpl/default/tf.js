/*

	JavaScript Functions For txtForum 0.7.0 by Lauri Kasvandik

*/

function add2post(str)
{
	document.posting.posting_content.value += str;
}

function change_forum()
{	
	fid = document.hopform.forums_list.value;
	//document.write (document.location.pathname)
	if (fid != -1)
	{
		url='index.php?action=topics&fid=' + fid;
		parent.location.href = url;
	}
}