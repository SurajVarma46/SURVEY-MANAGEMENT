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
    .tab1{
      padding-left: 50px;
      position: relative;
      top:180;
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
    if(isset($_POST['submit'])){

      $a=$_POST['ques'];
      $b=$_POST['op1'];
      $c=$_POST['op2'];
      $d=$_POST['op3'];
      $e=$_POST['op4'];
      $con=mysqli_connect("localhost","root","","project");
      if(!$con){
        print "<script type=\"text/javascript\">";
        print "alert('Connection not successfull')";
        print "</script>";
      }
      else{
        $id="select id from question";
        if($idresult=mysqli_query($con,$id)){
          $numrows=mysqli_num_rows($idresult);
        }
      $idval=$numrows+1;
      $sql="insert into question (id,ques,option1,option2,option3,option4) values ($idval,'$a','$b','$c','$d','$e')";
      if(!mysqli_query($con,$sql)){
      echo "insertion not successfull";
      echo mysqli_error($con);
      }
      else {
        echo "<h4> Your survey have been stored with Tracking ID ".$idval;
        $name=$_COOKIE['username'];
        $sql1="alter table signup add `$idval` int(10)";
        $sql2="update signup set `$idval`=1 where name='$name'";
        if(!mysqli_query($con,$sql1)){
        echo  mysqli_error($con);
        }
        if(!mysqli_query($con,$sql2)){
        echo  mysqli_error($con);
        }
      }
    }
  }
?>
</div>
</center>
  </body>
</html>
