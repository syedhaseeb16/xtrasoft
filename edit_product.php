<?php  
$product_id="";
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
<?php 
$cat_edit="";
$productname_edit="";
$manufacture_edit="";

$download_en_andriod="";
$download_fr_andriod="";
$os_andriod="";

$download_en_window="";
$download_fr_window="";
$os_windows="";

$download_en_mac_en="";
$download_fr_mac_en="";
$os_mac="";

$download_en_ios="";
$download_fr_ios="";
$os_ios="";

$download_en_linux="";
$download_fr_linux="";
$os_ios="";


$guideuser_EN_LINK="";
$guideuser_FR_LINK=""; 
$guide_faq_EN_LINK=""; 
$guide_faq_FR_LINK="";
$Manufacturer_id="";
//-------------for videos sectipon getting data
 $v_id ="";  $product_id ="";  $overviewen_window ="";  $overviewfr_window ="";  $installen_window ="";  
 $installfr_window ="";  $activateen_window ="";  $activatefr_window ="";  $autorenewen_window ="";        
 $autorenewenfr_window ="";  $overviewen_iOS ="";  $overviewfr_iOS ="";  $installen_iOS ="";  $installfr_iOS ="";  
 $activateen_iOS ="";  $activatefr_iOS ="";  $autorenewen_iOS ="";  $autorenewenfr_iOS ="";  $overviewen_linux =""; 
 $overviewfr_linux ="";  $installen_linux ="";  $installfr_linux ="";  $activateen_linux ="";  $activatefr_linux ="";  $autorenewen_linux ="";  $autorenewenfr_linux ="";  $overviewen_mac ="";  $overviewfr_mac ="";  $installen_mac ="";  $installfr_mac ="";  $activateen_mac ="";  $activatefr_mac ="";  $autorenewen_mac ="";  $autorenewenfr_mac ="";  $overviewen_andriod ="";  $overviewfr_andriod ="";  $installen_andriod ="";  $installfr_andriod ="";  
 $activateen_andriod ="";  $activatefr_andriod ="";  $autorenewen_andriod ="";  $autorenewenfr_andriod  =""; 





