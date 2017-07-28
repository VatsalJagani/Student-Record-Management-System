<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Banks Details</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, view student"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a class="w3-green" href="#">Banks</a></li>
			<li><a href="add_bank.php">Add Bank</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../s/home.php">Student Details</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<div style="overflow-x:auto;margin:10px 2px 15px 8px;" class="w3-card-4">
			<table class="w3-table">
				<tr class="w3-lime w3-text-blue">
					<th colspan="4" style="text-align:right;"><a href="add_bank.php">Add new Bank Details</a></th>
				</tr>
				<tr class="w3-teal">
					<th colspan="4">Bank Details</th>
				</tr>
				<tr class="w3-grey">
					<th>No.</th><th>Name</th><th>Place</th><th>Update Bank details</th>
				</tr>
				<?php
					$sql="select * from banks";
					$query=$dbhandler->query($sql);
					$temp=0;
					while($r=$query->fetch()){
						echo '<tr>';
						echo '<td>'.$r['bank_no'].'</td>';
						echo '<td>'.$r['bank_name'].'</td>';
						echo '<td>'.$r['place'].'</td>';
						echo '<td><a href="update_bank.php?bank_no='.$r['bank_no'].'" class="w3-btn w3-light-blue">Update</a></td>';
						echo '</tr>';
						$temp=1;
					}
					if($temp==0){
						echo '<tr><th colspan="4">No bank found...</th></tr>';
					}
				?>
			</table>
			</div>
		</div>
		<?php include "../styles/files/footer.php"; ?>
	</body>
</html>