<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Students Records Management</title>
        <link rel='icon' href="styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system"/>
        <link rel="stylesheet" type="text/css" href="styles/w3.css">
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="s/home.php" title="Start your work here">Home</a></li>
		</ul>
	<?php include "styles/files/header.php"; ?>
		<div class="w3-container" id="body_writing">
			<a href="s/home.php">
			<div class="w3-display-container w3-animate-zoom">
				<img class="w3-border w3-padding" src="styles/img/students_record.jpg" alt="Student Record Management System" width="100%" height="100%" />
				<div class="w3-display-topmiddle w3-container w3-jumbo w3-text-orange">Start Here</div>				
			</div>
			</a>
			<div class="w3-center w3-xxlarge w3-text-orange"><i>Manual</i></div>
			<div>
				==========================================================================================================================
</br>-> By clicking Student Details Button on top of the Page and let's begin.....!!!
</br>-> Home page shows you student details differently.
</br>-> Left side navigation showing student details related links.
</br>-> Right side navigation showing Banks.
</br>-> Add bank details first before adding student.
</br>-> Student Details page will allow you to see the details of student.
</br>-> Inside student details, click header of the column for hide that column
</br>-> for unhide same column, click button which will shown after you hide column.
</br>-> You can view student based on different conditions.
</br>	&emsp;&emsp;&emsp;All Students Details
</br>	&emsp;&emsp;&emsp;Student who currently studying
</br>	&emsp;&emsp;&emsp;Student who leaved school
</br>	&emsp;&emsp;&emsp;Find student based on different paramenters.
</br>-> Do mass STD. updation
</br>	&emsp;&emsp;&emsp;you can update all student class by one click(which also action for leaving school for all STD-8th student automatically). 
</br>-> Banks page allow you to add mad update of banks details.
</br>-> Report of the activity is shown at bottom of the page in colored box, you can close that message by clicking close button.
</br>==========================================================================================================================
				<br/>
			</div>
			<a href="readMe.md" class="w3-center w3-text-pink"><h2>More help >>></h2></a>
		</div>
	<?php include "styles/files/footer-for-home.php"; ?>
	</body>
</html>