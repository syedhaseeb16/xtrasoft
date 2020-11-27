<?php   require_once 'config.php'; 
  session_start();
        if (!isset($_SESSION['user'])) {
          header('Location: index.php');
    $_SESSION["err"] = "Unauthorized Access.Pls login First";
   
        }

  if(isset($_POST['update_manufacturer'])){
    $flag_existing=0;
    $Manufacturer_id=$_POST["Manufacturer_id"];
    $Manufacturer=$_POST["Manufacturer"];
    $flag_existing=0;
    $check = "SELECT * FROM manufacture WHERE Manufacturer_id='$Manufacturer_id'";
    $re_check = $conn->query($check);
     while($rec=$re_check->fetch_assoc()){
      if($rec["Manufacturer"]==$Manufacturer && $rec["Manufacturer_id"]!=$Manufacturer_id)
      {
        $flag_existing=1;
      }

    }
    $Supphoen=$_POST["Supphoen"];
    $Supphofr=$_POST["Supphofr"];
    $supchaten_url =$_POST["supchaten_url"];
    $supchatfr=$_POST["supchatfr"];
    $supen=$_POST["supen"];
    $supfr=$_POST["supfr"];
    $general_mail_link_EN  =$_POST["general_mail_link_EN"];      
    $general_mail_FR=$_POST["general_mail_FR"];
    $Manufacturer_Logo=$_POST["Manufacturer_Logo"];

if($flag_existing==0){ 
    $queryyy_up = "UPDATE manufacture SET 
    Manufacturer = '$Manufacturer', Supphoen = '$Supphoen',
    Supphofr = '$Supphofr', supchaten_url = '$supchaten_url',
    supchatfr = '$supchatfr',
    supen = '$supen', supfr = '$supfr',Manufacturer_Logo = '$Manufacturer_Logo',
    general_mail_link_EN = '$general_mail_link_EN', general_mail_FR = '$general_mail_FR'
      where  Manufacturer_id='$Manufacturer_id'";
  if (mysqli_query($conn, $queryyy_up)) {
  ?><div class="alert alert-success">
    <strong>Success!</strong> Record has been successfully updated.
  </div>
<?php

  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
}else{
  ?><div class="alert alert-danger">
    <strong>Warning!</strong> Project Name Already Exist for same user.
      </div>
    <?php


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
  margin-top: 60px;
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
      <a class="active" href="all_manufactr.php">
         <button class="btn  btn-primary"  > Home</button>  
      </a>
      <a class="active" href="all_manufactr.php">
         <button class="btn  btn-primary"  > Manufacturer</button>  
      </a>
     <a class="active" href="all_manufactr.php">
         <button class="btn  btn-primary"  > OS Edition</button>  
      </a>
      <a class="active" href="all_manufactr.php">
         <button class="btn  btn-primary"  > Xtrasoft</button>  
      </a>
     </div>
</div>

<?php  
$id=""; 
$id=$_GET['id'];
$query = "SELECT * FROM manufacture WHERE Manufacturer_id='$id'";
$result = $conn->query($query); 
$row = $result->fetch_assoc();
?>
<div class="container content">

<form action="all_manufactr_edit.php?id=<?php echo $row["Manufacturer_id"] ?>"  method="POST">
  <label for="projects"><b>EDIT MANUFACTURER DATA</b> </label>
  <div class="row">
    <div class="col-sm-2" >
      <label for="exampleInputPassword1">Manufacturer Name:</label>
      <input type="hidden" class="form-control" value="<?php echo  $row['Manufacturer_id']; ?>" name="Manufacturer_id" id="exampleInputPassword1" placeholder="project name">

      <input type="text" class="form-control" value="<?php echo  $row['Manufacturer']; ?>" name="Manufacturer" id="exampleInputPassword1" placeholder="project name">
    </div>

    <div class="col-sm-7" >
      <label for="exampleInputPassword1">Manufacturer Logo URL:</label>
       <input type="text" class="form-control" value="<?php echo  $row['Manufacturer_Logo']; ?>" name="Manufacturer_Logo" id="exampleInputPassword1" placeholder="logo url">
    </div>

        <div class="col-sm-3" >
       <br>
       <a href="all_manufactr.php?del=<?php echo $row['Manufacturer_id'];?>" class="btn btn-danger" >Delete Manufacturer </a>
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
        <input type="text" class="form-control" value="<?php echo  $row['Supphoen']; ?>" name="Supphoen" id="exampleInputPassword1" placeholder="Supphoen">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['Supphofr']; ?>" name="Supphofr" id="exampleInputPassword1" placeholder="Supphofr">
      </div>
    </div>


    <div class="row">
      <div class="col-sm-2"  >
       <b>Support live:</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['supchaten_url']; ?>" name="supchaten_url" id="exampleInputPassword1" placeholder="supchaten_url">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['supchatfr']; ?>" name="supchatfr" id="exampleInputPassword1" placeholder="supchatfr">
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2"  >
      <b> Website</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['supen']; ?>" name="supen" id="exampleInputPassword1" placeholder="supen">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['supfr']; ?>" name="supfr" id="exampleInputPassword1" placeholder="supfr">
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2"  >
       <b>Email:</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['general_mail_link_EN']; ?>" name="general_mail_link_EN" id="exampleInputPassword1" placeholder="general_mail_link_EN">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  $row['general_mail_FR']; ?>" name="general_mail_FR" id="exampleInputPassword1" placeholder="general_mail_FR">
      </div>
    </div><br>
    <button class="btn  btn-primary"  type="submit" name="update_manufacturer"> Update Manufacturer <b><?php  echo $row['Manufacturer']; ?></b></button>  

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
