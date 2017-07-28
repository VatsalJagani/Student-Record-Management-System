<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php

if(isset($_POST['what_select']) && isset($_POST['find_by']))
{
	try{
		switch($_POST['find_by']){
			case 'gender':{
				$val=$_POST['gender'];
				break;
				}
			case 'cast':{
				$val=$_POST['cast'];
				break;
				}
			case 'bank':{
				$val=$_POST['bank_no'];
				break;
				}
			case 'apl_bpl':{
				$val=$_POST['apl_bpl'];
				break;
				}
			case 'std':{
				$val=$_POST['std'];
				break;
				}
			default:{
				$val=$_POST['value'];
				break;
			}
		}
		header('location:list.php?f=1&find='.$_POST['find_by'].'&current='.$_POST['what_select'].'&value='.$val);
	}
	catch(Exception $ex){
		header("location:find.php?msg=Internal error occured, Retry later.");
	}
}
else{
	header("location:find.php?msg=please select paramenter to find student.");
}
?>
