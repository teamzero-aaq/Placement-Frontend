<?php 
error_reporting(0); 
include('security.php');
include ('db.php');
#session_start();

 #require 'db.php';

#Create ,user,company
if(isset($_POST['submit_file']))
{
	if(!empty($_FILES['file']))
	{
		
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
		    $dept=$_POST['department'];
		    echo $dept;
//		    $q='select * from department where dept_id='.$dept;
//		    $q_run1=mysqli_query($connection,$q);
//		    $row=mysqli_fetch_array($q_run1);
		    $name= $_FILES['file']['name'];
		    $dep=str_replace(".csv","",$name);
		    echo($dep);
		    $query="insert into subject (sub_id,department) values ('$dept','$dep')";
		    $qrun=mysqli_query($connection,$query);
            $storagename = $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            $file = fopen("upload/".$_FILES['file']['name'],"r");
            $count=0;
            $start=false;
while(! feof($file))
  {
  	
  $arr=(fgetcsv($file));
  //print_r ($arr);
  if($start&&(!is_null($arr[0])||!is_null($arr[1])||!is_null($arr[3]))){
  $q=$arr[0];
  $a=$arr[1];
  $b=$arr[2];
  $c=$arr[3];
  $d=$arr[4];
  $ans=$arr[5];
  $exp=$arr[6];
  $posts[] = array('question'=> $q, 'opta'=> $a,'optb'=>$b,'optc'=>$c,'optd'=>$d,'ans'=>$ans,'explanation'=>$exp);
  	

  }
  if($arr[0]=='question'&&$arr[1]=='opta'&&$arr[2]=='optb'&&$arr[3]=='optc'&&$arr[4]=='optd'&&$arr[5]=='ans'&&$arr[6]=='exp')
  {
  	$start=true;
  	

  }
  
 
}
$res=array();
$res_im=array();
$res_im=$posts;
$res['test_questions'][0]=$res_im;

fclose($file);
$file_pointer = "../indiabix/Scrape_IndiaBix_QA-master/DB_Collections/temp_jsonfiles/".$_FILES['file']['name'];
unlink($file_pointer); 
$fp = fopen('../indiabix/Scrape_IndiaBix_QA-master/DB_Collections/temp_jsonfiles/'.$dep.'.json', 'w');
fwrite($fp, json_encode($res));
fclose($fp);
              

	}
	else{
		$_SESSION['success'] = "PLEASE SELECT THE FILE.NO FILE CHOOSEN";
	}
	if($start)
	{
		  	$_SESSION['success'] = "Students Added Successfully";
	}
	else
	{
				  	$_SESSION['success'] = "SORRY CSV FILE SHOULD BE PROPER(name,dob,grade,gender)";

	}


	
header('Location: addadmin.php');

}
if(isset($_POST['add_stu']))
{
	$name=$_POST['name'];
	$dob=(string)$_POST['dob'];
	$grade=$_POST['grade'];
	$gender=$_POST['gender'];

	$query="insert into students values('$name','$dob','$grade','$gender')";
  	$q_run=mysqli_query($connection,$query);
  			  	$_SESSION['success'] = "Student Added Successfully";
  			  	header('Location: addadmin.php');


}

if(isset($_POST['register']))
{
	$name =$_POST['name'];
	$username =$_POST['username'];
	$email =$_POST['mailid'];
	$contact =$_POST['contact'];
	$password =$_POST['passadmin'];
	$cpass =$_POST['confirmpass'];
	$type = 1;

	if ($password === $cpass) {
		
	$query = "INSERT INTO `register`(`name`, `contact`, `username`, `password`, `email`, `usertype`) VALUES ('$name','$contact','$username','$password','$email',$type)";
	$query_run = mysqli_query($connection, $query);
		

	  if($query_run)
	  {
	  	
	  	$_SESSION['success'] = "Admin Added Successfully";
	  	header('Location: addadmin.php');  
	  }
	  else
	  {

	  	$_SESSION['status'] = "Admin Profile Not Added";
	  	header('Location: addadmin.php');  
	  }
	}
	else
	{
		$_SESSION['status'] = " Password and Confirm Password Does not Match";
	  	header('Location: addadmin.php');  
	}
}
#create admin,user,company End

