<?php
$name=$_COOKIE['username'];
$con=mysqli_connect("localhost","root","","project");
$sql="select id from question";
if($idresult=mysqli_query($con,$sql)){
  $numrows=mysqli_num_rows($idresult);
}
else {
  echo mysqli_error($con);
}
for ($i=1; $i <$numrows+1 ; $i++) {
  if(isset($_POST[$i])){
    $sql1="select `$i` from signup where name='$name'";
    $result=mysqli_query($con,$sql1);
    if(!$result){
    echo "insertion not successfull";
    echo mysqli_error($con);
    }
    else{
    $row=mysqli_fetch_row($result);
    $id=$row[0];
    if($id==1){
      print "<script type=\"text/javascript\">";
      print "alert('you cannot take your own Survey.')";
      print "</script>";
      header('Location:AllSurvey.php');
    setcookie('temp',1,time()+60*60*24*60);
    }
    else if($id==2){
      print "<script type=\"text/javascript\">";
      print "alert('you have already attempted this Survey.')";
      print "</script>";
            header('Location:AllSurvey.php');
                setcookie('temp',1,time()+60*60*24*60);
    }
    else{
    setcookie('id',$i,time()+60*60*24*60);
    header('Location:answerSurvey.php');

    }
    }
  }
}

 ?>
