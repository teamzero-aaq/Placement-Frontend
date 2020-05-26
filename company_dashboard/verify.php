<?php  
include('security.php');
#session_start();

 #require 'db.php';

#Create ,user,company

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





#update ,user,company

if (isset($_POST['updateregister'])) {

	$name =$_POST['upname'];
	$username =$_POST['upusername'];
	$email =$_POST['upmailid'];
	$contact =$_POST['upcontact'];
	$password =$_POST['uppassadmin'];
	$type = 1;

	$query = "UPDATE `register` SET `name`='$name',`contact` ='$contact',`username`='$username',`password` ='$password',`email` ='$email',`usertype` = $type WHERE `username` = '$username' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Update User";
		header('Location: register_update.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: register_update.php'); 
	}
}

#update ,user,company End



#delete ,user,company

if (isset($_POST['deletebtn'])) {


	$username = $_POST['deluname'];


	$query = "DELETE FROM `register` WHERE `username`='$username' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: addadmin.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: addadmin.php'); 
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

 ?>