if (isset($_POST['update_user_create'])) {

	$fname =$_POST['fname'];
	$username =$_SESSION['username'];
	$lname =$_POST['lname'];
	$college =$_POST['cname'];
	$depart =$_POST['dname'];
	$add=$_POST['address'];
	$skill=$_POST['subject'];
    
	//$type = 1;


	$query = "insert into user_profile(username,first_name,last_name,college_name,department,address,subject) values('$username','$fname','$lname','$college','$depart','$add','$skill')";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "";
		header('Location: pro_profile.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: register_update.php'); 
	}
}
if (isset($_POST['update_user_update'])) {

	$fname =$_POST['fname'];
	$username =$_SESSION['username'];
	$lname =$_POST['lname'];
	$college =$_POST['cname'];
	$depart =$_POST['dname'];
	$add=$_POST['address'];
	$skill=$_POST['subject'];
    
	//$type = 1;


	$query = "UPDATE `user_profile` SET `first_name`='$fname',`last_name` ='$lname',`college_name`='$college',`address` ='$add',`subject` ='$skill',`department`='$depart' WHERE `username` = '$username' ";

	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "";
		header('Location: pro_profile.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: index.php'); 
	}
}



#update ,user,company
if (isset($_POST['update_register'])) {

	$name=$_POST['name'];
	$date =$_POST['DOB'];
	$grade =$_POST['grade'];
	$gender =$_POST['gender'];
echo $name;
echo '<br><br>';
echo $date;
echo '<br><br>';
echo $gender;
echo '<br><br>';
echo $grade;

	$query = "UPDATE `students` SET `name`='$name',`dob` ='$date',`grade`='$grade',`gender` ='$gender' WHERE `name` = '$name' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Update STUDENT";
		header('Location: companies.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select Student for Update";  
		header('Location: companies.php'); 
	}
}

#update ,user,company End



#delete ,user,company

if (isset($_POST['delete_data'])) {


	$name = $_POST['stud_name'];


	$query = "DELETE FROM `students` WHERE `name`='$name' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: companies.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: companies.php'); 
	}
}

#delete ,user,company End

#Create GD QUESTIONs

if (isset($_POST['gd_btn'])) {


	$gd_title = $_POST['gd_title'];
	$gd_link = $_POST['gd_link'];
	$gd_point = $_POST['gd_point'];


	$query = "INSERT INTO `gd`(`title`, `link`, `points`) VALUES ('$gd_title','$gd_link','$gd_point')";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Added GD !!";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Added";  
		header('Location: gd.php'); 
	}
}

#Create GD QUESTIONs End



#Update GD



if (isset($_POST['updategd'])) {

	$id = $_POST['upid'];
	$gd_title = $_POST['updatetitle'];
	$gd_link  = $_POST['uplink'];
	$gd_point = $_POST['uppoints'];


	$query = "UPDATE `gd` SET `title` = '$gd_title', `link` = '$gd_link', `points` = '$gd_point' WHERE `id` = '$id' ";
	$query_run = mysqli_query($connection, $query);


	if ($query_run) {
		$_SESSION['success'] =   "";
		header('Location: update_gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: update_gd.php'); 
	}
}
#Update GD End

#delete GD

if (isset($_POST['gd_remove'])) {


	$deltitle = $_POST['deltitle'];


	$query = "DELETE FROM `gd` WHERE `title`='$deltitle' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: gd.php'); 
	}
}

#delete GD End


#Create HR Interview

