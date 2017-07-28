<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php 
if(isset($_POST['gr_no']) && isset($_POST['school_leaving_date']))     // check proper condition
{
	try{
		$gr_no=$_POST['gr_no'];
		$qk=$dbhandler->prepare('select * from gr_list where gr_no=?');
		$qk->execute(array($gr_no));
		$rr=$qk->fetch();
		if($rr==null)
		{
			header("location:leave_school.php?msg=We are unable to find student.");
		}
		else{
			$sql="update gr_list set school_leaving_date='". $_POST['school_leaving_date'] ."' where gr_no=".$_POST['gr_no'];
            $query=$dbhandler->query($sql);
			$temp=1;
			header("location:details.php?msg=successful leaving date saved&gr_no=".$_POST['gr_no']);
		}
	}
	catch(PDOException $e){
		if($temp==0){
			header("location:leave_school.php?msg=student not found&gr_no=".$_POST['gr_no']);
		}
	}
}
else {
        header("location:leave_school.php?msg=FILL REQUIRED DETAILS&gr_no=".$_POST['gr_no']);
}

?>
