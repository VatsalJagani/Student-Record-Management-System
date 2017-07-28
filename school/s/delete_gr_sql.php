<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php
if(isset($_POST['gr_no']))
{
	$temp=0;
    try{
        
        $sql='delete from gr_list where gr_no=?';
        $query=$dbhandler->prepare($sql);
        $r=$query->execute(array($_POST['gr_no']));
		if($r!=0){
			$temp=1;
			header("location:students.php?msg=General Register entry GR:".$_POST['gr_no']." has deleted");
		}
    } catch (Exception $ex) {
        if($temp==0){
            header("location:details.php?msg=We are unable to delete student rigth now try again later.&gr_no=".$_POST['gr_no']);
        }
    }    
}
else{
    header("location:students.php?msg=please select any student before access page.");
}
?>
