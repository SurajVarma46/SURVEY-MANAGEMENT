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
    $id=$_COOKIE['id'];
    $name=$_COOKIE['username'];
if(isset($_POST['submit'])){
  $con=mysqli_connect("localhost","root","","project");
  $sql1="update signup set `$id`=2 where name='$name'";
  if(!mysqli_query($con,$sql1)){
  echo "query not successfull";
  echo mysqli_error($con);
  }
$a=$_REQUEST['one'];
if($a==1){
$sql2="select $a from question where id='$id'";
$re=mysqli_query($con,$sql2);
if(!$re){
echo "query not successfull";
echo mysqli_error($con);
}
  $row=mysqli_fetch_row($re);
if($row[0]==NULL){
//  echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>".$row[0];
$sql3="update question set $a=1 where id='$id'";
$res=mysqli_query($con,$sql3);
if(!$res){
echo "query not successfull";
echo mysqli_error($con);
}
}
else{
$sql4="select $a from question where id='$id'";
$resu=mysqli_query($con,$sql4);
if(!$resu){
echo "query not successfull";
echo mysqli_error($con);
}
  $row=mysqli_fetch_row($resu);
  $val1=$row[0]+1;
  $sql5="update question set $a='$val1' where id='$id'";
  $result=mysqli_query($con,$sql5);
  if(!$result){
  echo "query not successfull";
  echo mysqli_error($con);
  }
}

}

if($a==2){
$sql2="select $b from question where id='$id'";
$re=mysqli_query($con,$sql2);
if(!$re){
echo "query not successfull";
echo mysqli_error($con);
}
  $row=mysqli_fetch_row($re);
if($row[0]==NULL){
//  echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>".$row[0];
$sql3="update question set $b=1 where id='$id'";
$res=mysqli_query($con,$sql3);
if(!$res){
echo "query not successfull";
echo mysqli_error($con);
}
}
else{
$sql4="select $b from question where id='$id'";
$resu=mysqli_query($con,$sql4);
if(!$resu){
echo "query not successfull";
echo mysqli_error($con);
}
  $row=mysqli_fetch_row($resu);
  $val1=$row[0]+1;
  $sql5="update question set $b='$val1' where id='$id'";
  $result=mysqli_query($con,$sql5);
  if(!$result){
  echo "query not successfull";
  echo mysqli_error($con);
  }
}
}


if($a==3){
$sql2="select $c from question where id='$id'";
$re=mysqli_query($con,$sql2);
if(!$re){
echo "query not successfull";
echo mysqli_error($con);
}
  $row=mysqli_fetch_row($re);
if($row[0]==NULL){
$sql3="update question set $c=1 where id='$id'";
$res=mysqli_query($con,$sql3);
if(!$res){
echo "query not successfull";
echo mysqli_error($con);
}
}
else{
$sql4="select $c from question where id='$id'";
$resu=mysqli_query($con,$sql4);
if(!$resu){
echo "query not successfull";
echo mysqli_error($con);
}
  $row=mysqli_fetch_row($resu);
  $val1=$row[0]+1;
  $sql5="update question set $c='$val1' where id='$id'";
  $result=mysqli_query($con,$sql5);
  if(!$result){
  echo "query not successfull";
  echo mysqli_error($con);
  }
}
}


if($a==4){
$sql2="select $d from question where id='$id'";
$re=mysqli_query($con,$sql2);
if(!$re){
echo "query not successfull";
echo mysqli_error($con);
}
  $row=mysqli_fetch_row($re);
if($row[0]==NULL){
//  echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>".$row[0];
$sql3="update question set $d=1 where id='$id'";
$res=mysqli_query($con,$sql3);
if(!$res){
echo "query not successfull";
echo mysqli_error($con);
}
}
else{
$sql4="select $d from question where id='$id'";
$resu=mysqli_query($con,$sql4);
if(!$resu){
echo "query not successfull";
echo mysqli_error($con);
}
  $row=mysqli_fetch_row($resu);
  $val1=$row[0]+1;
  $sql5="update question set $d='$val1' where id='$id'";
  $result=mysqli_query($con,$sql5);
  if(!$result){
  echo "query not successfull";
  echo mysqli_error($con);
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
    <center>
    <div class="tab1">
<p class="lab">
Your answers have been successfully stored.<br>
Thank you for your valuable Contribution.
</p>
    </div>
  </center>
  </body>
</html>
