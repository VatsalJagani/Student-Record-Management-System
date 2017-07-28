<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>School Leaving</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, student leave school"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			<li><a href="add_student.php">Add new Student's Details</a></li>
			<li><a class="w3-green" href="#">School leaving Form</a></li>
			<li><a href="list.php">GR-List</a></li>
			<li><a href="std_upgrade.php">Mass STD updation</a></li>
			
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<form action="leave_school_sql.php" method="post">
				<table class="w3-table w3-card-4">
					<tr>
						<th class="w3-teal" colspan="2">School leaving form</th>
					</tr>
					
					<tr>
						<td style="text-align:right">* GR no. : </td>
						<td><input type="number" class="w3-input" name="gr_no" id="gr_no" value="<?php if(isset($_GET['gr_no'])){ echo $_GET['gr_no']; } ?>" title="Students GR no." required /></td>
					</tr>
					<tr>
						<td style="text-align:right">* School leaving Date : </td>
						<td><input type="date" name="school_leaving_date" id="school_leaving_date" title="school leaving date of student" required/></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;padding:15px;"><input class="w3-btn w3-brown" type="submit" value="Submit" /></td>
					</tr>
				</table>
			</form>
		</div>
		<?php include "../styles/files/footer.php"; ?>
	</body>
</html>