<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>

<?php
	if(isset($_GET['sid'])){
		$sql='select * from students where sid=?';
        $query=$dbhandler->prepare($sql);
        $query->execute(array($_GET['sid']));
		$r=$query->fetch();
		if($r==null)
		{
			$update=false;
			header("location:students.php?msg=Student not found.");
		}
		else{
			$update=true;
		}
	}
	else{
		$update=false;
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php if($update){echo 'Update';}else{echo 'Add';} ?> student details</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, add new student"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
		 
		
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			<li><a class="w3-green" href="#"><?php if($update){echo 'Update';}else{echo 'Add';} ?> Student</a></li>
			<li><a href="students.php">Student Details</a></li>
			<li><a href="find.php">Find Student</a></li>
			<li><a href="leave_school.php">Student school leaving</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<form action="add_student_sql.php" method="post">
				<table class="w3-table w3-card-4">
					<tr>
						<th class="w3-teal" colspan="2" style="text-align:center"><?php if($update){echo 'Update';}else{echo 'Add';} ?> Student Details</th>
					</tr>
					
					<tr>
						<th class="w3-grey" colspan="2">Student's Details</th>
					</tr>
					<tr>
						<td style="text-align:right">* Student Name : </td>
						<td><input type="text" class="w3-input" name="name" value="<?php if($update){echo $r['name'];} ?>" title="Students full name" required /></td>
					</tr>
					<tr>
						<td style="text-align:right">* Gender : </td>
						<td><select name="gender" title="gender of student">
						<option value="M" <?php if($update){ if($r['gender'] == 'M'){ echo 'selected'; }} ?> >Male</option>
						<option value="F" <?php if($update){ if($r['gender'] == 'F'){ echo 'selected'; }} ?> >Female</option>
						</select></td>
					</tr>
					<tr>
						<td style="text-align:right">* Birthdate : </td>
						<td><input type="date" name="birthdate" value="<?php if($update){echo $r['birthdate'];} ?>" title="Either select date of date formate(yyyy-mm-dd)" required/></td>
					</tr>
					<tr>
						<td style="text-align:right">* Mother Name : </td>
						<td><input type="text" class="w3-input" name="mother_name" value="<?php if($update){echo $r['mother_name'];} ?>" title="Student's mother's name" required/></td>
					</tr>
					<tr>
						<td style="text-align:right">Aadhar no. : </td>
						<td><input type="text" class="w3-input" name="aadhar_no" value="<?php if($update){if($r['aadhar_no']!=0){echo $r['aadhar_no'];}} ?>" pattern="[0-9]{12}" title="Student's aadhar card no" /></td>
					</tr>
					<tr>
						<td style="text-align:right">* Select Cast : </td>
						<td>
						<select class="w3-round" name="cast" title="Select Cast" required>
							<option value="GEN" <?php if($update){ if($r['cast'] == 'GEN'){ echo 'selected'; }} ?> >GEN</option>
							<option value="OBC" <?php if($update){ if($r['cast'] == 'OBC'){ echo 'selected'; }} ?> >OBC</option>
							<option value="SC" <?php if($update){ if($r['cast'] == 'SC'){ echo 'selected'; }} ?> >SC</option>
							<option value="ST" <?php if($update){ if($r['cast'] == 'ST'){ echo 'selected'; }} ?> >ST</option>
							<option value="VICHARTI" <?php if($update){ if($r['cast'] == 'VICHARTI'){ echo 'selected'; }} ?> >VICHARTI</option>
						</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right">UID No. : </td>
						<td><input type="text" class="w3-input" name="uid_no" value="<?php if($update){if($r['uid_no']!=0){echo $r['uid_no'];}} ?>" pattern="[0-9]{18}" title="Student's UID no" /></td>
					</tr>
					
					<tr>
						<th class="w3-grey" colspan="2">Parent's Details</th>
					</tr>
					<tr>
						<td style="text-align:right">Parent's contact no. : </td>
						<td><input type="text" class="w3-input" name="contact_no" value="<?php if($update){if($r['contact_no']!=0){echo $r['contact_no'];}} ?>" title="Parent's mobile number" /></td>
					</tr>
					<tr>
						<td style="text-align:right">Rashan no. : </td>
						<td><input type="text" class="w3-input" name="rashan_no" value="<?php if($update){if($r['rashan_no']!=0){echo $r['rashan_no'];}} ?>" pattern="[0-9]{15}" title="Rashan no" /></td>
					</tr>
					<tr>
						<td style="text-align:right">APL / BPL : </td>
						<td><select name="apl_bpl" title="select apl/bpl"><option value="-1" disabled selected>select APL/BPL</option>
						<option value="A" <?php if($update){ if($r['apl_bpl'] == 'A'){ echo 'selected'; }} ?> >APL</option>
						<option value="B" <?php if($update){ if($r['apl_bpl'] == 'B'){ echo 'selected'; }} ?> >BPL</option>
					</tr>
					
					
					<tr>
						<th class="w3-grey" colspan="2">Bank Details Details</th>
					</tr>
					<tr>
						<td style="text-align:right">Select Bank : </td>
						<td>
						<select class="w3-round" name="bank_no" title="Select Bank">
							<option disabled selected value="-1">select bank</option>
							<?php
								$query_bank='select * from banks';
								$result_bank=$dbhandler->query($query_bank);
								while($row = $result_bank->fetch()) {
									echo '<option  '; if($update){ if($r['bank_no'] == $row['bank_no']){ echo 'selected '; }} echo 'value="'.$row['bank_no'].'">'.$row['bank_name'].' '.$row['place'].'</option>';
								}
							?>
						</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right">Bank a/c no. : </td>
						<td><input type="number" class="w3-input" name="bank_ac_no" value="<?php if($update){echo $r['bank_ac_no'];} ?>" title="Bank a/c number" /></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;padding:15px;"><input type="submit" class="w3-btn w3-brown" value=" Submit "></td>
					</tr>
					
					<tr>
						<th class="w3-pale-blue w3-text-red" colspan="2"> &nbsp; * &nbsp; required field</th>
					</tr>
				</table>
				<?php if($update){ echo '<input type="hidden" name="sid" value="'.$_GET['sid'].'" />'; } ?>
			</form>
		</div>
		<?php include "../styles/files/footer.php"; ?>
	</body>
</html>