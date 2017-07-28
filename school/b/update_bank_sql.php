<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php 
if(!isset($_GET['bank_no'])){
	header("location:bank_details.php?msg=select bank for update details");
}
else if(isset($_POST['bank_name']) && isset($_POST['place']))
{
    $msg='';
    
        $temp=0;
        try{
            $sql="update banks set bank_name=?,place=? where bank_no=?";
            $query=$dbhandler->prepare($sql);
            
			$r=$query->execute(array($_POST['bank_name'],$_POST['place'],$_GET['bank_no']));
        }
        catch(PDOException $e){
                $msg=$e->getMessage();
                $temp=1;
                header("location:update_bank.php?msg=".$msg."&bank_no=".$_GET['bank_no']);
        }
        if($temp == 0){
            header("location:bank_details.php?msg=Bank ".$_POST['bank_name']." with bank no. ".$_GET['bank_no']." is successfully updated");
        }
}
else {
        header("location:update_bank.php?msg=FILL REQUIRED DETAILS&bank_no=".$_GET['bank_no']);
    }

?>
