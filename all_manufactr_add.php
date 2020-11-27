<?php
  session_start();
        if (!isset($_SESSION['user'])) {
          header('Location: index.php');
    $_SESSION["err"] = "Unauthorized Access.Pls login First";
   
        }  ?>
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
         <button class="btn  btn-primary"  > Xtrasoft</button>  
      </a>
            <a class="active" href="index.php">
         <button class="btn  btn-primary"  > logout</button>  
      </a>
     </div>
</div>

<div class="container content">

<form action="all_manufactr.php"  method="POST">
  <label for="projects"><b>CREATE MANUFACTURER DATA</b> </label>
  <div class="row">
    <div class="col-sm-2" >
      <label for="exampleInputPassword1">Manufacturer Name:</label>


      <input type="text" class="form-control" value="<?php echo ""; ?>" name="Manufacturer" id="exampleInputPassword1" placeholder="Manufacturer name">
    </div>

    <div class="col-sm-7" >
      <label for="exampleInputPassword1">Manufacturer Logo URL:</label>
       <input type="text" class="form-control" value="<?php echo  ""; ?>" name="Manufacturer_Logo" id="exampleInputPassword1" placeholder="logo url">
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
        <input type="text" class="form-control" value="<?php echo  ""; ?>" name="Supphoen" id="exampleInputPassword1" placeholder="Support Ph# ">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  ""; ?>" name="Supphofr" id="exampleInputPassword1" placeholder="Support Ph#">
      </div>
    </div>


    <div class="row">
      <div class="col-sm-2"  >
       <b>Support live:</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  ""; ?>" name="supchaten_url" id="exampleInputPassword1" placeholder="Live Chat">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  "" ?>" name="supchatfr" id="exampleInputPassword1" placeholder="Live Chat">
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2"  >
      <b> Website</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  ""; ?>" name="supen" id="exampleInputPassword1" placeholder="Support Website">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  ""; ?>" name="supfr" id="exampleInputPassword1" placeholder="Support Website">
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2"  >
       <b>Email:</b>
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  ""; ?>" name="general_mail_link_EN" id="exampleInputPassword1" placeholder="Email">
      </div>
      <div class="col-sm-5" >
        <input type="text" class="form-control" value="<?php echo  ""; ?>" name="general_mail_FR" id="exampleInputPassword1" placeholder="Email">
      </div>
    </div><br>
    <button class="btn  btn-primary"  type="submit" name="create_manufacturer"> Add New Manufacturer <b></b></button>  

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
