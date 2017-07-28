<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>

<?php
	try{
		if(isset($_GET['sid']) && isset($_GET['gr_no']))
		{
			header("location:students.php?msg=Try in straight forward way.");
		}
		else if(isset($_GET['sid'])){
			$sid=$_GET['sid'];
			$query=$dbhandler->prepare('select * from students where sid=?');
			$query->execute(array($sid));
			$r=$query->fetch();
			if($r==null)
			{
				header("location:students.php?msg=We are unable to find student.");
			}
			else{
				$q=$dbhandler->query('select * from banks where bank_no='.$r['bank_no']);
				$b=$q->fetch();
			}
		}
		else if(isset($_GET['gr_no'])){
			$gr_no=$_GET['gr_no'];
			$qk=$dbhandler->prepare('select * from gr_list where gr_no=?');
			$qk->execute(array($gr_no));
			$rr=$qk->fetch();
			if($rr==null)
			{
				header("location:students.php?msg=We are unable to find student.");
			}
			else{
				$query=$dbhandler->prepare('select * from students where sid=?');
				$query->execute(array($rr['sid']));
				$r=$query->fetch();
				if($r==null)
				{
					header("location:students.php?msg=We are unable to find student.");
				}
				else{
					$q=$dbhandler->query('select * from banks where bank_no='.$r['bank_no']);
					$b=$q->fetch();
				}
			}
		}
		else{
			header("location:students.php?msg=Please select any student.");
		}
	}
	catch(Exception $ex){
		header("location:students.php?msg=We are unable to find student.");
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Details</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, view student"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
		<script src="../styles/jquery.js"></script>
		<style>
		form div{
			margin:3px;
		}
		</style>
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			<li><a href="students.php">All student Details</a></li>
			<li><a href="find.php">Find Student</a></li>
			<li><a class="w3-green" href="#">Student Details</a></li>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="std_upgrade.php">Mass STD updation</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<table class="w3-table w3-card-4">
				<tr>
					<th class="w3-teal" colspan="2" style="text-align:center">Student's Details</th>
				</tr>
				
				<tr>
					<th class="w3-grey" colspan="2">Personal Details</th>
				</tr>
				<tr>
					<td style="text-align:right">Student Name : </td>
					<td><input type="text" class="w3-input" name="name" title="Students full name" disabled value="<?php echo $r['name']; ?>" /></td>
				</tr>
				<tr>
					<td style="text-align:right">Gender : </td>
					<td><input type="text" class="w3-input" name="gender" title="Gender" disabled value="<?php echo $r['gender']; ?>" /></td>
				</tr>
				<tr>
					<td style="text-align:right">Birthdate : </td>
					<td><input type="date" class="w3-input" name="birthdate" title="Birthdate of student" disabled value="<?php echo $r['birthdate']; ?>" /></td>
				</tr>
				<tr>
					<td style="text-align:right">Mother Name : </td>
					<td><input type="text" class="w3-input" name="mother_name" title="Student's mother's name" disabled value="<?php echo $r['mother_name']; ?>" /></td>
				</tr>
				<tr>
					<td style="text-align:right">Aadhar no. : </td>
					<td><input type="text" class="w3-input" name="aadhar_no" title="Student's aadhar card no" disabled value="<?php echo $r['aadhar_no']; ?>"  /></td>
				</tr>
				<tr>
					<td style="text-align:right">Cast : </td>
					<td><input type="text" class="w3-input" name="cast" pattern="[0-9]{12}" title="Student's aadhar card no" disabled value="<?php echo $r['cast']; ?>"  /></td>
				</tr>
				<tr>
					<td style="text-align:right">UID No. : </td>
					<td><input type="text" class="w3-input" name="uid_no" title="Student's UID no" disabled value="<?php echo $r['uid_no']; ?>"  /></td>
				</tr>
				
				<tr>
					<td style="text-align:right">Parent's contact no. : </td>
					<td><input type="text" class="w3-input" name="contact_no" title="Parent's mobile number" disabled value="<?php echo $r['contact_no']; ?>"  /></td>
				</tr>
				<tr>
					<td style="text-align:right">Rashan no. : </td>
					<td><input type="text" class="w3-input" name="rashan_no" title="Rashan no" disabled value="<?php echo $r['rashan_no']; ?>"  /></td>
				</tr>
				<tr>
					<td style="text-align:right">APL / BPL : </td>
					<td><input type="text" class="w3-input" name="apl_bpl" title="APL or BPL" disabled value="<?php echo $r['apl_bpl']; ?>" /></td>
				</tr>
				
				
				<tr>
					<td style="text-align:right">Bank : </td>
					<td><input type="text" class="w3-input" name="bank" title="Student's bank details"  disabled value="<?php echo $b['bank_name']; ?>  <?php echo $b['place']; ?>"  /></td>
				</tr>
				<tr>
					<td style="text-align:right">Bank a/c no. : </td>
					<td><input type="text" class="w3-input" name="bank_ac_no" title="Bank a/c number" disabled value="<?php echo $r['bank_ac_no']; ?>"  /></td>
				</tr>
				<tr>
					<td style="text-align:center;padding:15px;"><a href="add_student.php?sid=<?php echo $r['sid']; ?>" class="w3-btn w3-light-blue">Update</a></td>
					<td style="text-align:center;padding:15px;"><a class="w3-btn w3-red" onclick="deleteStudent(<?php echo $r['sid']; ?>)">Delete</a></td>
				</tr>
				
				
				<?php if(isset($_GET['gr_no'])){ ?>
				<tr>
					<th class="w3-grey" colspan="2">General Register Details</th>
				</tr>
				
				<tr>
					<td style="text-align:right">GR no. : </td>
					<td><input type="text" class="w3-input" name="gr_no" title="Student's GR no." disabled value="<?php echo $rr['gr_no']; ?>"  /></td>
				</tr>
				<tr>
					<td style="text-align:right">School Admission Date : </td>
					<td><input type="date" class="w3-input" name="admission_date" title="school admission date" disabled value="<?php echo $rr['admission_date']; ?>" /></td>
				</tr>
				<tr>
					<td style="text-align:right">STD : </td>
					<td><input type="text" class="w3-input" name="std" title="std" disabled value="<?php echo $rr['std']; ?>" /></td>
				</tr>
				<?php if($rr['school_leaving_date']!=null){ ?>
				<tr>
					<td style="text-align:right">School Leaving Date : </td>
					<td><input type="date" class="w3-input" name="school_leaving_date" title="school leaving date" disabled value="<?php echo $rr['school_leaving_date']; ?>" /></td>
				</tr>
				<tr>
					<td style="text-align:center;padding:15px;"><a href="admission.php?sid=<?php echo $rr['sid']; ?>" class="w3-btn w3-light-blue">Join School Again School</a></td>
				<?php }else{ ?>
				<tr>
					<td style="text-align:center;padding:15px;"><a href="leave_school.php?gr_no=<?php echo $rr['gr_no']; ?>" class="w3-btn w3-light-blue">Leave School</a></td>
				<?php }	?>
					<td style="text-align:center;padding:15px;"><a class="w3-btn w3-red" onclick="deleteGR(<?php echo $rr['gr_no']; ?>)">Delete General Register Entry</a></td>
				</tr>
				<?php }	?>		
			</table>
		</div>
	<?php include "../styles/files/footer.php"; ?>
	
	<div id="delStudent" class="w3-modal">
		<div class="w3-modal-content w3-animate-top w3-card-8">
			<header class="w3-teal" style="padding-left:10px;padding-right:10px;">
			  <span onclick="document.getElementById('delStudent').style.display='none'"
			  class="w3-closebtn">&times;</span>
			  <h2>Deleting Student will also delete all General Register entries with this student</h2>
			</header>
			<div class="w3-container">
			<form class="w3-container" action="delete_student_sql.php" method="post">
				Student Name. : <input id="name_d" name="name" class="w3-margin-top" type="text" disabled />
				<input id="sid_d" name="sid" class="w3-margin-top" type="hidden" />
				<div class=" w3-center "><input class="w3-btn w3-red" type="submit" value="Confirm Delete" style="margin:5px;"/></div>
			</form>
			</div>
		</div>
	</div>
	<div id="delGR" class="w3-modal">
		<div class="w3-modal-content w3-animate-top w3-card-8">
			<header class="w3-teal" style="padding-left:10px;padding-right:10px;">
			  <span onclick="document.getElementById('delGR').style.display='none'"
			  class="w3-closebtn">&times;</span>
			  <h2>Confirm To Delete General Register Entry</h2>
			</header>
			<div class="w3-container">
			<form class="w3-container" action="delete_gr_sql.php" method="post">
				Student GR no. : <input id="gr_d" class="w3-margin-top" type="text" disabled />
				<input id="gr_d2" name="gr_no" class="w3-margin-top" type="hidden" />
				<div class=" w3-center "><input class="w3-btn w3-red" type="submit" value="Confirm Delete" style="margin:5px;"/></div>
			</form>
			</div>
		</div>
	</div>
</body>

	<script>
		function deleteStudent(sid){
			document.getElementById("delStudent").style.display='block';
			document.getElementById("sid_d").value=sid;
			document.getElementById("name_d").value='<?php echo $r['name']; ?>';
		}
		function deleteGR(gr_no){
			document.getElementById("delGR").style.display='block';
			document.getElementById("gr_d").value=gr_no;
			document.getElementById("gr_d2").value=gr_no;
		}
	</script>
</html>

<?php
	/* displaying student personal information */
	function load_sid($sid){
		
	}
	
	/* displaying student GR-List information optionally */
	function load_gr($gr_no,$sid){
		load_sid($sid);
		
	}
?>