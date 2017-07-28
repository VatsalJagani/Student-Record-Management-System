<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Find Student</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, student leave school"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
		<script src="../styles/jquery.js"></script>
    </head>
    <body onload="myf()">
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			<li><a class="w3-green" href="#">Find</a></li>
			<li><a href="students.php">All Students</a></li>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="std_upgrade.php">Mass STD updation</a></li>
			<li><a href="leave_school.php">Student school leaving</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<form action="find_sql.php" method="post">
				<table class="w3-table w3-card-4">
					<tr>
						<th class="w3-teal" colspan="2">Find Student</th>
					</tr>
					<tr>
						<td colspan="2" class="w3-xlarge">
							<input type="radio" name="what_select" value="1" checked /> Only current students</div></br>
							<input type="radio" name="what_select" value="0" /> Only school leaved students</br>
							<input type="radio" name="what_select" value="2" /> Both
						</td>
					</tr>
					
					<tr>
						<td style="text-align:right"> Find By : </td>
						<td><select class="w3-round" id="_find" name="find_by" title="Find Student by different paramenters" onchange="myf()">
							<option value="-1" selected disabled>Select any parameter</option>
							<option value="name">Name</option>
							<option value="gr_no">GR No.</option>
							<option value="mother_name">Mother's Name</option>
							<option value="gender">Gender</option>
							<option value="cast">Cast</option>
							<option value="bank">Bank</option>
							<option value="aadhar_no">Aadhar-No</option>
							<option value="uid_no">UID-No</option>
							<option value="apl_bpl">APL/BPL</option>
							<option value="rashan_no">Rashan-No</option>
							<option value="birthdate">Birthdate</option>
							<option value="admission_date">Admission Date</option>
							<option value="std">STD</option>
							<option value="school_leaving_date">School Leaving Date</option>
						</select></td>
					</tr>
					<tr id="text_value">
						<td style="text-align:right"> Value : </td>
						<td><input type="text" class="w3-input" name="value" /></td>
					</tr>
					<tr id="_gender">
						<td style="text-align:right"> Gender : </td>
						<td><select name="gender" class="w3-input">
						<option value="M" >Male</option>
						<option value="F" >Female</option>
						</select></td>
					</tr>
					<tr id="_apl_bpl">
						<td style="text-align:right"> Apl/Bpl : </td>
						<td><select name="apl_bpl" class="w3-input">
						<option value="A" >APL</option>
						<option value="B" >BPL</option>
						</select></td>
					</tr>
					<tr id="_cast">
						<td style="text-align:right"> Cast : </td>
						<td><select name="cast" class="w3-input">
						<option value="GEN" >GEN</option>
						<option value="OBC" >OBC</option>
						<option value="SC" >SC</option>
						<option value="ST" >ST</option>
						<option value="VICHARTI" >VICHARTI</option>
						</select></td>
					</tr>
					<tr id="_std">
						<td style="text-align:right"> STD : </td>
						<td><select name="std" class="w3-input">
						<option value="1" >1</option>
						<option value="2" >2</option>
						<option value="3" >3</option>
						<option value="4" >4</option>
						<option value="5" >5</option>
						<option value="6" >6</option>
						<option value="7" >7</option>
						<option value="8" >8</option>
						</select></td>
					</tr>
					<tr id="_bank">
						<td style="text-align:right">Bank : </td>
						<td>
						<select name="bank_no" title="Select Bank" class="w3-input">
							<option disabled selected value="-1">select bank</option>
							<?php
								$query_bank='select * from banks';
								$result_bank=$dbhandler->query($query_bank);
								while($row = $result_bank->fetch()) {
									echo '<option  value="'.$row['bank_no'].'">'.$row['bank_name'].' '.$row['place'].'</option>';
								}
							?>
						</select>
						</td>
					</tr>
					
					<tr>
						<td colspan="2" style="text-align:center;padding:15px;"><input class="w3-btn w3-brown" type="submit" value="Submit" /></td>
					</tr>
				</table>
			</form>
		</div>
		<?php include "../styles/files/footer.php"; ?>
	
	<script>
		function hideAll(){
			$("#text_value").hide();
			$("#_gender").hide();
			$("#_cast").hide();
			$("#_bank").hide();
			$("#_apl_bpl").hide();
			$("#_std").hide();
		}
		function myf(){
			hideAll();
			switch($("#_find").val()){
				case 'name':{
					$("#text_value").show();
					break;
					}
				case 'gr_no':{
					$("#text_value").show();
					break;
					}
				case 'mother_name':{
					$("#text_value").show();
					break;
					}
				case 'gender':{
					$("#_gender").show();
					break;
					}
				case 'cast':{
					$("#_cast").show();
					break;
					}
				case 'bank':{
					$("#_bank").show();
					break;
					}
				case 'aadhar_no':{
					$("#text_value").show();
					break;
					}
				case 'uid_no':{
					$("#text_value").show();
					break;
					}
				case 'apl_bpl':{
					$("#_apl_bpl").show();
					break;
					}
				case 'rashan_no':{
					$("#text_value").show();
					break;
					}
				case 'birthdate':{
					$("#text_value").show();
					break;
					}
				case 'admission_date':{
					$("#text_value").show();
					break;
					}
				case 'std':{
					$("#_std").show();
					break;
					}
				case 'school_leaving_date':{
					$("#text_value").show();
					break;
					}
			}
		}
	</script>
	</body>
</html>