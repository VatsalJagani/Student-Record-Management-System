<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php
if(isset($_POST['sid']))
{
	$temp=0;
    try{
        
        $sql='delete from gr_list where sid=?';
        $query=$dbhandler->prepare($sql);
        $r=$query->execute(array($_POST['sid']));
		$s='delete from students where sid=?';
        $q=$dbhandler->prepare($s);
        $q->execute(array($_POST['sid']));
		$temp=1;
        header("location:students.php?msg=student has been deleted and ".$r." General Register entry related to student is also deleted");
    } catch (Exception $ex) {
        if($temp==0){
            header("location:details.php?msg=We are unable to delete student rigth now try again later.&sid=".$_POST['sid']);
        }
    }    
}
else{
    header("location:students.php?msg=please select any student before access page.");
}
?>