if (isset($_POST['hr_btn'])) {

	
	$hr_question = $_POST['hr_question'];
	$hr_answer = $_POST['hr_answer'];

	$query = "INSERT INTO `hr`(`hr_question`, `hr_ans`) VALUES ('$hr_question','$hr_answer')";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Added HR !!";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Added";  
		header('Location: gd.php'); 
	}
}

#Create HR Interview End


#Update Interview



if (isset($_POST['updatehr'])) {

	$id = $_POST['up_id'];
	$hr_question = $_POST['hr_question'];
	$hr_answer = $_POST['hr_answer'];

	$query = "UPDATE `hr` SET `hr_question` = '$hr_question' , `hr_ans` = '$hr_answer' WHERE `id` = '$id' ";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "";
		header('Location: update_hr.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: update_hr.php'); 
	}
}
#Update Interview End

#delete Interview

if (isset($_POST['hr_remove'])) {


	$delq = $_POST['del_question'];


	$query = "DELETE FROM `hr` WHERE `hr_question`='$delq' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: gd.php'); 
	}
}

#delete Interview End



#Add Question

if (isset($_POST['add_question'])) {

	$q_dept = $_POST['dept'];
	$q_subject = $_POST['subject'];
	$q_question = $_POST['question'];
	$q_opt1 = $_POST['opt1'];
	$q_opt2 = $_POST['opt2'];
	$q_opt3 = $_POST['opt3'];
	$q_opt4 = $_POST['opt4'];
	$q_ans = $_POST['ans'];
	$q_sol = $_POST['solution'];
	$q_type = $_POST['q_type'];
	

	$query = "INSERT INTO `questions` (`department` , `subject`, `question`, `op1`, `op2`, `op3`, `op4`, `ans`, `solution`, `type`) VALUES ('$q_dept','$q_subject','$q_question', '$q_opt1','$q_opt2','$q_opt3','$q_opt4','$q_ans','$q_sol', '$q_type')";
	
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Question Added !!";
		header('Location: questions.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Added";  
		header('Location: questions.php'); 
	}
}

#Add Question End


#Update Question



if (isset($_POST['questionup'])) {
	
	$q_subject = $_POST['upsubject'];
	$q_question = $_POST['updatequestion'];
	$q_opt1 = $_POST['upopt1'];
	$q_opt2 = $_POST['upopt2'];
	$q_opt3 = $_POST['upopt3'];
	$q_opt4 = $_POST['upopt4'];
	$q_ans = $_POST['upans'];
	$q_sol = $_POST['upsolution'];
	$q_type = $_POST['upq_type'];
	

	$query = "UPDATE `questions` SET `subject` = '$q_subject', `question` ='$q_question',`op1` = '$q_opt1' , `op2` = '$q_opt2', `op3` = '$q_opt3', `op4` = '$q_opt4', `ans` = '$q_ans', `solution` = '$q_sol', `type` = '$q_type' WHERE `question` = '$q_question'";
	
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Updated Question !!!";
		header('Location: questions.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Added";  
		header('Location: questions.php'); 
	}


}
#Update Questionf

#delete Question

if (isset($_POST['deleteq'])) {


	$del_q = $_POST['delq'];


	$query = "DELETE FROM `questions` WHERE `question`='$del_q' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: questions.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: questions.php'); 
	}
}

#delete 


#Approve Company

if (isset($_POST['approve_status'])) {


	$cname = $_POST['companyname'];


	$query = "UPDATE `company` SET `status` = 1 WHERE `company_name` = '$cname' ";
	
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Approved";
		header('Location: companies.php'); 
	}
	else
	{
		$_SESSION['status'] = "Company Not Found";  
		header('Location: companies.php'); 
	}
}

#end Approve Company

#reject Company

if (isset($_POST['reject_status'])) {


	$cname = $_POST['companyname'];


	$query = "UPDATE `company` SET `status` = 2 WHERE `company_name` = '$cname' ";
	
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Rejected";
		header('Location: companies.php'); 
	}
	else
	{
		$_SESSION['status'] = "Company Not Found";  
		header('Location: companies.php'); 
	}
}

