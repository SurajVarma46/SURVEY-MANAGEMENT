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
    .card1{
position: relative;
top:220;
font-family: "Arial";
font-weight: bold;
font-size: 18;
border: solid;
width: 30%;
border-width: 1px;
border-color: black;
border-style: solid;
box-shadow: 10px 10px 5px #888888;

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
      <div class="card1">
        FRONT END & BACK END <br>        <br><br>
	16331A0567 - SIVA SAI KRISHNA SURAJ VARMA KAKARLAPUDI <br><br>
	16331A0576 - KAZI FARIADUL ISLAM <br><br>
	16331A0571 - KRISHNA CHAITANYA KANAPARTHY <br>
      </div>
    </center>
  </body>
</html>
