<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mass STD Changing</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, student leave school"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
		<script src="../styles/jquery.js"></script>
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a class="w3-green" href="#">Mass STD. updation</a></li>
			<li><a href="list.php">General Register List</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<form action="std_upgrade_sql.php" method="post">
				<table class="w3-table w3-card-4">
					<tr>
						<th class="w3-teal" colspan="4">Change Standard of Student in mass</th>
					</tr>
					<tr>
						<td colspan="4" class="w3-xlarge">
							<input type="radio" name="all" value="1" checked onchange="$('#_all').show();$('#_all2').show();$('#_std').hide();" /> For all students</div></br>
							<input type="radio" name="all" value="0" onchange="$('#_std').show();$('#_all').hide();$('#_all2').hide();" /> STD vise changing
						</td>
					</tr>
					
					<tr id="_all">
						<td colspan="4" class="w3-center"> Upgrade std. for all student to next std., and school-leaving of STD-8 students is also included </td>
					</tr>
					<tr id="_all2">
						<td colspan="2" class="w3-right"> School Leaving Date for STD8 students </td>
						<td colspan="2"><input type="date" name="school_leaving_date" /></td>
					</tr>
					<tr id="_std" style="display:none">
						<td style="text-align:right">All current student from std. : </td>
						<td><select name="std_from" class="w3-input">
						<option value="1" >1</option>
						<option value="2" >2</option>
						<option value="3" >3</option>
						<option value="4" >4</option>
						<option value="5" >5</option>
						<option value="6" >6</option>
						<option value="7" >7</option>
						<option value="8" >8</option>
						</select></td>
						<td style="text-align:center"> To :</td>
						<td><select name="std_to" class="w3-input">
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
					
					<tr>
						<td colspan="4" style="text-align:center;padding:15px;"><input class="w3-btn w3-brown" type="submit" value="Submit" /></td>
					</tr>
				</table>
			</form>
		</div>
		<?php include "../styles/files/footer.php"; ?>
	</body>
</html>