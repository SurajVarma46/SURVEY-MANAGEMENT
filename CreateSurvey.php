<html>
  <head>
    <title>Create Survey</title>
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
      margin:15px;
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

    .inst{
      font-size: 12;
      font-weight: bold;
      font-family:  Arial;
      color:rgb(76,76,76);
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
    .txt1{
      height: 80;
      width: 350;
      border-radius: 3px;
      font-size: 15px;
      font-weight: bold;
      margin: 2px;
      border-style: solid;
      border-width: thin;

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
<form method="post" action="createsurveycheck.php">
  <label class="lab" for="ques">Enter Your question :</label><br><br>
  <textarea class="txt1" type="text" name="ques" id="ques" required></textarea><br>
  <span class="inst"><b>Upto 100 characters.</span><br><br>

    <label class="lab" for="op1">Enter your option 1 :</label><br><br>
    <input  class="txt" type="text" name="op1" id="op1" required><br><br>

    <label class="lab" for="op2">Enter your option 2 :</label><br><br>
    <input  class="txt" type="text" name="op2" id="op2" required><br><br>

    <label class="lab" for="op3">Enter your option 3 :</label><br><br>
    <input  class="txt" type="text" name="op3" id="op3" ><br><br>

    <label class="lab" for="op4">Enter your option 4 :</label><br><br>
    <input  class="txt" type="text" name="op4" id="op4" <br><br>

    <input class="but1" type="submit" name="submit" value="Submit">

</form>
</div>
</center>
  </body>
</html>
