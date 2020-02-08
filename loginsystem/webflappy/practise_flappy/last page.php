<?php

$error = '';
$name = '';
$hscore = '';
$lscore= '';

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
 
 if(empty($_POST["hscore"]+ 1))
 {
  $error .= '<p><label class="text-danger">High score  is required</label></p>';
 }
 else
 {
  $hscore = clean_text($_POST["hscore"]);
 }
 if(empty($_POST["lscore"]+1))
 {
  $error .= '<p><label class="text-danger">Lowest score is required</label></p>';
 }
 else
 {
  $lscore = clean_text($_POST["lscore"]);
 }
 
 if($error == '')
 {
 	// FILE NAMES
	$out = '../ParticipantInfo.csv';
	$file_open = fopen($out, 'a');
	fwrite($file_open, $name);
	fwrite($file_open,",");
	fwrite($file_open, $hscore);
	fwrite($file_open,",");
	fwrite($file_open, $lscore);
	fwrite($file_open,",");
	fclose($file_open);

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'thankyou.html';
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
   <h2 align="center"> Tell Us your Scores </h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Your Name </label> <br>
      <input type="text" name="name" placeholder="Enter Name" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>What was your Highest Score</label> <br>
      <input type="text" name="hscore" placeholder="Enter Highest Score" value="<?php echo $hscore; ?>" />
     </div>
     <div class="form-group">
      <label>What was your Lowest Score</label> <br>
      <input type="text" name="lscore" placeholder="Enter Lowest Score" value="<?php echo $lscore; ?>" />
     </div>
     
     
     <div class="form-group" align="center">

     <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     
     </div>
    </form>
   </div>
  </div>
 </body>
</html>