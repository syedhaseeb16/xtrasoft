


<?php 
  session_start();
        if (!isset($_SESSION['user'])) {
          header('Location: index.php');
    $_SESSION["err"] = "Unauthorized Access.Pls login First";
   
        }  require_once 'config.php'; 

  if(isset($_POST['create_manufacturer'])){
    $flag_existing=0;
    $Manufacturer=$_POST["Manufacturer"];
    $flag_existing=0;
    $check = "SELECT * FROM manufacture";
    $re_check = $conn->query($check);
     while($rec=$re_check->fetch_assoc()){
      if($rec["Manufacturer"]==$Manufacturer)
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


    $queryyy_up = "INSERT INTO manufacture(Manufacturer,Supphoen,Supphofr,supchaten_url,supchatfr,supen,supfr,Manufacturer_Logo,general_mail_link_EN,general_mail_FR) VALUES('$Manufacturer','$Supphoen','$Supphofr','$supchaten_url','$supchatfr','$supen','$supfr','$Manufacturer_Logo','$general_mail_link_EN','$general_mail_FR')";


  if (mysqli_query($conn, $queryyy_up)) {
  ?><div class="alert alert-success">
    <strong>Success!</strong> Record has been successfully created.
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




if (isset($_GET['del'])) {

$_GET['del'];
$id_del=""; 
$id_del=$_GET['del'];
$qu_del = "DELETE FROM `manufacture` WHERE Manufacturer_id='$id_del'";

  if (mysqli_query($conn, $qu_del)) {
  ?><div class="alert alert-success">
    <strong>Success!</strong> Record has been successfully deleted.
  </div>
<?php

  } else {
      echo "Error Deleting record: " . mysqli_error($conn);
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

</head>
<body>
<div class="container">
<div class="container" style=" position: fixed;">
  
      <div class="btn-group bg-primary" role="group" aria-label="Basic example" >
      <a class="active" href="home.php">
         <button class="btn  btn-primary"  > Home</button>  
      </a>
      <a class="active" href="all_manufactr.php">
         <button class="btn  btn-primary"  > Manufacturer</button>  
      </a>
     <a class="active" href="os_edition.php">
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


</div>
 
<div class="container main" style="margin-top: 38px;">
  &nbsp;&nbsp;&nbsp;&nbsp;<div class="btn-group bg-primary" style="position: fixed; margin-bottom: : 18PX;" role="group" aria-label="Basic example" >
  <a class="active" href="all_manufactr_add.php">
         <button class="btn  btn-primary btn-sm"  > Add new Manufacturer</button>  
      </a>
    </div>
  <table width="60%" class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th width="20%" scope="col">Manufacturer</th>
      <th width="20%" scope="col">Logo</th>
      <th width="20%" scope="col">Edit</th>
            <th width="20%" scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

<?php  
$query = "SELECT * FROM manufacture";
$result = $conn->query($query); 
 while($row = $result->fetch_assoc()){ ?>
    <tr>
    
      <td><?php echo $row["Manufacturer"];  ?></td>
      <td> <img width="20px" height="25px" src="<?php echo $row["Manufacturer_Logo"];  ?>"> </td>
      <td><a href="all_manufactr_edit.php?id=<?php echo $row["Manufacturer_id"] ?>"><button type="text" class="btn  btn-primary" ><i class='finder fa fa-save'></i> Edit  </button></a></td>
      <td>
        <a href="all_manufactr.php?del=<?php echo $row["Manufacturer_id"] ?>"><button type="text" class="btn  btn-danger" ><i class='finder fa fa-save'></i> Delete  </button></a> 

      </td>
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

setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 4000); 
</script>

</body>
</html>
