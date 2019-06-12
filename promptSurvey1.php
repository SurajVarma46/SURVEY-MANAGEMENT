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
	if(isset($_POST['submit'])){
	  $con=mysqli_connect("localhost","root","","project");
	  $sql1="update signup set `$id`=2 where name='$name'";
	  if(!mysqli_query($con,$sql1)){
	  echo "query not successfull";
	  echo mysqli_error($con);
	  }
	  $a=$_REQUEST['one'];
	}
	$id=$_COOKIE['id'];
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
    </div></center>
	<?php
	if($a==1){
		$sql = "select responseA from question where id='$id'"; 
		
			  $result=mysqli_query($con,$sql);
			  $result1=0;
			  $result1 = mysqli_fetch_assoc($result);
			$result1['responseA']++;
			$value = $result1['responseA'];
		$sql2 = "UPDATE question SET responseA='$value' where id='$id'";
		$result2=mysqli_query($con,$sql2);

	}
	else if($a==2){
		$sql = "select responseB from question where id='$id'"; 
		
			  $result=mysqli_query($con,$sql);
			  $result1=0;
			  $result1 = mysqli_fetch_assoc($result);
			$result1['responseB']++;
			$value = $result1['responseB'];
		$sql2 = "UPDATE question SET responseB='$value' where id='$id'";
		$result2=mysqli_query($con,$sql2);
	}
	else if($a==3){
		$sql = "select responseC from question where id='$id'"; 
		
			  $result=mysqli_query($con,$sql);
			  $result1=0;
			  $result1 = mysqli_fetch_assoc($result);
			$result1['responseC']++;
			$value = $result1['responseC'];
		$sql2 = "UPDATE question SET responseC='$value' where id='$id'";
		$result2=mysqli_query($con,$sql2);
	}
	else{
		$sql = "select responseD from question where id='$id'"; 
		
			  $result=mysqli_query($con,$sql);
			  $result1=0;
			  $result1 = mysqli_fetch_assoc($result);
			$result1['responseD']++;
			$value = $result1['responseD'];
		$sql2 = "UPDATE question SET responseD='$value' where id='$id'";
		$result2=mysqli_query($con,$sql2);
	}
	?>
  </body>
  <script>
	if(window.history.replaceState){
		window.history.replaceState(null,null,window.location.href);
	}
  </script>
  
</html>

  