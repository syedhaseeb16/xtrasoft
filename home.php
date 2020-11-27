

<?php



   require_once 'config.php'; 

      


//Create product window cat product
//Start add product for all type
 if(isset($_POST['create_win_product'])){
//add data in product table
  $Product=$_POST['Product'];
  $Manufacturer_id=$_POST['Manufacturer_id'];
  $guideuser_EN_LINK=$_POST['guideuser_EN_LINK'];
  $guideuser_FR_LINK=$_POST['guideuser_FR_LINK'];
  $guide_faq_EN_LINK=$_POST['guide_faq_EN_LINK'];
  $guide_faq_FR_LINK=$_POST['guide_faq_FR_LINK'];
  $Category=$_POST['Category'];
   $queryyy_up = "INSERT INTO products(Product,Manufacturer_id,guideuser_EN_LINK,guideuser_FR_LINK,guide_faq_EN_LINK,guide_faq_FR_LINK) VALUES('$Product','$Manufacturer_id','$guideuser_EN_LINK','$guideuser_FR_LINK','$guide_faq_EN_LINK','$guide_faq_FR_LINK')";
echo "string".$queryyy_up;

  if (mysqli_query($conn, $queryyy_up)) {
     $last_id = mysqli_insert_id($conn);
     //echo "New record created successfully. Last inserted ID is: " . $last_id;
 
     //getting os compatiblity data from form os editions
      $Andriod_OS_Edition="";
      $iOS_OS_Edition="";
      $Mac_OS_Edition="";
      $Windows_OS_Edition="";
      $Linux_OS_Edition="";
      if(isset($_POST['Android'])){
      $Andriod_OS_Edition = $_POST['Android'];
      $Andriod_OS_Edition = implode(",", $Andriod_OS_Edition);
      }
      if(isset($_POST['iOS'])){
      $iOS_OS_Edition = $_POST['iOS'];
      $iOS_OS_Edition = implode(",", $iOS_OS_Edition);
       }
       if(isset($_POST['Mac'])){
      $Mac_OS_Edition = $_POST['Mac'];
      $Mac_OS_Edition = implode(",", $Mac_OS_Edition);
      }
      if(isset($_POST['Windows'])){
      $Windows_OS_Edition = $_POST['Windows'];
      $Windows_OS_Edition = implode(",", $Windows_OS_Edition);
      }
      if(isset($_POST['Linux'])){
      $Linux_OS_Edition = $_POST['Linux'];
      $Linux_OS_Edition = implode(",", $Linux_OS_Edition);
      }
      $Andriod_download_en="";
      $iOS_OS_download_en="";
      $Mac_OS_download_en="";
      $Windows_OS_download_en="";
      $Linux_OS_download_en="";

      $Andriod_download_fr="";
      $iOS_OS_download_fr="";
      $Mac_OS_download_fr="";
      $Windows_OS_download_fr="";
      $Linux_OS_download_fr="";

      //getting downlaoding links for all
      $Download_EN_LINK=$_POST['Download_EN_LINKs'];
      $Download_FR_LINK=$_POST['Download_FR_LINKs'];
    
      $Windows_OS_download_en=$Download_EN_LINK;
      $Windows_OS_download_fr=$Download_FR_LINK;
 

             //Windows

         $queryyy = "INSERT INTO product_record(Product_ID,os_id,OS,OS_Edition,Product,Category,Manufacturer,Download_EN_LINK,Download_FR_LINK) VALUES('$last_id','10','Windows','$Windows_OS_Edition','$Product','$Category','$Manufacturer_id','$Windows_OS_download_en','$Windows_OS_download_fr')";
        // echo "--".$queryyy;
        if (mysqli_query($conn, $queryyy)) {
          
        }else {
      echo "Error creating record-- : " . mysqli_error($conn);
      }
   

        //vide section all data get
        $overviewen_window=$_POST['overviewen_windows']; $overviewfr_window=$_POST['overviewfr_windows'];
        $installen_window=$_POST['installen_windows']; $installfr_window=$_POST['installfr_windows']; 
        $activateen_window=$_POST['activateen_windows']; $activatefr_window=$_POST['activatefr_windows'];
        $autorenewen_window=$_POST['autorenewen_windows']; $autorenewenfr_window=$_POST['autorenewenfr_windows'];
//echo $overviewen_window.$overviewfr_window.$installen_window.$installfr_window.$activateen_window.$activatefr_window.$autorenewen_window.$autorenewenfr_window;
        $overviewen_iOS=""; $overviewfr_iOS="";
        $installen_iOS=""; $installfr_iOS="";
        $activateen_iOS=""; $activatefr_iOS="";
        $autorenewen_iOS=""; $autorenewenfr_iOS="";
        $overviewen_linux=""; $overviewfr_linux="";
        $installen_linux=""; $installfr_linux="";
        $activateen_linux=""; $activatefr_linux="";
        $autorenewen_linux=""; $autorenewenfr_linux="";
        $overviewen_mac=""; $overviewfr_mac="";
        $installen_mac=  $installfr_mac="";
        $activateen_mac=  $activatefr_mac="";
        $autorenewen_mac=""; $autorenewenfr_mac=""; 
        $overviewen_andriod=""; $overviewfr_andriod="";
        $installen_andriod=""; $installfr_andriod="";
        $activateen_andriod=""; $activatefr_andriod="";
        $autorenewen_andriod="";  $autorenewenfr_andriod="";
        //video sections add all os
       $queryyy = "INSERT INTO `videos_section`(`product_id`, `overviewen_window`, `overviewfr_window`, `installen_window`, `installfr_window`, `activateen_window`, `activatefr_window`, `autorenewen_window`, `autorenewenfr_window`, `overviewen_iOS`, `overviewfr_iOS`, `installen_iOS`, `installfr_iOS`, `activateen_iOS`, `activatefr_iOS`, `autorenewen_iOS`, `autorenewenfr_iOS`, `overviewen_linux`, `overviewfr_linux`, `installen_linux`, `installfr_linux`, `activateen_linux`, `activatefr_linux`, `autorenewen_linux`, `autorenewenfr_linux`, `overviewen_mac`, `overviewfr_mac`, `installen_mac`, `installfr_mac`, `activateen_mac`, `activatefr_mac`, `autorenewen_mac`, `autorenewenfr_mac`, `overviewen_andriod`, `overviewfr_andriod`, `installen_andriod`, `installfr_andriod`, `activateen_andriod`, `activatefr_andriod`, `autorenewen_andriod`, `autorenewenfr_andriod`) VALUES ('$last_id','$overviewen_window', '$overviewfr_window', '$installen_window', '$installfr_window', '$activateen_window', '$activatefr_window', '$autorenewen_window', '$autorenewenfr_window', '$overviewen_iOS', '$overviewfr_iOS', '$installen_iOS', '$installfr_iOS', '$activateen_iOS', '$activatefr_iOS', '$autorenewen_iOS', '$autorenewenfr_iOS', '$overviewen_linux', '$overviewfr_linux','$installen_linux', '$installfr_linux', '$activateen_linux', '$activatefr_linux', '$autorenewen_linux', '$autorenewenfr_linux', '$overviewen_mac', '$overviewfr_mac', '$installen_mac', '$installfr_mac', '$activateen_mac', '$activatefr_mac', '$autorenewen_mac', '$autorenewenfr_mac', '$overviewen_andriod', '$overviewfr_andriod','$installen_andriod', '$installfr_andriod', '$activateen_andriod', '$activatefr_andriod', '$autorenewen_andriod','$autorenewenfr_andriod')";
     
        if (mysqli_query($conn, $queryyy)) {
           ?><div class="alert alert-success">
        <strong>Success!</strong> Record has been successfully created.
      </div>
    <?php
        }else {
      echo "Error creating record : " . mysqli_error($conn);


        }


  
  } else {
      echo "Error creating record : " . mysqli_error($conn);
  }

 }









