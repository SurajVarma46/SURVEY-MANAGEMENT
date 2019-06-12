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
    $name=$_COOKIE['username'];
        $con=mysqli_connect("localhost","root","","project");
        if(!$con){
        echo mysqli_error($con);
        }
        $sql1="select * from signup";
        $result=mysqli_query($con,$sql1);
        if(!$result){
        echo "insertion not successfull";
        echo mysqli_error($con);
        }
        else{
$numcol=mysqli_num_fields($result);
$numcol1=$numcol-2;
$idarr=array();
$idname=1;
while($idname!=$numcol1){
$sql2="select `$idname` from signup where name='$name'";
$result1=mysqli_query($con,$sql2);
if(!$result1){
echo mysqli_error($con);
}
else{

   $row=mysqli_fetch_row($result1);
   //print_r($row);
   if($row[0]==1){

     $idarr[]=$idname;
   }


}
$idname++;
}
foreach($idarr as  $value) {
  $sql3="select id,ques,option1,option2,option3,option4 from question where id='$value'";
  $result2=mysqli_query($con,$sql3);
  if(!$result2){
  echo mysqli_error($con);
  }
  else{
  while($row=mysqli_fetch_row($result2)){
    echo $row[0]." : ".$row[1]."<br><br><br>";

  }
  }
}
        }

         ?>

      </div>
    </center>
  </body>
</html>
