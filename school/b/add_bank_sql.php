<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php 
if(isset($_POST['bank_name']) && isset($_POST['place']))
{
    $msg='';
    
        $temp=0;
        try{
            $sql="insert into banks (bank_name,place) values(?,?)";
            $query=$dbhandler->prepare($sql);
            
			$r=$query->execute(array($_POST['bank_name'],$_POST['place']));
        }
        catch(PDOException $e){
                $msg=$e->getMessage();
                $temp=1;
                header("location:add_bank.php?msg=".$msg);
        }
        if($temp == 0){
            header("location:bank_details.php?msg=Bank ".$_POST['bank_name']." at ".$_POST['place']." is successfully added");
        }
}
else {
        header("location:update_bank.php?msg=FILL REQUIRED DETAILS");
}

?>