//*******************end of single produt window base
//Start add product for all type
 if(isset($_POST['create_product'])){
//add data in product table
  $Product=$_POST['Product'];
  $Manufacturer_id=$_POST['Manufacturer_id'];
  $guideuser_EN_LINK=$_POST['guideuser_EN_LINK'];
  $guideuser_FR_LINK=$_POST['guideuser_FR_LINK'];
  $guide_faq_EN_LINK=$_POST['guide_faq_EN_LINK'];
  $guide_faq_FR_LINK=$_POST['guide_faq_FR_LINK'];
  $Category=$_POST['Category'];
   $queryyy_up = "INSERT INTO products(Product,Manufacturer_id,guideuser_EN_LINK,guideuser_FR_LINK,guide_faq_EN_LINK,guide_faq_FR_LINK) VALUES('$Product','$Manufacturer_id','$guideuser_EN_LINK','$guideuser_FR_LINK','$guide_faq_EN_LINK','$guide_faq_FR_LINK')";
echo "string".$queryyy_up;

  if (mysqli_query($conn, $queryyy_up)) {
     $last_id = mysqli_insert_id($conn);
     //echo "New record created successfully. Last inserted ID is: " . $last_id;
 
     //getting os compatiblity data from form os editions
      $Andriod_OS_Edition="";
      $iOS_OS_Edition="";
      $Mac_OS_Edition="";
      $Windows_OS_Edition="";
      $Linux_OS_Edition="";
      if(isset($_POST['Android'])){
      $Andriod_OS_Edition = $_POST['Android'];
      $Andriod_OS_Edition = implode(",", $Andriod_OS_Edition);
      }
      if(isset($_POST['iOS'])){
      $iOS_OS_Edition = $_POST['iOS'];
      $iOS_OS_Edition = implode(",", $iOS_OS_Edition);
       }
       if(isset($_POST['Mac'])){
      $Mac_OS_Edition = $_POST['Mac'];
      $Mac_OS_Edition = implode(",", $Mac_OS_Edition);
      }
      if(isset($_POST['Windows'])){
      $Windows_OS_Edition = $_POST['Windows'];
      $Windows_OS_Edition = implode(",", $Windows_OS_Edition);
      }
      if(isset($_POST['Linux'])){
      $Linux_OS_Edition = $_POST['Linux'];
      $Linux_OS_Edition = implode(",", $Linux_OS_Edition);
      }
      $Andriod_download_en="";
      $iOS_OS_download_en="";
      $Mac_OS_download_en="";
      $Windows_OS_download_en="";
      $Linux_OS_download_en="";

      $Andriod_download_fr="";
      $iOS_OS_download_fr="";
      $Mac_OS_download_fr="";
      $Windows_OS_download_fr="";
      $Linux_OS_download_fr="";

      //getting downlaoding links for all
      $Download_EN_LINK=$_POST['Download_EN_LINK'];
      $Download_FR_LINK=$_POST['Download_FR_LINK'];
      $Andriod_download_en=$Download_EN_LINK[0];
      $iOS_OS_download_en=$Download_EN_LINK[1];
      $Mac_OS_download_en=$Download_EN_LINK[2];
      $Windows_OS_download_en=$Download_EN_LINK[3];
      $Linux_OS_download_en=$Download_EN_LINK[4];

      $Andriod_download_fr=$Download_FR_LINK[0];
      $iOS_OS_download_fr=$Download_FR_LINK[1];
      $Mac_OS_download_fr=$Download_FR_LINK[2];
      $Windows_OS_download_fr=$Download_FR_LINK[3];
      $Linux_OS_download_fr=$Download_FR_LINK[4];

      //andriod
      $queryyy = "INSERT INTO product_record(Product_ID,os_id,OS,OS_Edition,Product,Category,Manufacturer,Download_EN_LINK,Download_FR_LINK) VALUES('$last_id','1','Android','$Andriod_OS_Edition','$Product','$Category','$Manufacturer_id','$Andriod_download_en','$Andriod_download_fr')";
        if (mysqli_query($conn, $queryyy)) {
          //echo "okand<br>";
        }else {
      echo "Error creating record : " . mysqli_error($conn);
        }
      //iOS
      $queryyy = "INSERT INTO product_record(Product_ID,os_id,OS,OS_Edition,Product,Category,Manufacturer,Download_EN_LINK,Download_FR_LINK) VALUES('$last_id','2','iOS','$iOS_OS_Edition','$Product','$Category','$Manufacturer_id','$iOS_OS_download_en','$iOS_OS_download_fr')";
        if (mysqli_query($conn, $queryyy)) {
          //echo "ok2ios<br>";
        }else {
      echo "Error creating record : " . mysqli_error($conn);
        }
       //Mac
       $queryyy = "INSERT INTO product_record(Product_ID,os_id,OS,OS_Edition,Product,Category,Manufacturer,Download_EN_LINK,Download_FR_LINK) VALUES('$last_id','3','Mac','$Mac_OS_Edition','$Product','$Category','$Manufacturer_id','$Mac_OS_download_en','$Mac_OS_download_fr')";
        if (mysqli_query($conn, $queryyy)) {
          //echo "okmac2<br>";
        }else {
      echo "Error creating record : " . mysqli_error($conn);
      }
        //Windows

         $queryyy = "INSERT INTO product_record(Product_ID,os_id,OS,OS_Edition,Product,Category,Manufacturer,Download_EN_LINK,Download_FR_LINK) VALUES('$last_id','4','Windows','$Windows_OS_Edition','$Product','$Category','$Manufacturer_id','$Windows_OS_download_en','$Windows_OS_download_fr')";
        if (mysqli_query($conn, $queryyy)) {
          //echo "winodwss";
        }else {
      echo "Error creating record : " . mysqli_error($conn);
      }
       //Linux
       $queryyy = "INSERT INTO product_record(Product_ID,os_id,OS,OS_Edition,Product,Category,Manufacturer,Download_EN_LINK,Download_FR_LINK) VALUES('$last_id','5','Linux','$Linux_OS_Edition','$Product','$Category','$Manufacturer_id','$Linux_OS_download_en','$Linux_OS_download_fr')";
        if (mysqli_query($conn, $queryyy)) {
          //echo "<br>linuxok";
        }else {
      echo "Error creating record : " . mysqli_error($conn);
        }

        //vide section all data get
        $overviewen_window=$_POST['overviewen_window']; $overviewfr_window=$_POST['overviewfr_window'];
        $installen_window=$_POST['installen_window']; $installfr_window=$_POST['installfr_window']; 
        $activateen_window=$_POST['activateen_window']; $activatefr_window=$_POST['activatefr_window'];
        $autorenewen_window=$_POST['autorenewen_window']; $autorenewenfr_window=$_POST['autorenewenfr_window'];
//echo $overviewen_window.$overviewfr_window.$installen_window.$installfr_window.$activateen_window.$activatefr_window.$autorenewen_window.$autorenewenfr_window;
        $overviewen_iOS=$_POST['overviewen_iOS']; $overviewfr_iOS=$_POST['overviewfr_iOS']; 
        $installen_iOS=$_POST['installen_iOS']; $installfr_iOS=$_POST['installfr_iOS'];
        $activateen_iOS=$_POST['activateen_iOS']; $activatefr_iOS=$_POST['activatefr_iOS']; 
        $autorenewen_iOS=$_POST['autorenewen_iOS']; $autorenewenfr_iOS=$_POST['autorenewenfr_iOS']; 
        $overviewen_linux=$_POST['overviewen_linux']; $overviewfr_linux=$_POST['overviewfr_linux'];
        $installen_linux=$_POST['installen_linux']; $installfr_linux=$_POST['installfr_linux']; 
        $activateen_linux=$_POST['activateen_linux']; $activatefr_linux=$_POST['activatefr_linux'];
        $autorenewen_linux=$_POST['autorenewen_linux']; $autorenewenfr_linux=$_POST['autorenewenfr_linux']; 
        $overviewen_mac=$_POST['overviewen_mac']; $overviewfr_mac=$_POST['overviewfr_mac']; 
        $installen_mac=$_POST['installen_mac']; $installfr_mac=$_POST['installfr_mac'];
        $activateen_mac=$_POST['activateen_mac']; $activatefr_mac=$_POST['activatefr_mac'];
        $autorenewen_mac=$_POST['autorenewen_mac']; $autorenewenfr_mac=$_POST['autorenewenfr_mac']; 
        $overviewen_andriod=$_POST['overviewen_andriod']; $overviewfr_andriod=$_POST['overviewfr_andriod'];
        $installen_andriod=$_POST['installen_andriod']; $installfr_andriod=$_POST['installfr_andriod'];
        $activateen_andriod=$_POST['activateen_andriod']; $activatefr_andriod=$_POST['activatefr_andriod']; 
        $autorenewen_andriod=$_POST['autorenewen_andriod'];$autorenewenfr_andriod=$_POST['autorenewenfr_andriod'];
        //video sections add all os
       $queryyy = "INSERT INTO `videos_section`(`product_id`, `overviewen_window`, `overviewfr_window`, `installen_window`, `installfr_window`, `activateen_window`, `activatefr_window`, `autorenewen_window`, `autorenewenfr_window`, `overviewen_iOS`, `overviewfr_iOS`, `installen_iOS`, `installfr_iOS`, `activateen_iOS`, `activatefr_iOS`, `autorenewen_iOS`, `autorenewenfr_iOS`, `overviewen_linux`, `overviewfr_linux`, `installen_linux`, `installfr_linux`, `activateen_linux`, `activatefr_linux`, `autorenewen_linux`, `autorenewenfr_linux`, `overviewen_mac`, `overviewfr_mac`, `installen_mac`, `installfr_mac`, `activateen_mac`, `activatefr_mac`, `autorenewen_mac`, `autorenewenfr_mac`, `overviewen_andriod`, `overviewfr_andriod`, `installen_andriod`, `installfr_andriod`, `activateen_andriod`, `activatefr_andriod`, `autorenewen_andriod`, `autorenewenfr_andriod`) VALUES ('$last_id','$overviewen_window', '$overviewfr_window', '$installen_window', '$installfr_window', '$activateen_window', '$activatefr_window', '$autorenewen_window', '$autorenewenfr_window', '$overviewen_iOS', '$overviewfr_iOS', '$installen_iOS', '$installfr_iOS', '$activateen_iOS', '$activatefr_iOS', '$autorenewen_iOS', '$autorenewenfr_iOS', '$overviewen_linux', '$overviewfr_linux','$installen_linux', '$installfr_linux', '$activateen_linux', '$activatefr_linux', '$autorenewen_linux', '$autorenewenfr_linux', '$overviewen_mac', '$overviewfr_mac', '$installen_mac', '$installfr_mac', '$activateen_mac', '$activatefr_mac', '$autorenewen_mac', '$autorenewenfr_mac', '$overviewen_andriod', '$overviewfr_andriod','$installen_andriod', '$installfr_andriod', '$activateen_andriod', '$activatefr_andriod', '$autorenewen_andriod','$autorenewenfr_andriod')";
     
        if (mysqli_query($conn, $queryyy)) {
           ?><div class="alert alert-success">
        <strong>Success!</strong> Record has been successfully created.
      </div>
    <?php
        }else {
      echo "Error creating record : " . mysqli_error($conn);


        }


  
  } else {
      echo "Error creating record : " . mysqli_error($conn);
  }

 }









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
$qu_del = "DELETE FROM `products` WHERE Product_ID='$id_del'";

  if (mysqli_query($conn, $qu_del)) {

    $qu_del = "DELETE FROM `product_record` WHERE Product_ID='$id_del'";

        if (mysqli_query($conn, $qu_del)) {


                $qu_del = "DELETE FROM `videos_section` WHERE product_id='$id_del'";

                      if (mysqli_query($conn, $qu_del)) {
                          ?><div class="alert alert-danger">
                            <strong>Success!</strong> Record has been successfully deleted.
                          </div>
                        <?php

                        
                      }

        }









  } else {
      echo "Error Deleting record: " . mysqli_error($conn);
  }


}