if (isset($_GET['id'])) {
   
    $product_id=$_GET['id'];;
    $flag_existing=0;
    $check = "SELECT * FROM product_record";
    $re_check = $conn->query($check);
     while($rec=$re_check->fetch_assoc()){
      if($rec["Product_ID"]==$product_id)
      {
        $cat_edit=$rec["Category"];
        $productname_edit=$rec["Product"];
        $manufacture_edit=$rec["Manufacturer"];


        if($rec["os_id"]=="1")
        {
          $download_en_andriod=$rec["Download_EN_LINK"];
          $download_fr_andriod=$rec["Download_FR_LINK"];
          $os_andriod="";

        }elseif ($rec["os_id"]=="2") {
          $download_en_ios=$rec["Download_EN_LINK"];
          $download_fr_ios=$rec["Download_FR_LINK"];
          $os_ios="";
          
        }elseif ($rec["os_id"]=="3") {

          $download_en_mac_en=$rec["Download_EN_LINK"];
          $download_fr_mac_en=$rec["Download_FR_LINK"];
          $os_mac="";

          # code...
        }elseif ($rec["os_id"]=="4") {
          $download_en_window=$rec["Download_EN_LINK"];
          $download_fr_window=$rec["Download_FR_LINK"];
          $os_windows="";
          # code...
        }elseif ($rec["os_id"]=="5") {

          $download_en_linux=$rec["Download_EN_LINK"];
          $download_fr_linux=$rec["Download_FR_LINK"];
          $os_ios="";
          # code...
        }

       
      }
      }
    }


    if (isset($_GET['id'])) {
   
    $product_id=$_GET['id'];;
    
    $check = "SELECT * FROM products";
    $re_check = $conn->query($check);
     while($rec=$re_check->fetch_assoc()){
        if($rec["Product_ID"]==$product_id)
      {
        $guideuser_EN_LINK=$rec["guideuser_EN_LINK"];
        $guideuser_FR_LINK=$rec["guideuser_FR_LINK"]; 
        $guide_faq_EN_LINK=$rec["guide_faq_EN_LINK"]; 
        $guide_faq_FR_LINK=$rec["guide_faq_FR_LINK"];
        $Manufacturer_id=$rec["Manufacturer_id"];
        break;
     }
   }
 }


  if (isset($_GET['id'])) {
   
    $product_id=$_GET['id'];;
    
    $check = "SELECT * FROM videos_section";
    $re_check = $conn->query($check);
     while($rec=$re_check->fetch_assoc()){
        if($rec["product_id"]==$product_id)
      {
         $v_id =$rec["v_id"];  $product_id =$rec["product_id"];  $overviewen_window =$rec["overviewen_window"];  
         $overviewfr_window=$rec["overviewfr_window"];  $installen_window=$rec["installen_window"];  
         $installfr_window=$rec["installfr_window"];  $activateen_window=$rec["activateen_window"];  
         $activatefr_window=$rec["activatefr_window"];  $autorenewen_window=$rec["autorenewen_window"];   
         $autorenewenfr_window=$rec["autorenewenfr_window"];  $overviewen_iOS=$rec["overviewen_iOS"];  
         $overviewfr_iOS=$rec["overviewfr_iOS"];  $installen_iOS=$rec["installen_iOS"]; 
         $installfr_iOS=$rec["installfr_iOS"];  $activateen_iOS=$rec["activateen_iOS"];
         $activatefr_iOS=$rec["activatefr_iOS"];  $autorenewen_iOS=$rec["autorenewen_iOS"]; 
         $autorenewenfr_iOS=$rec["autorenewenfr_iOS"];  $overviewen_linux=$rec["overviewen_linux"]; 
         $overviewfr_linux=$rec["overviewfr_linux"];  $installen_linux=$rec["installen_linux"];  
         $installfr_linux=$rec["installfr_linux"]; $activateen_linux=$rec["activateen_linux"]; 
         $activatefr_linux=$rec["activatefr_linux"];  $autorenewen_linux=$rec["autorenewen_linux"]; 
         $autorenewenfr_linux=$rec["autorenewenfr_linux"];  $overviewen_mac=$rec["overviewen_mac"];  
         $overviewfr_mac=$rec["overviewfr_mac"];  $installen_mac=$rec["installen_mac"];
         $installfr_mac=$rec["installfr_mac"];  $activateen_mac=$rec["activateen_mac"];  
         $activatefr_mac=$rec["activatefr_mac"];  $autorenewen_mac=$rec["autorenewen_mac"];  
         $autorenewenfr_mac=$rec["autorenewenfr_mac"];  $overviewen_andriod=$rec["overviewen_andriod"];  
         $overviewfr_andriod=$rec["overviewfr_andriod"];  $installen_andriod=$rec["installen_andriod"]; 
         $installfr_andriod=$rec["installfr_andriod"];   $activateen_andriod=$rec["activateen_andriod"];  
         $activatefr_andriod=$rec["activatefr_andriod"];  $autorenewen_andriod=$rec["autorenewen_andriod"];  
         $autorenewenfr_andriod=$rec["autorenewenfr_andriod"]; 
        break;
     }
   }
 }

  
?>
</head>
<body >
  <input type="hidden" value="<?php echo $cat_edit;  ?>" id="inpcall" >
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









