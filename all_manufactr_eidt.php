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
    <div id="navbar" >
      <a href="javascript:void(0)">Home</a>
      <a class="active" href="all_manufactr.php">Manufacturer</a>
      <a href="javascript:void(0)">Contact</a>
    </div>
</div>
<div class="container content">
  <table width="60%" class="table"  style="border-style: solid;">
  <thead>
    <tr>
      <th width="20%" scope="col">Manufacturer</th>
      <th width="20%" scope="col">Logo</th>
      <th width="20%" scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>

<?php  include 'config.php'; 
$query = "SELECT * FROM manufacture ";
$result = $conn->query($query); 
 while($row = $result->fetch_assoc()){ ?>
    <tr>
    
      <td><?php echo $row["Manufacturer"];  ?></td>
      <td><img width="20px" height="25px" src="<?php echo $row["Manufacturer_Logo"];  ?>"></td>
      <td><a href="">Edit</a></td>
    </tr>
   <?php   }  ?>
  </tbody>
</table>
 
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
