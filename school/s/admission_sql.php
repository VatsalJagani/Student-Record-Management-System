<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php

if(isset($_POST['gr_no']) && isset($_POST['admission_date']) && isset($_POST['std']))
{
    $msg='';
    
        $temp=0;
        try{
			$sql="insert into gr_list (sid,gr_no,admission_date,std) values (?,?,?,?)";
			
			$query=$dbhandler->prepare($sql);
            
			$admission_date=0;
			if($_POST['admission_date']!=''){
				$admission_date=$_POST['admission_date'];
			}
			
			$std=0;
			if($_POST['std']!='-1'){
				$std=$_POST['std'];
			}
			$r=$query->execute(array($_GET['sid'],$_POST['gr_no'],$admission_date,$std));
        }
        catch(PDOException $e){
                $msg='GR no. may be duplicated, please check again..!';
                $temp=1;
                header("location:admission.php?msg=".$msg);
        }
        if($temp == 0){
            header("location:details.php?msg=Student is successfully added&gr_no=".$_POST['gr_no']);
        }
}
else {
        header("location:admission.php?msg=FILL REQUIRED DETAILS");
    }

?>
