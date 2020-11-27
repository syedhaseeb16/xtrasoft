


<?php  
  session_start();
        if (!isset($_SESSION['user'])) {
          header('Location: index.php');
    $_SESSION["err"] = "Unauthorized Access.Pls login First";
   
        } require_once 'config.php'; 

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
<div class="container" style=" position: fixed; z-index: 3;">
  
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
 
<div class="container content" style="margin-top: 45px;">

<form action="home.php"  method="POST">
  <label for="projects"><b>ADD NEW PRODUCT</b> </label>
  <div class="row">
    <div class="col-sm-3" >
       <label for="cat">Choose Category:</label>
          <select class="form-control" name="Category" id="cat" onchange="hideShow(this.value)">
            <option selected value="Antivirus">AntiVirus</option>
            <option value="Windows">Windows</option>
            <option value="Audio Editing">Audio Editing</option>
            <option value="Office Suites">Office Suites</option>
            <option value="Video Editing">Video Editing</option>
          </select>
    </div>
  </div>
 <div class="row">
    <div class="col-sm-5" >
            <label for="exampleInputPassword1"> product Name:</label>
       <input type="text" class="form-control" required value="<?php echo ""; ?>" name="Product" id="exampleInputPassword1" placeholder="Enter Product Name">
        </div> 

           <div class="col-sm-3"  >
            <br>
          <select class="form-control" name="Manufacturer_id" id="man">
           <option  selected value="">Manufacturer</option>

          <?php  
          $query = "SELECT * FROM manufacture";
          $result = $conn->query($query); 
          while($row = $result->fetch_assoc()){?>
             <option value="<?php echo $row["Manufacturer_id"];  ?>"><?php echo $row["Manufacturer"];?></option><?php
          }
          ?>
          </select>
        </div>
  </div>


<!----------------------------OS COMPATILTY------------------------------------>
<div id="div" style="display: block;">
    <br><b>OS Compatiblity:</b>
  <?php  
          $query = "SELECT * FROM os";
          $result = $conn->query($query); 
          while($row = $result->fetch_assoc()){?>
    
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly value="<?php echo $row["OS"];  ?>" name="OS[]" id="exampleInputPassword1" placeholder="">
        </div>

      <div class="col-sm-9">
          
         <?php 
       $list = explode(',', $row["OS_Edition"]); 
       //$list= array_reverse($list); 
       $length = count($list);
           for ($i = 0; $i < $length; $i++) {
           ?>
         
          &nbsp;&nbsp;<input  name="<?php echo $row["OS"]."[]";  ?>" type="checkbox" value="<?php echo $list[$i];?>"> <?php echo $list[$i]; }?>
    
      </div>

  
  </div>
<?php }?>
</div>
<!----------------------------------OS AND DOWNLAODS--------------------- -->

<!-----------------FOR WINDOWS------------->
<div class="fluid-container" id="divw" style="display: none;">
<br><b>OS and Downloads:</b>
   <div class="row" >
        <div class="col-sm-2">
        </div>
        <div class="col-sm-5">
          EN
        </div>

        <div class="col-sm-5">
          FR
        </div>
    </div>
       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows";?>" name="OS_Download_Name" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="Download_EN_LINKs" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="Download_FR_LINKs" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>
  </div>
    <!-----------------FOR ALL CAT------------------->
<div id="div1" style="display: block;">
<br><b>OS and Downloads:</b>
   <div class="row" >
        <div class="col-sm-2">
        </div>
        <div class="col-sm-5">
          EN
        </div>

        <div class="col-sm-5">
          FR
        </div>
    </div>
       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Andriod";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>


<div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Mac";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Linux";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>
  </div>
<!----------------------------------OS AND DOWNLAODS END--------------------- -->
<!----------------------------------USER GUIDE--------------------- -->
<br><b>User Guide:</b>
  <div class="row" >
        <div class="col-sm-2">
        </div>
        <div class="col-sm-5">
          EN
        </div>

        <div class="col-sm-5">
          FR
        </div>
    </div>
       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "User Guide";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="guideuser_EN_LINK" id="exampleInputPassword1" placeholder="EN UserGudie Link">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="guideuser_FR_LINK" id="exampleInputPassword1" placeholder="FR  UserGuide Link">
        </div>
    </div>
    <!----------------------------------USER FAQS---------------------------------------->

    <!----------------------------------USER GUIDE--------------------- -->
