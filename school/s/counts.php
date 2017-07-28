<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<?php
	$s1="select count(*) as total_st from students";
	$q1=$dbhandler->query($s1);
	$r1=$q1->fetch();
	
	$s2="select count(*) as total_gr from gr_list";
	$q2=$dbhandler->query($s2);
	$r2=$q2->fetch();
	
	$s3="select max(gr_no) as max_gr from gr_list";
	$q3=$dbhandler->query($s3);
	$r3=$q3->fetch();
	
	$s4="select count(*) as total_cr from gr_list where school_leaving_date is null";
	$q4=$dbhandler->query($s4);
	$r4=$q4->fetch();
	
	$i=1;
	while($i<=8){
		$ss[$i]="select count(*) as total_c from gr_list where std=".$i." and school_leaving_date is null";
		$qs[$i]=$dbhandler->query($ss[$i]);
		$rs[$i]=$qs[$i]->fetch();
		$i++;
	}
	
	
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Students Count Details</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, view student"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			<li><a class="w3-green" href="#">Student Counts</a></li>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="std_upgrade.php">Mass STD updation</a></li>
			<li><a href="leave_school.php">Student school leaving</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<div>
			<div  style="overflow-x:auto;margin:10px 2px 15px 8px;" class="w3-card-4">
			<table class="w3-table w3-striped w3-bordered w3-hoverable">
				<tr class="w3-teal">
					<th colspan="3">Students Count Details</th>
				</tr>
				<tr>
					<td style="text-align:right">Total students in list : &emsp;&emsp; </td>
					<td style="text-align:left"><?php echo $r1['total_st']; ?></td>
					<td style="text-align:center"><a href="students.php" class="w3-btn w3-light-blue">Student List</a></td>
				</tr>
				<tr>
					<td style="text-align:right">Total students in General Register : &emsp;&emsp; </td>
					<td style="text-align:left"><?php echo $r2['total_gr']; ?></td>
					<td style="text-align:center"><a href="list.php" class="w3-btn w3-light-blue">General Register</a></td>
				</tr>
				<tr>
					<td style="text-align:right">Last General Register No. : &emsp;&emsp; </td>
					<td style="text-align:left"><?php echo $r3['max_gr']; ?></td>
					<td style="text-align:center"><a href="details.php?gr_no=<?php echo $r3['max_gr']; ?>" class="w3-btn w3-light-blue">Get Last student's Details</a></td>
				</tr>
				<tr>
					<td style="text-align:right">Total current student : &emsp;&emsp; </td>
					<td style="text-align:left"><?php echo $r4['total_cr']; ?></td>
					<td style="text-align:center"><a href="list.php?q=1&current=1" class="w3-btn w3-light-blue">Current avilable student List</a></td>
				</tr>
				
				<tr>
					<th class="w3-grey" colspan="3">Counts by Standards</th>
				</tr>
				<?php $i=1;
					while($i<=8){
				?>
				<tr>
					<td style="text-align:right">STD. <?php echo $i; ?> : &emsp;&emsp; </td>
					<td style="text-align:left"><?php echo $rs[$i]['total_c']; ?></td>
					<td style="text-align:center"><a href="list.php?f=1&current=1&find=std&value=<?php echo $i; ?>" class="w3-btn w3-light-blue">STD-<?php echo $i; ?></a></td>
				</tr>
				<?php $i++;} ?>
				
			</table>
			</div>
		</div>
		
		<?php include "../styles/files/footer.php"; ?>
	</body>
</html>