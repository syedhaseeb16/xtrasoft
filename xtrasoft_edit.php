<?php   require_once 'config.php'; 

    session_start();
        if (!isset($_SESSION['user'])) {
          header('Location: index.php');
    $_SESSION["err"] = "Unauthorized Access.Pls login First";
   
        }
  if(isset($_POST['update_xtrasoft'])){
    $flag_existing=0;
    $xtra_soft_id=$_POST["xtra_soft_id"];
    $flag_existing=0;
    $xtrasoft_en_phone=$_POST["xtrasoft_en_phone"];
    $xtrasoft_FR_phone=$_POST["xtrasoft_FR_phone"];
    $xtrasoft_livechat_en =$_POST["xtrasoft_livechat_en"];
    $xtrasoft_livechat_FR=$_POST["xtrasoft_livechat_FR"];
    $xtrasoft_suport_en=$_POST["xtrasoft_suport_en"];
    $xtrasoft_suport_FR=$_POST["xtrasoft_suport_FR"];
    $xtrasoft_email_en  =$_POST["xtrasoft_email_en"];      
    $xtrasoft_email_FR=$_POST["xtrasoft_email_FR"];
    $xtrasoft_logo=$_POST["xtrasoft_logo"];


    $queryyy_up = "UPDATE xtrasoft SET 
     xtrasoft_en_phone = '$xtrasoft_en_phone',
    xtrasoft_FR_phone = '$xtrasoft_FR_phone',
     xtrasoft_suport_en = '$xtrasoft_suport_en',
    xtrasoft_livechat_en = '$xtrasoft_livechat_en',
    xtrasoft_livechat_FR='$xtrasoft_livechat_FR',
    xtrasoft_suport_en = '$xtrasoft_suport_en', 
    xtrasoft_suport_FR = '$xtrasoft_suport_FR',
    xtrasoft_logo = '$xtrasoft_logo',
    xtrasoft_email_en = '$xtrasoft_email_en',
     xtrasoft_email_FR = '$xtrasoft_email_FR'
      where  xtra_soft_id='$xtra_soft_id'";
  if (mysqli_query($conn, $queryyy_up)) {
  ?><div class="alert alert-success">
    <strong>Success!</strong> Record has been successfully updated.
  </div>
<?php

  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }




  }


 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body {
  margin: 0;
 
  font-family: Arial, Helvetica, sans-serif;
}



#navbar {
  
  background-color: black;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.content {
  margin-top: 30px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}


</style>
</head>
<body>
<div class="container">
<div class="container">
       <div class="btn-group bg-primary"  role="group" aria-label="Basic example">
      <a class="active" href="home.php">
         <button class="btn  btn-primary"  > Home</button>  
      </a>
      <a class="active" href="all_manufactr.php">
         <button class="btn  btn-primary"  > Manufacturer</button>  
      </a>
     <a class="active" href="all_manufactr.php">
         <button class="btn  btn-primary"  > OS Edition</button>  
      </a>
      <a class="active" href="xtrasoft_edit.php">
         <button class="btn  btn-primary"  > xtrasoft</button>  
      </a>
      <a class="active" href="index.php">
         <button class="btn  btn-primary"  > logout</button>  
      </a>
     </div>
</div>

<?php  
$query = "SELECT * FROM xtrasoft ";
$result = $conn->query($query); 
$row = $result->fetch_assoc();
?>
<div class="container content">

<form action="xtrasoft_edit.php?id=<?php echo $row["xtra_soft_id"] ?>"  method="POST">
  <label for="projects"><b>EDIT xtraSOFT DATA</b> </label>
  <div class="row">
    <div class="col-sm-2" >
      <label for="exampleInputPassword1">Manufacturer Name:</label>
      <input type="hidden" class="form-control" value="<?php echo  $row['xtra_soft_id']; ?>" name="xtra_soft_id" id="exampleInputPassword1" placeholder="">

      <!--<input type="text" class="form-control" value="<?php //echo  $row['Manufacturer']; ?>" name="Manufacturer" id="exampleInputPassword1" placeholder="project name">-->
    </div>

    <div class="col-sm-7" >
      <label for="exampleInputPassword1">xtrasoft Logo URL:</label>
       <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_logo']; ?>" name="xtrasoft_logo" id="exampleInputPassword1" placeholder="logo url">
    </div>

        <div class="col-sm-3" >
       <br>
     
     </div>


  </div>

    <div class="row">
      <div class="col-sm-2"  >
       
      </div>
      <div class="col-sm-5" >
      <b>EN</b>
      </div>
      <div class="col-sm-5" >
      <b>FR</b>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2"  >
       <b>Phone #</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_en_phone']; ?>" name="xtrasoft_en_phone" id="exampleInputPassword1" placeholder="xtrasoft en phone">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_FR_phone']; ?>" name="xtrasoft_FR_phone" id="exampleInputPassword1" placeholder="xtrasoft_FR_phone">
      </div>
    </div>


    <div class="row">
      <div class="col-sm-2"  >
       <b>Support live:</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_livechat_en']; ?>" name="xtrasoft_livechat_en" id="exampleInputPassword1" placeholder="xtrasoft live chat en ">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_livechat_FR']; ?>" name="xtrasoft_livechat_FR" id="exampleInputPassword1" placeholder="xtrasoft live chat FR">
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2"  >
      <b> Website</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_suport_en']; ?>" name="xtrasoft_suport_en" id="exampleInputPassword1" placeholder="xtrasoft suport en">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_suport_FR']; ?>" name="xtrasoft_suport_FR" id="exampleInputPassword1" placeholder="xtrasoft suport FR">
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2"  >
       <b>Email:</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_email_en']; ?>" name="xtrasoft_email_en" id="exampleInputPassword1" placeholder="xtrasoft_email_en">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['xtrasoft_email_FR']; ?>" name="xtrasoft_email_FR" id="exampleInputPassword1" placeholder="xtrasoft_email_FR">
      </div>
    </div><br>
    <button class="btn  btn-primary"  type="submit" name="update_xtrasoft"> Update xtraSoft Data <b></b></button>  

  </form>




</div>
</div>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>
</html>
