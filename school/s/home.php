<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, view student"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
		<style>
			.w3-btn{
				padding-top:20px;
				padding-bottom:20px;
				padding-left:50px;
				padding-right:50px;
			}
			.w3-animate-top{position:relative;-webkit-animation:animatetop 0.8s;animation:animatetop 0.8s}
			.w3-animate-bottom{position:relative;-webkit-animation:animatebottom 0.8s;animation:animatebottom 0.8s}
			.w3-animate-left{position:relative;-webkit-animation:animateleft 0.8s;animation:animateleft 0.8s}
			.w3-animate-right{position:relative;-webkit-animation:animateright 0.8s;animation:animateright 0.8s}
		</style>
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a class="w3-green" href="#">Home</a></li>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="std_upgrade.php">Mass STD updation</a></li>
			<li><a href="leave_school.php">Student school leaving</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container w3-center" id="body_writing">
					   <a href="students.php" class="w3-btn w3-light-blue w3-animate-top">All Student's Details</a>
			</br></br> <a href="list.php" class="w3-btn w3-light-blue w3-animate-right">General Register</a>
			</br></br> <a href="list.php?q=1&current=1" class="w3-btn w3-light-blue w3-animate-left">Get Current Student List</a>
			</br></br> <a href="counts.php" class="w3-btn w3-light-blue w3-animate-right">Student Counter</a>
			</br></br> <a href="find.php" class="w3-btn w3-light-blue w3-animate-bottom">Find</a>
		</div>
		
		<?php include "../styles/files/footer.php"; ?>
	</body>
</html>