#end reject Company




#Insert Department

if (isset($_POST['adddept'])) {


	$dname = $_POST['deptname'];
	$image = $_FILES["deptfile"]['name'];

		if (file_exists("assets/img/departments/" . $_FILES["deptfile"]["name"])) 
		{
			$store = $_FILES["deptfile"]["name"];
			$_SESSION['status'] = "Image already exists. '.$store.'";
			header('Location: department.php');
		}
		else
		{

			$query = "INSERT INTO `department` (`department`, `bg_link`) VALUES ('$dname', '$image')";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				move_uploaded_file($_FILES["deptfile"]["tmp_name"], "assets/img/departments/".$_FILES["deptfile"]["name"]);
				$_SESSION['success'] =   "Successfully Added Department !!";
				header('Location: department.php'); 
			}
			else
			{
				$_SESSION['status'] = "not Added";  
				header('Location: department.php'); 
			}
		}


	}

#end Insert Department



#Update Department

if (isset($_POST['update_department'])) {


	$up_deptid = $_POST['up_deptid'];
	$up_dept = $_POST['up_dept'];
	$updeptfile = $_FILES["updeptfile"]['name'];

	

			$query = "UPDATE `department` SET `department` = '$up_dept' , `bg_link` = '$updeptfile' where  dept_id = '$up_deptid' ";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				move_uploaded_file($_FILES["updeptfile"]["tmp_name"], "assets/img/departments/".$_FILES["updeptfile"]["name"]);
				$_SESSION['success'] =   "Successfully Updated";
				header('Location: department.php'); 
			}
			else
			{
				$_SESSION['status'] = "not Added";  
				header('Location: department.php'); 
			}
		


	}

#end Update Department

#delete Department
if (isset($_POST['delete_department'])) {


	$de_deptid = $_POST['delete_deptid'];

	

	$query = "DELETE FROM `department` WHERE `dept_id` = '$de_deptid' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: department.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: department.php'); 
	}
		


	}
#end Delete Department


#Insert Subject

if (isset($_POST['addsubject'])) {


	$dept_id = $_POST['dept_id'];
	$deptname = $_POST['deptname'];
	$sub = $_POST['subject'];
	$ref = $_POST['subject_ref'];


		$query = "INSERT INTO `subject` (`dept_id` , `department`, `subject` , `reference`) VALUES ('$dept_id','$deptname', '$sub', '$ref')";
		$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				$_SESSION['success'] =   "Successfully Added Subject";
				header('Location: subject.php'); 
			}
			else
			{
				$_SESSION['status'] =  "Not Added";

				header('Location: subject.php'); 
			}
		
			

	}

#end Insert Subject


#Update Subject



if (isset($_POST['update_sub'])) {

	$upid = $_POST['up_subid'];
	$up_sub = $_POST['up_sub'];
	$up_ref = $_POST['up_ref'];
	$updept = $_POST['up_dptid'];

	 $getname = "SELECT * FROM department where dept_id = '$updept' ";
     $getname_run = mysqli_query($connection,$getname);
     $r = mysqli_fetch_assoc($getname_run);
     $d_name = $r['department'];

	$query = "UPDATE `subject` SET `dept_id` = '$updept' , `department` = '$d_name' , `subject` = '$up_sub' , `reference` = '$up_ref' WHERE `sub_id` = '$upid' ";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   $query;
		header('Location: subject.php'); 
	}
	else
	{
		$_SESSION['status'] = $query;  
		header('Location: subject.php'); 
	}
}
#Update Subject End


#delete Subject

if (isset($_POST['deletesub'])) {


	$del_sub = $_POST['delsub'];


	$query = "DELETE FROM `subject` WHERE `subject`='$del_sub' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: subject.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: subject.php'); 
	}
}

#delete Subject End





 ?>