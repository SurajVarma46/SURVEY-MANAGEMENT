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
    .div2{
      position: relative;
      top:250;
      left:280;
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
    .txt{

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
    .inst{
      font-size: 12;
      font-weight: bold;
      font-family:  Arial;
      color:rgb(76,76,76);
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
  <form name="f1" method="post" action="PHPMailer-master/examples/gmail1.php">
  <label class="lab" for="name">Enter Email Address :</label><br><br>
  <textarea class="txt" name="name" id="name" rows="8" cols="40" required></textarea><br>
  <span class="inst"><b>You can Enter Multiple mail Addresses with a special character comma( , ) in between them.</span><br><br>

  <input class="but1" type="submit" name="submit" value="SHARE =>">
  </form>
  </div>
  </center>
  </body>
</html>
