<?
session_start(); ob_start();

/*echo "<pre>";
print_r($_POST);
echo "</pre>";
exit();*/

if($_SESSION["login"] == "validuser") {
	include("../common/config.inc.php"); 
	include("../common/function.php");
	$matrimony=new matrimony();

	if($_POST['del']=='Delete')	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" where Interest_msgid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_interest','DELETE',$condition,''); }
	header("Location:ManageInterest.php"); 	}

	if($_POST['verify']=='Verify') {
	if($_POST['ad']=='')
	{
	$condition=" cs_VerifiedStatus='Y' where Interest_msgid='".$_POST['Id']."'";
	$matrimony->switchqry('tm_interest','UPDATE',$condition,'');	
	}
	else
	{
    $count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" cs_VerifiedStatus='Y' where Interest_msgid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_interest','UPDATE',$condition,''); }}
	header("Location:ManageInterest.php"); }
	
	if($_POST['active']=='Active') {
	if($_POST['ad']=='')
	{
	$condition=" Interest_Cstatus='A' where Interest_msgid='".$_POST['Id']."'";
	$matrimony->switchqry('tm_interest','UPDATE',$condition,''); 	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Interest_Cstatus='A' where Interest_msgid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_interest','UPDATE',$condition,''); } }
	header("Location:ManageInterest.php"); }
	
	if($_POST['pending']=='Pending') {
	if($_POST['ad']=='')
	{
	$condition=" Interest_Cstatus='P' where Interest_msgid='".$_POST['Id']."'";
	$matrimony->switchqry('tm_interest','UPDATE',$condition,'');	
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Interest_Cstatus='P' where Interest_msgid='".$_POST['ad'][$i]."'";  //echo $condition;
	$matrimony->switchqry('tm_interest','UPDATE',$condition,'');} }
	header("Location:ManageInterest.php"); }
	
	if($_POST['suspend']=='Blocked')
	{ 
	if($_POST['ad']=='')
	{
	$condition=" Interest_Cstatus='B' where Interest_msgid='".$_POST['Id']."'";
	$matrimony->switchqry('tm_interest','UPDATE',$condition,'');
	}
	else
	{
	$count=count($_POST['ad']);
	for($i=0;$i<$count;$i++)
	{ $condition=" Interest_Cstatus='B' where Interest_msgid='".$_POST['ad'][$i]."'";
	$matrimony->switchqry('tm_interest','UPDATE',$condition,''); }}
	header("Location:ManageInterest.php"); }

	if($_REQUEST['action']=='update') { 
		$condition=" Message_Subject='".$_POST['subject']."',Message_Content='".$_POST['mcontent']."',Message_DOM=now() where Messages_ID='".$_POST['mid']."'";
		$matrimony->switchqry('tm_interest','UPDATE',$condition,'');
		header("Location:ManageInterest.php"); }

	if($_REQUEST['action']=='delete') { 
		$condition=" where Messages_ID='".$_POST['mid']."'";
		$matrimony->switchqry('tm_interest','DELETE',$condition,'');
		header("Location:ManageInterest.php"); }

	if($_POST['submit_list'] == '1') { 
//$cs_IDList=$classifieds->generateautoId('tm_AutoID','tm_family','BSH');
//Profile_ID, To_profileId, Message_Subject, Message_Content, Message_Status, Message_Cstatus, Message_DOC, Message_DOA, Message_DOM, Messages_ID
	 $InsertValues= "'".$_POST['pid']."','".$_POST['ddlFvalue']."','".$_POST['ddlFvalueType']."','".$_POST['ddlFStatus']."','".$_POST['ddlFOcc']."','".$_POST['ddlMOcc']."','".$_POST['noofBros']."','".$_POST['noofSis']."','".$_POST['noofBrosM']."','".$_POST['noofSisM']."','".$_POST['description']."'";
	$matrimony->switchqry('tm_family','INSERT','',$InsertValues);
	header("Location:ManageFamily.php");
	} 
}
else { header("Location:index.php"); }		
?>
