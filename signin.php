<html>
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
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
    }
    .hname{
      padding-left: 35px;
      margin:25px;
    }
    .div2{
      position: relative;
      top:140;
      left:280;
      font-size: 40;
    }
    .tab1{
      padding-left: 50px;
      position: relative;
      top:180;
      width: 40%;
      border-radius: 5px;
      padding-top:  25px;
      padding-left: 35px;
      padding-bottom: 35px;
      background-color: rgb(234, 236, 239);
      text-align: left;
      margin-bottom: 20px;
      border-width: 1px;
      border-color: black;
      border-style: solid;
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
    </style>
  </head>
  <body>
    <?php
    if((isset($_COOKIE['username']))){
      header("Location: welcome.php");
    }
     ?>
    <div class="hea">
    <span class="hname"><b>Online Survey</b></span>
  </div>
  <div class="div2">
    Sign In for your account
    <span style="font-size:15; padding-left:110px;">Don't have an account? <br><a style="padding-left:590px;" 
	href="signup.php">Sign Up</a></span>
  </div>
<center>
  <div class="tab1">

    <form name="f2" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <label class="lab" for="name">Enter your username :</label><br><br>
      <input  class="txt" type="text" name="name" id="name" value="<?php   if(isset($_POST['submit']))
	  { echo $_POST['name'];} ?>" required><br><br>
      <label class="lab" for="pass">Enter your password :</label><br><br>
      <input  class="txt" type="password" name="pass" id="pass" required><br>
      <input type="checkbox" onchange="document.getElementById('pass').type = this.checked ? 'text' : 'password'" id="check">
      <label class="lab" for="check">Show password</label><br><br>
      <label class="lab" for="capt">Enter Captcha as Shown:</label>
      <?php
      session_start();
      if(isset($_POST['submit'])){
        $name=$_REQUEST['name'];
        $pass=$_REQUEST['pass'];
        $capt=$_REQUEST['capt'];
        $a=$_SESSION['my_captcha'];
        if (!($a==$capt)) {
          print "<script type=\"text/javascript\">";
          print "alert('enter valid captcha')";
          print "</script>";
        }
        else{
        $con=mysqli_connect("localhost","root","","project");
        if(!$con){
          print "<script type=\"text/javascript\">";
          print "alert('Connection not succcesfull')";
          print "</script>";
        }
        else{

        $sql="select name,password from signup";
        $result=mysqli_query($con,$sql);
        if(!$result){
          print "<script type=\"text/javascript\">";
          print "alert('query execution not successfull')";
          print "</script>";
        echo mysqli_error($con);
        }
        else{
        while ($row=mysqli_fetch_row($result)) {
          if($row[0]==$name&&$row[1]==$pass){
            setcookie('username',$name,time()+60*60*24*60);
            header('Location:welcome.php');
          }
        }
        print "<script type=\"text/javascript\">";
        print "alert('Username and Password does not match.')";
        print "</script>";
        }
        }
        mysqli_close($con);
        }
      }
        create_image();
        print "<img src=image.png?".date("U").">";
        function create_image(){

      if(isset($_SESSION['my_captcha']))
      {
      unset($_SESSION['my_captcha']);
      }
      $string1="abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ";
      $string2="1234567890";
      $string=$string1.$string2;
      $string= str_shuffle($string);
      $random_text= substr($string,0,6);
      $_SESSION['my_captcha'] =$random_text;
      $im = @imageCreate (100,30) or die ("Cannot Initialize new GD image stream");

      $background_color = imageColorAllocate ($im, 204, 204, 204);
      $text_color = imageColorAllocate ($im, 51, 51, 255);
      imageString($im,5,5,10,$_SESSION['my_captcha'],$text_color);
      imagePng($im,"image.png");
      imagedestroy($im);
    }
       ?>
       <br><br>
      <input  class="txt" type="text" name="capt" id="capt" required><br><br>
      <input class="but1" type="submit" name="submit" value="Sign In =>">
  </form>
  </div>
</center>
  </body>
</html>
