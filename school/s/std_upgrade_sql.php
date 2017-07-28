<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php

if(isset($_POST['all']))
{
	try{	
		switch($_POST['all']){
			case "1":{
				$sql1="update gr_list set std=std+1 where school_leaving_date is null and std!=8";
				$query1=$dbhandler->query($sql1);
				
				$sql2="update gr_list set school_leaving_date=? where std=8 and school_leaving_date is null";
				$query2=$dbhandler->prepare($sql2);
				$r2=$query2->execute(array($_POST['school_leaving_date']));
				break;
			}
			case "0":{
				$sql="update gr_list set std=? where std=? and school_leaving_date is null";
				$query=$dbhandler->prepare($sql);
				$r=$query->execute(array($_POST['std_to'],$_POST['std_from']));
				break;
			}
		}
		header('location:std_upgrade.php?msg=Operation Successfully commpleted. ');
	}
	catch(Exception $ex){
		header("location:std_upgrade.php?msg=Internal error occured, Retry later.".$ex->getMessage());
	}
}
else{
	header("location:std_upgrade.php?msg=please select paramenter to find student.");
}
?>
