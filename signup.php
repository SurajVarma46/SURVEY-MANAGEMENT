<html>
<title>
  Sign Up
</title>
<head>
  <style>
  .hea{
    font-family:"Gabriola";
    font-size: 50px;
    color:white;
    position: fixed;
    top:0;
    left: 0;
    width: 100%;
    background-color: #2B05EB;
    z-index: 10;
  }
  .hname{
    padding-left: 35px;
    margin:25px;
  }
  .tab1{
    padding-left: 50px;
    position: relative;
    top:180;
    width: 40%;
    border-radius: 5px;
    padding-top:  25px;
    border-width: 1px;
    border-color: black;
    border-style: solid;
    padding-left: 35px;
    padding-bottom: 35px;
    background-color: rgb(234, 236, 239);
    text-align: left;
    margin-bottom: 20px;

  }

  .txt{
height: 30;
width: 350;
border-radius: 3px;
font-size: 15px;
font-weight: bold;
margin: 2px;
border-style: solid;
border-width: thin;
  }
  .lab{
    font-family: "Arial";
    font-weight: bold;
    font-size: 14;
  }
  .but1{
    font-family: "Arial";
    height: 35;
    width: 90;
    background-color: rgb(229, 244, 66);
    border-radius: 7px;
    font-weight: bold;
  }
  .but1:hover{
    cursor: pointer;
    background-color:rgb(228, 239, 110);
  }
  .div2{
    position: relative;
    top:140;
    left:280;
    font-size: 40;
  }
  .inst{
    font-size: 12;
    font-weight: bold;
    font-family:  Arial;
    color:rgb(76,76,76);
  }
  </style>
</head>
<body>
  <?php
  if(isset($_POST['submit'])){
  $a='/^[a-zA-Z0-9]{1,20}$/';
  $name=$_REQUEST['name'];
  $pass1=$_REQUEST['pass1'];
  $pass2=$_REQUEST['pass2'];
  $eid=$_REQUEST['eid'];
  if(strlen($name)>20){
    print "<script type=\"text/javascript\">";
    print "alert('Username is allowed with only 20 characters and should not contain spaces.')";
    print "</script>";
  }
  else if (preg_match($a,$name)==false) {
    print "<script type=\"text/javascript\">";
    print "alert('Username should not contain spaces or special characters.')";
    print "</script>";
  }
  else if (strlen($pass1)<7||strlen($pass2)<7) {
    print "<script type=\"text/javascript\">";
    print "alert('Password should be atleast 7 characters.')";
    print "</script>";
  }
  else if ($pass1!=$pass2) {
    print "<script type=\"text/javascript\">";
    print "alert('Passwords do not match.')";
    print "</script>";
  }
  else{

    $con=mysqli_connect("localhost","root","","project");
    if(!$con){
      print "<script type=\"text/javascript\">";
      print "alert('Connection not successfull')";
      print "</script>";
    }
    else{
    $sql="insert into signup (name,password,eid) values('$name','$pass1','$eid')";
    if(!mysqli_query($con,$sql)){
    print "<script type=\"text/javascript\">";
    print "alert('insertion not successfull')";
    print "</script>";
    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    }
    else{
      print "<script type=\"text/javascript\">";
      print "alert('You have been successfully registered.')";
		print "</script>";
      setcookie('username',$name,time()+60*60*24*60);
      setcookie('emailid',$eid,time()+60*60*24*60);
	  $a=1;
header( 'Location:signin.php' ) ; 
	  
}
    }
    mysqli_close($con);
}
header( 'Location:signup.php' ) ; 
  }
   ?>
  <div class="hea">
  <span class="hname"><b>OurSurvey</b></span>
</div>
<div class="div2">
  Sign Up for your account
  <span style="font-size:15; padding-left:110px;">Already have an account? <br><a 
  style="padding-left:625px;" href="signin.php">Sign In</a></span>
</div>
<center>
<div class="tab1">

    <form name="f1" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

      <label class="lab" for="name">Choose a username :</label><br><br>
      <input  class="txt" type="text" name="name" id="name" value="<?php   if(isset($_POST['submit']))
	  { echo $_POST['name'];} ?>" required><br>
    <span class="inst"><b>Upto 20 characters,no spaces and special characters.</span><br><br>

      <label class="lab" for="pass1">Choose a password :</label><br><br>
      <input  class="txt" type="password" name="pass1" id="pass1" required><br>
      <span class="inst"><b>Atleast 7 characters.</span><br><br>

      <label class="lab" for="pass2">Re-type password :</label><br><br>
      <input  class="txt" type="password" name="pass2" id="pass2" required><br><br>

      <label class="lab" for="eid">Enter your contact email :</label><br><br>
      <input  class="txt" type="email" name="eid" id="eid"  value="<?php   if(isset($_POST['submit']))
	  { echo $_POST['eid'];} ?>" required><br>
      <span class="inst"><b>Upto 50 characters.</span><br><br>

      <input class="but1" type="submit" name="submit" value="Sign up =>">

  </form>

</div>
</center>
</body>
</html>
