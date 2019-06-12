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
    .lab{
      font-family: "Arial";
      font-weight: bold;
      font-size: 14;
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
     ?>
    <div class="hea">
    <span class="hname"><b>Online Survey</b></span>
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
    <center>
    <div class="tab1">
<?php
$count=0;
$name=$_COOKIE['username'];
$con=mysqli_connect("localhost","root","","project");
if(!$con){
  print "<script type=\"text/javascript\">";
  print "alert('Connection not successfull')";
  print "</script>";
//  echo "Connection not successfull";
}
else{
$id=$_COOKIE['id'];
$sql="select ques,option1,option2,option3,option4 from question where id='$id'";
if(!mysqli_query($con,$sql)){
echo "query not successfull";
echo mysqli_error($con);
}
else{
  $result=mysqli_query($con,$sql);
  if(!$result){
  echo "query not successfull";
  echo mysqli_error($con);
  }
  else{
    $row=mysqli_fetch_row($result);
  }
}


}
foreach ($row as $value) {
if(!$value==NULL){
$count++;

}
}

 ?>
 <form method="post" action="promptSurvey1.php">
<p class="lab1">
<?php echo "  ".$id." : ".$row[0]; ?>
</p>

<input type="radio" name="one" value="1" required> <?php echo "  ".$row[1] ?>
<br><br>
<?php setcookie('id',$id,time()+60*60*24*60);
?>
<input type="radio" name="one" value="2"> <?php echo "  ".$row[2] ?>
<br><br>
<input type="radio" name="one" value="3"> <?php echo "  ".$row[3] ?>
<br><br>
<input type="radio" name="one" value="4"> <?php echo "  ".$row[4] ?>
<br><br>

<input class="but1" type="submit" name="submit" value="Submit =>">
 </form>
    </div>
  </center>
  </body>
</html>
