<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>

<?php
	try{
		$sql='select sid from students where sid=?';
        $query=$dbhandler->prepare($sql);
        $query->execute(array($_GET['sid']));
		$r=$query->fetch();
		if($r==null)
		{
			header("location:students.php?msg=Student not found, try again or add new student.");
		}
		else{
			$q=$dbhandler->prepare('select gr_no from gr_list where sid=? and school_leaving_date is null');
			$q->execute(array($_GET['sid']));
			$rr=$q->fetch();
			if($rr!=null){
				header("location:details.php?gr_no=".$rr['gr_no']."&msg=Student already admitted, please check details here.");
			}
		}
	}
	catch(Exception $ex){
		header("location:students.php?msg=Student not found, try again later.");
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admission Form</title>
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
			<li><a class="w3-green" href="#">Student Admission</a></li>
			<li><a href="add_student.php">Add other student details</a></li>
			<li><a href="std_upgrade.php">Mass STD updation</a></li>
			<li><a href="leave_school.php">Student school leaving</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<form action="admission_sql.php?sid=<?php echo $_GET['sid']; ?>" method="post">
				<table class="w3-table w3-card-4">
					<tr>
						<th class="w3-teal" colspan="2" style="text-align:center">Admission Form</th>
					</tr>
					
					<tr>
						<td style="text-align:right">* GR no. : </td>
						<td><input type="number" class="w3-input" name="gr_no" title="Student's GR no." value="<?php
					$next=1;
					$query=$dbhandler->query('select max(gr_no) as max_gr from gr_list');
					$r=$query->fetch();
					if($r!=null)
					{
						$next=$r['max_gr']+1;
					}
					echo $next;
				?>" required /></td>
					</tr>
					<tr>
						<td style="text-align:right">* School Admission Date : </td>
						<td><input type="date" name="admission_date" title="Either select date of date formate(yyyy-mm-dd)" required/></td>
					</tr>
					<tr>
						<td style="text-align:right">* STD : </td>
						<td><select class="w3-round" name="std" title="Select STD" required>
							<option disabled selected value="-1">select STD</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;padding:15px;"><input type="submit" class="w3-btn w3-brown" value=" Submit "></td>
					<tr>
					
					<tr>
						<th class="w3-pale-blue w3-text-red" colspan="2"> &nbsp; * &nbsp; required field</th>
					</tr>
				</table>
			</form>
		</div>
		<?php include "../styles/files/footer.php"; ?>
	</body>
</html>