session_start();
        if (!isset($_SESSION['user'])) {
          header('Location: index.php');
    $_SESSION["err"] = "Unauthorized Access.Pls login First";
   
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
         <button class="btn  btn-primary" > Home</button>  
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
          <a class="active" href="changepassword.php">
         <button class="btn  btn-primary"  > Change Password</button>  
      </a>
            <a class="active" href="index.php">
         <button class="btn  btn-primary"  > logout</button>  
      </a>
     </div>
    </div>


</div>
 
<div class="container main" style="margin-top: 38px;">
  &nbsp;&nbsp;&nbsp;&nbsp;<div class="btn-group bg-primary" style="position: fixed; margin-bottom: : 18PX;" role="group" aria-label="Basic example" >
  <a class="active" target="_blank" href="all_template.php">
         <button  class="btn  btn-primary btn-sm"> View All products</button>  
      </a>
       <a class="active" href="add_product.php">
         <button class="btn  btn-primary btn-sm">Add New Product</button>  
      </a>
    </div>
  <table width="60%" class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th width="5%" scope="col">product_id</th>
      <th width="35%" scope="col"> Product Name</th>
      <th width="17%" scope="col">View</th>
      <th width="17%" scope="col">Edit</th>
      <th width="10%" scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

<?php  
$query = "SELECT * FROM products";
$result = $conn->query($query); 
 while($row = $result->fetch_assoc()){ ?>
    <tr>
    
      <td><?php echo $row["Product_ID"];  ?></td>
      <td><?php echo $row["Product"];  ?> </td>

       <td><a  target="_blank" href="single_template.php?pro_id=<?php echo $row["Product_ID"] ?>"><button type="text" class="btn  btn-primary" ><i class='finder fa fa-save'></i> View Template  </button></a></td>

      <td><a href="edit_product.php?id=<?php echo $row["Product_ID"] ?>"><button type="text" class="btn  btn-primary" ><i class='finder fa fa-save'></i> Edit  </button></a></td>
      <td>
        <a href="index.php?del=<?php echo $row["Product_ID"] ?>"><button type="text" class="btn  btn-danger" ><i class='finder fa fa-save'></i> Delete  </button></a> 

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
