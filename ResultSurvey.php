<html>
  <head>
    <style>
    .hea{
      font-family:"Gabriola";
      font-size: 70px;
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
    .but2{
      font-family: "Arial";
      font-size: 15;
      height: 45;
      font-weight: bold;
      float:left;
      width: 100;
      border-width: 0px;
      border-style: solid;
      background-color: #2B05EB;
    }
    .but3{
      font-family: "Arial";
      font-size: 15;
      height: 45;
      font-weight: bold;
      float:right;
      width: 100;
      border-width: 0px;
      border-style: solid;
      background-color: #2B05EB;
    }
    .div2{
      position: relative;
      top:190;
      left:280;
      font-size: 45;
    }
    .tab1{
      padding-left: 50px;
      position: relative;
      top:220;
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
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if(!(isset($_COOKIE['username']))){

      header("Location: signin.php");
    }
    if(isset($_POST['submit'])){

    $nameid=$_REQUEST['name'];
    $con=mysqli_connect("localhost","root","","project");
    if(!$con){
    print "<script type=\"text/javascript\">";
    print "alert('Connection not successfull')";
    print "</script>";
    //  echo "Connection not successfull";
    }
    else{
    $name=$_COOKIE['username'];
    $sql="select id from question";
    if($idresult=mysqli_query($con,$sql)){
    $numrows=mysqli_num_rows($idresult);
    }
    else {
    echo mysqli_error($con);
    }
    if($numrows<$nameid){
    print "<script type=\"text/javascript\">";
    print "alert('Invalid Tracking Id.')";
    print "</script>";
    }
    else{
      $sql1="select `$nameid` from signup where name='$name'";
      $result=mysqli_query($con,$sql1);
      if(!$result){
      echo "insertion not successfull";
      echo mysqli_error($con);
      }

      else{
      $row=mysqli_fetch_row($result);
      $id=$row[0];
    //  if($id==1){
        setcookie('id',$nameid,time()+60*60*24*60);
        header('Location:ResultSurveyDetails.php');

      }


    }
  }
}


     ?>
    <div class="hea">
    <span class="hname"><b>OurSurvey</b></span>
    <span style="font-size: 30px; padding-left:700px;">Welcome </span>&nbsp
    <font size="6">
    <?php
    echo $_COOKIE['username'];
     ?>
   </font>
   <br>
   <input type="button" class="but2" name="home" value="HOME" onClick=" document.location.href='welcome.php'">
   <input type="button" class="but3" name="logout" value="LOG OUT" onClick=" document.location.href='vlogout.php'">

  </div>
  <div class="div2">
OurSurvey.Collect Answers For Your Questions.
  </div>
  <center>
    <div class="tab1">
<form name="f1" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <label class="lab" for="name">Enter a tracking Id :</label><br><br>
  <input  class="txt" type="text" name="name" id="name" required><br><br>

  <input class="but1" type="submit" name="submit" value="OK =>">
</form>
    </div>
  </center>
  </body>
</html>
