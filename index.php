<html>
  <head>
    <title>OurSurvey</title>
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
      padding-left: 150px;
      margin:25px;
    }
    .div2{
      position: relative;
      top:190;
      left:280;
      font-size: 65;
    }
    .but1{
      font-family: "Arial";
      font-size: 20;
      height: 55;
      position: relative;
      width: 130;
      background-color: rgb(229, 244, 66);
      border-radius: 7px;
      font-weight: bold;
      border-width: 1px;
      top: 20;
      left: 200;
    }
    .but1:hover{
      cursor: pointer;
      background-color:rgb(228, 239, 110);
    }
    </style>
  </head>
  <body>
    <div class="hea">
    <span class="hname"><b>OurSurvey</b></span>
  </div>
  <div class="div2">
    Create Surveys, Get Answers
    <br>
    <form>
    <input type="button" class="but1" name="signup" value="Sign Up" onClick=" document.location.href='signup.php'">
    <input type="button" class="but1" name="signin" value="Sign In" onClick=" document.location.href='signin.php'">
  </form>
  </div>
  </body>
</html>
