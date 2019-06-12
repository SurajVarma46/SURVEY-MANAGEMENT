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
    .tab1{
      padding-left: 50px;
      position: relative;
      top:100;
      margin-top: 180;
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
    <span class="hname"><b>DSurvey</b></span>
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
$nameid=$_COOKIE['id'];
$name=$_COOKIE['username'];
$con=mysqli_connect("localhost","root","","project");
if(!$con){
print "<script type=\"text/javascript\">";
print "alert('Connection not successfull')";
print "</script>";
//  echo "Connection not successfull";
}
else{
$sql1="select '$nameid' from signup where name='$name'";
$result=mysqli_query($con,$sql1);
if(!$result){
echo "insertion not successfull";
echo mysqli_error($con);
}
else{
$row=mysqli_fetch_row($result);
$id=$row[0];
//if($id==1){
$sql2="select * from question where id='$nameid'";
$result1=mysqli_query($con,$sql2);
if(!$result1){
echo "insertion not successfull";
echo mysqli_error($con);
}
else{
$row=mysqli_fetch_row($result1);
for($i=0;$i<10;$i++){
if($row[$i]==NULL){
  $row[$i]=0;
}
}
echo $row[0]." : ".$row[1]."<br>";
echo "<br> A : ".$row[2];
echo "<br> B : ".$row[3];
echo "<br> C : ".$row[4];
echo "<br> D : ".$row[5];
echo "<br><br> Result :<br>";
echo "<br>A got ".$row[6]." votes.";
echo "<br>B got ".$row[7]." votes.";
echo "<br>C got ".$row[8]." votes.";
echo "<br>D got ".$row[9]." votes.";
}
//}

}
}
 ?>
 <br><br>
 <input type="button" name="ok" value="GoBack" onClick="location.href='ResultSurvey.php'">

    </div>
  </center>
  </body>
</html>
