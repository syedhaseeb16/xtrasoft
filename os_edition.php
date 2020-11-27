


<?php   require_once 'config.php'; 
        session_start();
        if (!isset($_SESSION['user'])) {
          header('Location: index.php');
    $_SESSION["err"] = "Unauthorized Access.Pls login First";
   
        }

  if(isset($_POST['create_os_edition'])){
     $flag_existing=0;
    $OS=$_POST["OS"];
    $check = "SELECT * FROM os";
    $re_check = $conn->query($check);
     while($rec=$re_check->fetch_assoc()){
      if($rec["OS"]==$OS )
      {
        $flag_existing=1;
      }

    }
    $OS=$_POST["OS"];
    $OS_Edition=$_POST["OS_Edition"];


if($flag_existing==0){ 


    $queryyy_up = "INSERT INTO os(OS,OS_Edition) VALUES('$OS','$OS_Edition')";


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
  //****************************OS UPDATE

if(isset($_POST['update_os'])){


    $flag_existing=0;
    $OS_ID=$_POST["OS_ID"];
    $OS=$_POST["OS"];
    $flag_existing=0;
    $check = "SELECT * FROM os";
    $re_check = $conn->query($check);
     while($rec=$re_check->fetch_assoc()){
      if($rec["OS"]==$OS && $rec["os_id"]!=$OS_ID)
      {
        $flag_existing=1;
      }

    }
    $OS=$_POST["OS"];
    $OS_Edition=$_POST["OS_Edition"];
 

if($flag_existing==0){ 
    $queryyy_up = "UPDATE os SET 
    OS = '$OS', OS_Edition = '$OS_Edition'
      where  OS_ID='$OS_ID'";
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
    <strong>Warning!</strong> OS Name Already Exist..
      </div>
    <?php


}



  }




  //*******************************




if (isset($_POST['delete_os'])) {

$id_del=""; 
$id_del=$_POST['OS_ID'];
$qu_del = "DELETE FROM `os` WHERE os_id='$id_del'";

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
  &nbsp;&nbsp;&nbsp;&nbsp;
  <div class="btn-group bg-primary" style="position: fixed; margin-bottom: : 18PX;" role="group" aria-label="Basic example" >
  <a class="active" href="">  
    </a>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add New OS</button>
    </div>



  <!-- Modal -->
<form action="os_edition.php" method="POST">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Os Details</h4>
        </div>
        <div class="modal-body">
          <label for="comment">Os Name:</label>
           <input type="text" class="form-control" value="<?php echo ""; ?>" name="OS" id="exampleInputPassword1" placeholder="Os Name">
           <label for="comment">OS Editions:</label>
           <textarea style="resize: vertical;" type="text" cols="10" class="form-control" name="OS_Edition" id="exampleInputPassword1" placeholder="OS Editions">   </textarea>
        </div>
        <div class="modal-footer">
          <button type="submit"  name="create_os_edition" class="btn btn-primary" >Add</button>
        </div>
      </div>
   
      
    </div>
  </div>
 </form>



    <br><br>

  <div class="container">
  <label for="projects"><b>OS /OS EDITIONS</b> </label>
  <div class="row">
    <div class="col-sm-3" >
      <p>OS</p>
    </div>
        <div class="col-sm-7" >
      <p>OS Edition</p>
    </div>
        <div class="col-sm-2" >
      <p>Update/Delete</p>
    </div>
 
  </div>

    <?php
    $check = "SELECT * FROM os ";
    $re_check = $conn->query($check);
    while($rec=$re_check->fetch_assoc()) {?>   
  <form action="os_edition.php"  method="POST">
  
  <div class="row">

    <div class="col-sm-3" >
      <input type="hidden" class="form-control" value="<?php echo  $rec["os_id"]; ?>" name="OS_ID" id="exampleInputPassword1" placeholder="Os Name">
    <input type="text" class="form-control" value="<?php echo  $rec["OS"]; ?>" name="OS" id="exampleInputPassword1" placeholder="Os Name">
    </div>
    <div class="col-sm-7" >
     <input type="text" class="form-control" value="<?php echo  $rec["OS_Edition"]; ?>" name="OS_Edition" id="exampleInputPassword1" placeholder="OS Editions">  
    </div>
        <div class="col-sm-2" >
      <a href="os_edition.php?update=<?php echo ""?>"><button type="submit" name="update_os" class="btn  btn-primary" > update </button> </a>
      <a href="os_edition.php?del=<?php echo  $rec["os_id"];?>"><button type="submit" name="delete_os" class="btn  btn-danger" > Delete </button> </a>
    </div>
 
  </div>
</form>
<?php } ?>

</div>




  
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