<br><b>User Faqs:</b>
  <div class="row" >
        <div class="col-sm-2">
        </div>
        <div class="col-sm-5">
          EN
        </div>

        <div class="col-sm-5">
          FR
        </div>
    </div>
       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "User Faqs";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="guide_faq_EN_LINK" id="exampleInputPassword1" placeholder="EN UserFaqs Link">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="guide_faq_FR_LINK" id="exampleInputPassword1" placeholder="FR  UserFaqs Link">
        </div>
    </div>
    <!----------------------------------USER FAQS---------------------------------------->
        <!----------------------------------Videos Link---------------------------------------->
<div id="divw1" style="display: none;">
<br><b>Videos:</b>

  <div class="row" >
        <div class="col-sm-2">
        </div>
        <div class="col-sm-5">
          EN
        </div>

        <div class="col-sm-5">
          FR
        </div>
    </div>
       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="overviewen_windows" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="overviewfr_windows" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Installations";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="installen_windows" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="installfr_windows" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="activateen_windows" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="activatefr_windows" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="autorenewen_windows" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="autorenewenfr_windows" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>
  </div>
  <!------------------------------------------ALL OS INSTALLATION AND EG---------------------------------->

  <div id="div2" style="display: block;">
<br><b>Videos:</b>

  <div class="row" >
        <div class="col-sm-2">
        </div>
        <div class="col-sm-5">
          EN
        </div>

        <div class="col-sm-5">
          FR
        </div>
    </div>
       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="overviewen_window" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="overviewfr_window" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="installen_window" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="installfr_window" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="activateen_window" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="activatefr_window" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="autorenewen_window" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="autorenewenfr_window" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>


<br>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="overviewen_iOS" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="overviewfr_iOS" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="installen_iOS" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="installfr_iOS" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="activateen_iOS" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="activatefr_iOS" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="autorenewen_iOS" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="autorenewenfr_iOS" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "linux OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="overviewen_linux" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="overviewfr_linux" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "linux Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="installen_linux" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="installfr_linux" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "linux Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="activateen_linux" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="activatefr_linux" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "linux Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="autorenewen_linux" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="autorenewenfr_linux" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>

<br>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "mac OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="overviewen_mac" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="overviewfr_mac" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "mac Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="installen_mac" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="installfr_mac" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "mac Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="activateen_mac" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="activatefr_mac" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "mac Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="autorenewen_mac" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="autorenewenfr_mac" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "andriod OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="overviewen_andriod" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="overviewfr_andriod" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "andriod Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="installen_andriod" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="installfr_andriod" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "andriod Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="activateen_andriod" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="activatefr_andriod" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "andriod Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo "";?>" name="autorenewen_andriod" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo ""; ?>" name="autorenewenfr_andriod" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>

  </div>
    <button id="idvother"  class="btn  btn-primary" style="display: block;"  type="submit" name="create_product"> Add New Product  <b></b></button> 
     <button id="divwin"  class="btn  btn-primary" style="display: none;" type="submit" name="create_win_product"> Add new Product<b></b></button>  

</form>
  
 
</div>




</body>
</html>
<script type="text/javascript">
function hideShow(data) {
  var x= document.getElementById("div");
  var xx= document.getElementById("div1");
  var xxx= document.getElementById("div2");
    var xxxx= document.getElementById("idvother");

  var y= document.getElementById("divw");
  var yy= document.getElementById("divw1");
    var yyy= document.getElementById("divwin");

  var change=data;
    if(change=="Windows") 
    {
        x.style.display = "none";
        xx.style.display = "none";
        xxx.style.display = "none";
        xxxx.style.display = "none";
        y.style.display = "block";
        yy.style.display = "block";
        yyy.style.display = "block";


   }else{
        x.style.display = "block";
        xx.style.display = "block";
        xxx.style.display = "block";
        xxxx.style.display = "block";
        y.style.display = "none";
        yy.style.display = "none";
        yyy.style.display = "none";

   }



}
</script>




      