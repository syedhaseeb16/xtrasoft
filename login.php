
<?php
if(isset($_POST['login'])){
   require_once 'config.php'; 
    $id=$_POST['id'];
    $password=$_POST['password'];
    $flag_existing=0;
    $check = "SELECT * FROM users";
    $re_check = $conn->query($check);
     while($rec=$re_check->fetch_assoc()){
      if($rec["user_id"]==$id && $rec["password"]==$password)
      {
        $flag_existing=1;
        break;
      }
    }

  if($flag_existing==1){
     session_start();
     $_SESSION["user"] = $id;
      header('Location: home.php');
  }else{
    session_start();
    $_SESSION["err"] = "Invalid ID or Password.";
    header('Location: index.php');
  }
}
?>