<form action="updateproduct.php?pro_id=<?php echo $_GET['id']; ?>"  method="POST">
  <label for="projects"><b>EDIT PRODUCT</b> </label>
  <div class="row">
    <div class="col-sm-3" >
       <label for="cat">Choose Category:</label>
          <select class="form-control"  name="Category" id="cat" onchange="hideShow(this.value)">
             
            <option selected value=<?php echo $cat_edit;  ?> > <?php echo $cat_edit;  ?></option>
            <option  value="Antivirus">AntiVirus</option>
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
       <input type="text" class="form-control" required value="<?php echo $productname_edit; ?>" name="Product" id="exampleInputPassword1" placeholder="Enter Product Name">
        </div> 


           <div class="col-sm-3"  >
            <br>
          <select class="form-control" name="Manufacturer_id" id="man">

          <?php  
          $query = "SELECT * FROM manufacture";
          $result = $conn->query($query); ?>
          <?php 
          while($row = $result->fetch_assoc()){
               if($manufacture_edit==$row["Manufacturer_id"]){ ?>
                  <option selected value="<?php echo $row["Manufacturer_id"]; ?>"><?php echo $row["Manufacturer"];?></option>

               <?php }else{ ?>
                  <option value="<?php echo $row["Manufacturer_id"];  ?>"><?php echo $row["Manufacturer"];?></option>

              <?php  }

            
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
         
          $length_of_saved=0;
         $OS_ED=array();
         $common=array();
          $que = "SELECT * FROM product_record";
           $resultss = $conn->query($que); 
           while($inner = $resultss->fetch_assoc()){
             if($product_id==$inner["Product_ID"] && $inner["os_id"]==$row["os_id"]){
              
               $OS_ED = explode(',', $inner["OS_Edition"]); 
              $length_of_saved = count($OS_ED);
               }
             }

            
        $list = explode(',', $row["OS_Edition"]); 
         // $list= array_reverse($list); 
        $length = count($list);
        $common=array_intersect($list,$OS_ED);
      

      
        $lenghtofcom=count($common);
        for ($i = 0; $i < $lenghtofcom; $i++){
?>   
<?php //echo $common[$i];

        }
           for ($i = 0; $i < $length; $i++) { 
            
              if(in_array($list[$i],$common)){ ?>

      
            &nbsp;&nbsp;<input  name="<?php echo $row["OS"]."[]";  ?>" type="checkbox" checked  value="<?php echo $list[$i];?>"> <?php echo $list[$i];}
            else{?>

              &nbsp;&nbsp;<input  name="<?php echo $row["OS"]."[]";  ?>" type="checkbox"   value="<?php echo $list[$i];?>"> <?php echo $list[$i];


            }
           ?>
            

 <?php  

        }?>
    
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
           <input type="text" class="form-control"  value="<?php echo $download_en_window;?>" name="Download_EN_LINKs" id="exampleInputPassword1" placeholder="EN Download Link">


        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $download_fr_window; ?>" name="Download_FR_LINKs" id="exampleInputPassword1" placeholder="FR  Download Link">
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
           <input type="text" class="form-control"  value="<?php echo $download_en_andriod;?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $download_fr_andriod; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>


<div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $download_en_ios;?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $download_fr_ios; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Mac";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $download_en_mac_en; ?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $download_fr_mac_en;; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>


    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $download_en_window;?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $download_fr_window; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Linux";?>" name="OS_Download_Name[]" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $download_en_linux;?>" name="Download_EN_LINK[]" id="exampleInputPassword1" placeholder="EN Download Link">
        
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $download_fr_linux; ?>" name="Download_FR_LINK[]" id="exampleInputPassword1" placeholder="FR  Download Link">
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
           <input type="text" class="form-control"  value="<?php echo $guideuser_EN_LINK;?>" name="guideuser_EN_LINK" id="exampleInputPassword1" placeholder="EN UserGudie Link">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $guideuser_FR_LINK; ?>" name="guideuser_FR_LINK" id="exampleInputPassword1" placeholder="FR  UserGuide Link">
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

           <input type="text" class="form-control"  value="<?php echo $guide_faq_EN_LINK;?>" name="guide_faq_EN_LINK" id="exampleInputPassword1" placeholder="EN UserFaqs Link">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $guide_faq_FR_LINK; ?>" name="guide_faq_FR_LINK" id="exampleInputPassword1" placeholder="FR  UserFaqs Link">
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
           <input type="text" class="form-control"  value="<?php echo $overviewen_window;?>" name="overviewen_windows" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $overviewfr_window; ?>" name="overviewfr_windows" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Installations";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $installen_window;?>" name="installen_windows" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $installfr_window; ?>" name="installfr_windows" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $activateen_window;?>" name="activateen_windows" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $activatefr_window; ?>" name="activatefr_windows" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $autorenewen_window;?>" name="autorenewen_windows" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $autorenewenfr_window; ?>" name="autorenewenfr_windows" id="exampleInputPassword1" placeholder="Autorenew">
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
           <input type="text" class="form-control"  value="<?php echo $overviewen_window;?>" name="overviewen_window" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $overviewfr_window; ?>" name="overviewfr_window" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $installen_window;?>" name="installen_window" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $installfr_window; ?>" name="installfr_window" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $activateen_window;?>" name="activateen_window" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $activatefr_window; ?>" name="activatefr_window" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "Windows Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $autorenewen_window;?>" name="autorenewen_window" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $autorenewenfr_window; ?>" name="autorenewenfr_window" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>


<br>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $overviewen_iOS;?>" name="overviewen_iOS" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $overviewfr_iOS; ?>" name="overviewfr_iOS" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $installen_iOS;?>" name="installen_iOS" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $installfr_iOS; ?>" name="installfr_iOS" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $activateen_iOS;?>" name="activateen_iOS" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $activatefr_iOS; ?>" name="activatefr_iOS" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "iOS Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $autorenewen_iOS;?>" name="autorenewen_iOS" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $autorenewenfr_iOS; ?>" name="autorenewenfr_iOS" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "linux OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $overviewen_linux;?>" name="overviewen_linux" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $overviewfr_linux; ?>" name="overviewfr_linux" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "linux Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $installen_linux;?>" name="installen_linux" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $installfr_linux; ?>" name="installfr_linux" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "linux Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $activateen_linux;?>" name="activateen_linux" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $activatefr_linux; ?>" name="activatefr_linux" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "linux Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $autorenewen_linux;?>" name="autorenewen_linux" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $autorenewenfr_linux; ?>" name="autorenewenfr_linux" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>

<br>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "mac OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $overviewen_mac;?>" name="overviewen_mac" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $overviewfr_mac; ?>" name="overviewfr_mac" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "mac Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $installen_mac;?>" name="installen_mac" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $installfr_mac; ?>" name="installfr_mac" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "mac Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $activateen_mac;?>" name="activateen_mac" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $activatefr_mac; ?>" name="activatefr_mac" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "mac Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $autorenewen_mac;?>" name="autorenewen_mac" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $autorenewenfr_mac; ?>" name="autorenewenfr_mac" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "andriod OverView";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $overviewen_andriod;?>" name="overviewen_andriod" id="exampleInputPassword1" placeholder="OverView">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $overviewfr_andriod; ?>" name="overviewfr_andriod" id="exampleInputPassword1" placeholder="OverView">
        </div>
    </div>


       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "andriod Installation";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $installen_andriod;?>" name="installen_andriod" id="exampleInputPassword1" placeholder="Installation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $installfr_andriod; ?>" name="installfr_andriod" id="exampleInputPassword1" placeholder="Installation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "andriod Activate";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $activateen_andriod;?>" name="activateen_andriod" id="exampleInputPassword1" placeholder="Activation">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $activatefr_andriod; ?>" name="activatefr_andriod" id="exampleInputPassword1" placeholder="Activation">
        </div>
    </div>

       <div class="row">
        <div class="col-sm-2">
           <input type="text" class="form-control" readonly  value="<?php echo "andriod Autorenew";?>" name="" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="col-sm-5">
           <input type="text" class="form-control"  value="<?php echo $autorenewen_andriod;?>" name="autorenewen_andriod" id="exampleInputPassword1" placeholder="Autorenew">
        </div>

        <div class="col-sm-5">
          <input type="text" class="form-control"  value="<?php echo $autorenewenfr_andriod; ?>" name="autorenewenfr_andriod" id="exampleInputPassword1" placeholder="Autorenew">
        </div>
    </div>

  </div>
    <button id="idvother"  class="btn  btn-primary" style="display: block;"  type="submit" name="create_product"> update product  <b></b></button> 
     <button id="divwin"  class="btn  btn-primary" style="display: none;" type="submit" name="create_win_product"> update product<b></b></button>  

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




window.onload = function() {
  let data=document.getElementById("inpcall").value;
  hideShow(data);
};
</script>






      