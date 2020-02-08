<?php

$error = '';
$name = '';
$email = '';
$age = '';
$gender = '';
$dhand = '';


function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["age"]))
 {
  $error .= '<p><label class="text-danger"> Age is required </label></p>';
 }
 else
 {

    $age = clean_text($_POST["age"]); 
  if ( $age < 18)
  {
    $error .= '<p><label class="text-danger">Not eligble </label></p>';
  }
 }
 if(empty($_POST["gender"]))
 {
  $error .= '<p><label class="text-danger">Gender is required</label></p>';
 }
 else
 {
  $gender = clean_text($_POST["gender"]);
 }
 if(empty($_POST["dhand"]))
 {
  $error .= '<p><label class="text-danger">Dominant Hand is required</label></p>';
 }
 else
 {
  $dhand = clean_text($_POST["dhand"]);
 }
 
 if($error == '')
 {
  $file_open = fopen("ParticipantInfo.csv", "a");
  
  fwrite("\n");
  fwrite($file_open, $name);
  fwrite($file_open, ",");
  fwrite($file_open, $email);
  fwrite($file_open, ",");
  fwrite($file_open, $age);
  fwrite($file_open, ",");
  fwrite($file_open, $gender);
  fwrite($file_open, ",");
  fwrite($file_open, $dhand);
  fwrite($file_open, ",");
  fclose($file_open);

  $error = '<label class="text-success">Thank you </label>';
  $name = '';
  $email = '';
  $age = '';
  $gender = '';
  $dhand = '';

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'firstpage.html';
header("Location: http://$host$uri/$extra");

 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Contact Form</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Tell Us About Yourself </h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group">
      <label>Age</label>
      <input type="text" name="age" class="form-control" placeholder="Enter Age" value="<?php echo $age; ?>" />
     </div>
     <div class="form-group">
      <label>Gender</label>
      <input type="text" name="gender" class="form-control" placeholder="Enter Gender" value="<?php echo $gender; ?>" />
     </div>
     <div class="form-group">
      <label>Dominant Hand</label>
      <input type="text" name="dhand" class="form-control" placeholder="Enter Dominant Hand" value="<?php echo $dhand; ?>" />
     </div>
     
     <div class="form-group" align="center">

      
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     
     </div>
    </form>
   </div>
  </div>
 </body>
</html>