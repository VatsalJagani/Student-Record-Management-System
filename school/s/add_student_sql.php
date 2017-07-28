<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php

if(isset($_POST['name']) && isset($_POST['mother_name']) && isset($_POST['birthdate']) && isset($_POST['cast']))
{
        $temp=0;
        try{
			if(!isset($_POST['sid'])){
				$sql='insert into students (name,mother_name,gender,birthdate,cast,bank_no,bank_ac_no,aadhar_no,uid_no,contact_no,rashan_no,apl_bpl) values (?,?,?,?,?,?,?,?,?,?,?,?)';
			}
			else{
				$s='select * from students where sid=?';
				$q=$dbhandler->prepare($s);
				$q->execute(array($_POST['sid']));
				$r=$q->fetch();
				if($r==null)
				{
					$update=false;
					header("location:students.php?msg=Please select student first.");
				}
				else{
					$update=true;
					$sql='update students set name=?,mother_name=?,gender=?,birthdate=?,cast=?,bank_no=?,bank_ac_no=?,aadhar_no=?,uid_no=?,contact_no=?,rashan_no=?,apl_bpl=? where sid=?';
				}
			}
			
            // direct all name, gender, cast_no
			$bank_no=0;
			$bank_ac_no=0;
			if(isset($_POST['bank_no'])){
				$bank_no=$_POST['bank_no'];
				if($_POST['bank_ac_no']!=''){
					$bank_ac_no=$_POST['bank_ac_no'];
				}
			}
			
			$apl_bpl=0;
			if(isset($_POST['apl_bpl'])){
				$apl_bpl=$_POST['apl_bpl'];
			}
			
			$aadhar_no=0;
			if($_POST['aadhar_no']!=''){
				$aadhar_no=$_POST['aadhar_no'];
			}
			
			//$birthdate=0;
			if($_POST['birthdate']!=''){
				$birthdate=$_POST['birthdate'];
			}
			
			
			$uid_no=0;
			if($_POST['uid_no']!=''){
				$uid_no=$_POST['uid_no'];
			}
			
			$contact_no=0;
			if($_POST['contact_no']!=''){
				$contact_no=$_POST['contact_no'];
			}
			
			$rashan_no=0;
			if($_POST['rashan_no']!=''){
				$rashan_no=$_POST['rashan_no'];
			}
			
			if(!isset($_POST['sid'])){
				$query=$dbhandler->prepare($sql);
				$r=$query->execute(array($_POST['name'],$_POST['mother_name'],$_POST['gender'],$birthdate,$_POST['cast'],$bank_no,$bank_ac_no,$aadhar_no,$uid_no,$contact_no,$rashan_no,$apl_bpl));
				$temp=1;
			}
			else{
				if($update){
					$query=$dbhandler->prepare($sql);
					$r=$query->execute(array($_POST['name'],$_POST['mother_name'],$_POST['gender'],$birthdate,$_POST['cast'],$bank_no,$bank_ac_no,$aadhar_no,$uid_no,$contact_no,$rashan_no,$apl_bpl,$_POST['sid']));
					$temp=1;
				}
				else{
					$temp=0;
				}
			}
        }
        catch(PDOException $e){
                header("location:add_student.php?msg=Data error occured try again..!".$e->getMessage());
				$temp=0;
        }
        if($temp == 1){
			if(isset($_POST['sid'])){
				header("location:details.php?msg=Student details updated successfully&sid=".$_POST['sid']);
			}
			else{
				$sql='select max(sid) as id from students';
				$query=$dbhandler->query($sql);
				if($r=$query->fetch()){
					header("location:admission.php?sid=".$r['id']);
				}
				else{
					header("location:student_details.php?msg=student details added successfully");
				}
			}
        }
}
else {
        header("location:add_student.php?msg=FILL REQUIRED DETAILS");
    }

?>
