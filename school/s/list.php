<!--School software for store records of students
		Developer - Vatsal Jagani
					vatsaljagani85@gmail.com
-->
<?php include '../styles/files/db_connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>General Register</title>
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
    <body onload="init()">
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			<li><a class="w3-green" href="#">General Register</a></li>
			<li><a href="find.php">Find Student</a></li>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="std_upgrade.php">Mass STD updation</a></li>
			<li><a href="leave_school.php">Student school leaving</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<div>
			<div>
				<form>
				<div id="c-1" style="display:none"><input type="button" onclick="showCol(1)" value="Show More Details column" /><br/></div>
				<div id="c-2" style="display:none"><input type="button" onclick="showCol(2)" value="Show GR No." /><br/></div>
				<div id="c-3" style="display:none"><input type="button" onclick="showCol(3)" value="Show Name" /><br/></div>
				<div id="c-4" style="display:none"><input type="button" onclick="showCol(4)" value="Show Admission Date" /><br/></div>
				<div id="c-5" style="display:none"><input type="button" onclick="showCol(5)" value="Show School leaving Date" /><br/></div>
				<div id="c-6" style="display:none"><input type="button" onclick="showCol(6)" value="Show STD" /><br/></div>
				<div id="c-7" style="display:none"><input type="button" onclick="showCol(7)" value="Show Gender" /><br/></div>
				<div id="c-8" style="display:block"><input type="button" onclick="showCol(8)" value="Show Birthdate" /><br/></div>
				<div id="c-9" style="display:block"><input type="button" onclick="showCol(9)" value="Show Cast" /><br/></div>
				<div id="c-10" style="display:block"><input type="button" onclick="showCol(10)" value="Show Mother-name" /><br/></div>
				<div id="c-11" style="display:block"><input type="button" onclick="showCol(11)" value="Show Aadhar-no" /><br/></div>
				<div id="c-12" style="display:block"><input type="button" onclick="showCol(12)" value="Show UID-no" /><br/></div>
				<div id="c-13" style="display:block"><input type="button" onclick="showCol(13)" value="Show Contact-info" /><br/></div>
				<div id="c-14" style="display:block"><input type="button" onclick="showCol(14)" value="Show APL/BPL" /><br/></div>
				<div id="c-15" style="display:block"><input type="button" onclick="showCol(15)" value="Show Rashan-no" /><br/></div>
				<div id="c-16" style="display:block"><input type="button" onclick="showCol(16)" value="Show Bank" /><br/></div>
				<div id="c-17" style="display:block"><input type="button" onclick="showCol(17)" value="Show Bank-a/c-no" /><br/></div>
				</form>
			</div>
			<div  style="overflow-x:auto;margin:10px 2px 15px 8px;" class="w3-card-4">
			<table class="w3-table w3-striped w3-bordered w3-hoverable">
				<tr class="w3-teal">
					<th colspan="20">Student Details</th>
				</tr>
				<tr class="w3-grey" id="student-table">
					<th onclick="hideCol(1)">Select</th>
					<th onclick="hideCol(2)">GR No.</th>
					<th onclick="hideCol(3)">Name</th>
					<th onclick="hideCol(4)">Admission Date</th>
					<th onclick="hideCol(5)">School leaving Date</th>
					<th onclick="hideCol(6)">STD</th>
					<th onclick="hideCol(7)">Gender</th>
					<th onclick="hideCol(8)">Birthdate</th>
					<th onclick="hideCol(9)">Cast</th>
					<th onclick="hideCol(10)">Mother Name</th>
					<th onclick="hideCol(11)">Aadhar no.</th>
					<th onclick="hideCol(12)">UID</th>
					<th onclick="hideCol(13)">Contact</th>
					<th onclick="hideCol(14)">APL/BPL</th>
					<th onclick="hideCol(15)">Rashan no.</th>
					<th onclick="hideCol(16)">Bank</th>
					<th onclick="hideCol(17)">Bank a/c no.</th>
					
				</tr>
				<?php
					
					$sql="select * from gr_list as l left outer join students as s on l.sid=s.sid left outer join banks as b on s.bank_no=b.bank_no";
					
					if(isset($_GET['q'])){
						$sql=$sql." where ";
						if(isset($_GET['current'])){
							$sql=$sql."school_leaving_date is null";
						}
					}
					if(isset($_GET['f'])){
						$sql=$sql." where ";
						try{
							switch($_GET['find']){
								case 'name':{
									$sql=$sql."name like '%".$_GET['value']."%'";
									break;
									}
								case 'gr_no':{
									$sql=$sql."gr_no like '%".$_GET['value']."%'";
									break;
									}
								case 'mother_name':{
									$sql=$sql."mother_name like '%".$_GET['value']."%'";
									break;
									}
								case 'gender':{
									$sql=$sql."gender='".$_GET['value']."'";
									break;
									}
								case 'cast':{
									$sql=$sql."cast='".$_GET['value']."'";
									break;
									}
								case 'bank':{
									$sql=$sql."bank_no='".$_GET['value']."'";
									break;
									}
								case 'aadhar_no':{
									$sql=$sql."aadhar_no like '%".$_GET['value']."%'";
									break;
									}
								case 'uid_no':{
									$sql=$sql."uid_no like '%".$_GET['value']."%'";
									break;
									}
								case 'apl_bpl':{
									$sql=$sql."apl_bpl='".$_GET['value']."'";
									break;
									}
								case 'rashan_no':{
									$sql=$sql."rashan_no like '%".$_GET['value']."%'";
									break;
									}
								case 'birthdate':{
									$sql=$sql."birthdate='".$_GET['value']."'";
									break;
									}
								case 'admission_date':{
									$sql=$sql."admission_date like '%".$_GET['value']."%'";
									break;
									}
								case 'std':{
									$sql=$sql."std=".$_GET['value'];
									break;
									}
								case 'school_leaving_date':{
									$sql=$sql."school_leaving_date like '%".$_GET['value']."%'";
									break;
									}
							}
							switch($_GET['current']){
								case "1":{
									$sql=$sql." and school_leaving_date is null";
									break;
								}
								case "0":{
									$sql=$sql." and school_leaving_date is not null";
									break;
								}
							}
						}
						catch(Exception $ex){
							header("location:find.php?msg=Internal error occured, Retry later.");
						}
					}
					
                    $temp=0;
					$query=$dbhandler->query($sql);
					while($r=$query->fetch()){
						echo '<tr>';
						echo '<td><a href="details.php?gr_no='.$r['gr_no'].'" class="w3-btn w3-light-blue">More Details</a></td>';
						echo '<td>'.$r['gr_no'].'</td>';
						echo '<td>'.$r['name'].'</td>';
						echo '<td>'.$r['admission_date'].'</td>';
						echo '<td>'.$r['school_leaving_date'].'</td>';
						echo '<td>'.$r['std'].'</td>';
						echo '<td>';if($r['gender']=='M'){echo 'Male';}else{echo 'Female';}'</td>';
						if($r['birthdate']!=0){echo '<td>'.$r['birthdate'].'</td>';}else{echo '<td></td>';}
						echo '<td>'.$r['cast'].'</td>';
						echo '<td>'.$r['mother_name'].'</td>';
						if($r['aadhar_no']!=0){echo '<td>'.$r['aadhar_no'].'</td>';}else{echo '<td></td>';}
						if($r['uid_no']!=0){echo '<td>'.$r['uid_no'].'</td>';}else{echo '<td></td>';}
						if($r['contact_no']!=0){echo '<td>'.$r['contact_no'].'</td>';}else{echo '<td></td>';}
						echo '<td>';if($r['apl_bpl']=='B'){echo 'BPL';}else if($r['apl_bpl']=='A'){echo 'APL';}'</td>';
						if($r['rashan_no']!=0){echo '<td>'.$r['rashan_no'].'</td>';}else{echo '<td></td>';}
						if($r['bank_no']!=0){echo '<td>'.$r['bank_name'].'</td>';}else{echo '<td></td>';}
						if($r['bank_no']!=0){echo '<td>'.$r['place'].'</td>';}else{echo '<td></td>';}
						echo '</tr>';
						$temp=1;
					}
					if($temp==0){
						echo '<tr><th colspan="20">No student found...</th></tr>';
					}
				?>
			</table>
			</div>
			</div>
		</div>
		
		<?php include "../styles/files/footer.php"; ?>
	<script>
		function hideCol(i){
			$("td:nth-child(" + i + "),th:nth-child(" + i + ")").hide();
			document.getElementById("c-"+i).style.display='block';
		}
		function showCol(i){
			$("td:nth-child(" + i + "),th:nth-child(" + i + ")").show();
			document.getElementById("c-"+i).style.display='none';
		}
		
		function init(){
			for(i=8;i<=17;i++){
				hideCol(i);
			}
		}
	</script>
	</body>
</html>