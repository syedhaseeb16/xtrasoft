<?php
  session_start();
        if (!isset($_SESSION['user'])) {
          header('Location: index.php');
    $_SESSION["err"] = "Unauthorized Access.Pls login First";
   
        }
$product_id="";
require_once 'config.php'; 
if (isset($_GET['pro_id'])) {
      $product_id=$_GET['pro_id'];
     
  

}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <head>
  <title>TEMPLETE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
table, th, td,tr {
  border: 0px ; 
  font-size:12px;
  border-spacing: 0px;
  padding: 0 !important;
  border-style: none;
}

p{
  margin:0;
  padding:0;
  font-size:12px;
}

.edition{
  margin:0;
  padding:0;
  font-size:12px;
}
a {
  color: #2f5496;
  font-weight: bold;
  word-wrap: break-word;
  text-decoration: underline;
  font-size:12px;
}

table.fixedlayouts {
  table-layout: fixed;
  width: 722px;  
}
table.fixedlayouts80 {
  table-layout: fixed;
  width: 722px;  
}
table.fixedlayoutsup {
  table-layout: fixed;
  width: 722px;  
}

</style>
</head>

<body>
<div class="container-fluid">
  <?php 
  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);
  $Category="";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $match=$row["Product_ID"];
      $manufacturer_id=$row["Manufacturer_id"];
      //for one to one products**************************************************

          $general_phone_EN="";
          $general_phone_FR="";
          $general_msg_txt_EN="";
          $general_msg_txt_FR="";
          $general_paper_link_EN="";
          $general_paper_txt_EN="";
          $general_paper_link_FR="";
          $general_paper_txt_FR="";
          //--faqs and user guide
   
          $guideuser_EN_LINK="";
          $guide_faq_EN="";
          $guide_faq_EN_LINK="";
          $guide_other_EN="";
          $guide_other_EN_LINK="";

          $guideuser_FR="";
          $guideuser_FR_LINK="";
          $guide_faq_FR="";
          $guide_faq_FR_LINK="";
          $guide_other_FR="";
          $guide_other_FR_LINK="";

            $guideuser_EN_LINK=$row["guideuser_EN_LINK"];
            $guide_faq_EN_LINK=$row["guide_faq_EN_LINK"];
            $guide_faq_FR_LINK=$row["guide_faq_FR_LINK"];
            $guideuser_FR_LINK=$row["guideuser_FR_LINK"];



          $Manufacturer_Logo="";
          $Product_Manufacturer="";


          $Xtrasoft_logo="";
          $Xtrasoft_en_phone="";
          $xtrasoft_livechat_en="";
          $xtrasoft_email_en="";
          $xtrasoft_suport_en="";
          $Xtrasoft_FR_phone="";
          $xtrasoft_livechat_FR="";
          $xtrasoft_email_FR="";
          $xtrasoft_suport_FR="";

      $sqlll = "SELECT * FROM   manufacture where Manufacturer_id='$manufacturer_id' " ;
      $resulttt = $conn->query($sqlll);
      $rowww = $resulttt->fetch_assoc();

            $Manufacturer_Logo=$rowww["Manufacturer_Logo"];
            $Product_Manufacturer=$rowww["Manufacturer"];
            $general_phone_EN=$rowww["Supphoen"];
            $general_phone_FR=$rowww["Supphofr"];
            $general_msg_link_EN=$rowww["supchaten_url"];
            $general_msg_link_FR=$rowww["supchatfr"];
            $general_paper_link_EN=$rowww["supen"];
            $general_paper_link_FR=$rowww["supfr"];
            $general_mail_link_EN=$rowww["general_mail_link_EN"];
            $general_mail_link_FR=$rowww["general_mail_FR"];


            //$guide_other_EN=$rowww["guide_otheren"];
            //$guide_other_EN_LINK=$rowww["guide_other_EN_LINK"];


            //$guide_faq_FR=$rowww["guidefaqfr"];
            //$guide_faq_FR_LINK=$rowww["guide_faq_FR_LINK"];
            //$guide_other_FR=$rowww["guide_otherfr"];
          //  $guide_other_FR_LINK=$rowww["guide_other_FR_LINK"];
//xtrasoft data

      $sqllll = "SELECT * FROM   xtrasoft where xtra_soft_id='1' " ;
      $resultttt = $conn->query($sqllll);
      $rowwww = $resultttt->fetch_assoc();

          $Xtrasoft_logo=$rowwww["xtrasoft_logo"];
          $Xtrasoft_en_phone=$rowwww["xtrasoft_en_phone"];
          $xtrasoft_livechat_en=$rowwww["xtrasoft_livechat_en"];
          $xtrasoft_email_en=$rowwww["xtrasoft_email_en"];
          $xtrasoft_suport_en=$rowwww["xtrasoft_suport_en"];
          $Xtrasoft_FR_phone=$rowwww["xtrasoft_FR_phone"];
          $xtrasoft_livechat_FR=$rowwww["xtrasoft_livechat_FR"];
          $xtrasoft_email_FR=$rowwww["xtrasoft_email_FR"];
          $xtrasoft_suport_FR=$rowwww["xtrasoft_suport_FR"];


//***************************************
      $sqll = "SELECT * FROM product_record where Product_ID='$match' " ;
      
      $resultt = $conn->query($sqll);
   

      if ($resultt->num_rows > 0) {
        $Category="";
        //--------------andriod
          $andriod_link_EN="";
          $andriod_link_text_EN="";
          $andriod_link_FR="";
          $andriod_link_text_FR="";
          $andriod_OS_Edition="";
          
          //----------------------------iOS
          $ios_link_EN="";
          $ios_link_text_EN="";
          $ios_link_FR="";
          $ios_link_text_FR="";
          $ios_OS_Edition="";
         

          //--------------windows
              $windows_link_EN="";
          $windows_link_text_EN="";
          $windows_link_FR="";
          $windows_link_text_FR="";
          $windows_OS_Edition="";
        
            //--------------mac

          $Mac_link_EN="";
          $Mac_link_text_EN="";
          $Mac_link_FR="";
          $Mac_link_text_FR="";
          $Mac_OS_Edition="";
   
          //ost
          $ost_link_EN="";
          $ost_link_text_EN="";
          $ost_link_FR="";
          $ost_link_text_FR="";
          $ost_OS_Edition="";
          //linux
          $linux_link_EN="";
          $linux_link_text_EN="";
          $linux_link_FR="";
          $linux_link_text_FR="";
          $linux_OS_Edition="";
          
       

        while($roww = $resultt->fetch_assoc()) {
             $Category=$roww["Category"];
            
         if($roww["os_id"]=="1"){
            $andriod_link_EN=$roww["Download_EN_LINK"];
            //$andriod_link_text_EN=$roww["Download_EN"];
            $andriod_link_FR=$roww["Download_FR_LINK"];
           // $andriod_link_text_FR=$roww["Download_FR"];
            $andriod_OS_Edition=$roww["OS_Edition"];
            



         }
          elseif ($roww["os_id"]=="2") {
            $ios_link_EN=$roww["Download_EN_LINK"];
            //$ios_link_text_EN=$roww["Download_EN"];
            $ios_link_FR=$roww["Download_FR_LINK"];
            //$ios_link_text_FR=$roww["Download_FR"];
            $ios_OS_Edition=$roww["OS_Edition"];
          


            # code...
          }elseif ($roww["os_id"]=="3") {

            $Mac_link_EN=$roww["Download_EN_LINK"];
           // $Mac_link_text_EN=$roww["Download_EN"];
            $Mac_link_FR=$roww["Download_FR_LINK"];
            //$Mac_link_text_FR=$roww["Download_FR"];
            $Mac_OS_Edition=$roww["OS_Edition"];
        


            # code...
          }elseif ($roww["os_id"]=="4") {

            $windows_link_EN=$roww["Download_EN_LINK"];
            //$windows_link_text_EN=$roww["Download_EN"];
            $windows_link_FR=$roww["Download_FR_LINK"];
            //$windows_link_text_FR=$roww["Download_FR"];
            $windows_OS_Edition=$roww["OS_Edition"];
        

            # code...
          }elseif ($roww["os_id"]=="5") {

            $linux_link_EN=$roww["Download_EN_LINK"];
            //$ost_link_text_EN=$roww["Download_EN"];
            $linux_link_FR=$roww["Download_FR_LINK"];
            //$ost_link_text_FR=$roww["Download_FR"];
            $linux_OS_Edition=$roww["OS_Edition"];
          

            # code...
          }
          else{
            $ost_link_EN=$roww["Download_EN_LINK"];
            $ost_link_FR=$roww["Download_FR_LINK"];
            $ost_OS_Edition=$roww["OS_Edition"];

          }


    }}
?> <br><br><div ><?php 
if($Category=="Windows")
{

?> 
  <b><p>Prodcut ID: <?php echo $row["Product_ID"]." PRODUCT NAME:".$row["Product"];  ?></p></b> 
  <br><p><b>Item:</b><br>   
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{product_name}<br>
  <b>Product Actication Code:</b><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{serial_key}</p>

  <!--<b><p>Download Template 2</p></b>-->
<table class="fixedlayouts ">
       <tr>
        <td width="5%"><img src="english.png"    class="img-fluid" alt="Responsive image" /></td>
        
        <td width="9%"><span style="font-weight: bold;">Downloads</span></td>
        
        <td width="37%"><?php  if($ost_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496; font-weight: bold;" href="<?php echo $ost_link_EN;   ?>"><?php echo "Iso Download";   ?></a>     <?php    }  ?></td>
      </tr>
      <tr>
        <td><img src="french.png"   class="img-fluid" alt="Responsive image"></td>
        <td><span style="font-weight: bold;">Téléchargements</span></td>
        
        <td><?php  if($ost_link_FR==NULL){echo "";}else{ ?><a target="_blank" style="color: #2f5496; font-weight: bold;" href="<?php echo $ost_link_FR ;   ?>"><?php echo "Iso Téléchargements ";   ?></a>     <?php    }  ?></td>
      </tr>
</table>


<?php  
}else{
 ?>
   <b><p>Prodcut ID: <?php echo $row["Product_ID"]." PRODUCT NAME:".$row["Product"];  ?></p></b>  
  <!--<b><p>Download Template 1</p></b>--> 
    <br><p><b>Item:</b><br> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{product name}<br>
  <b>Product Actication Code:</b><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{serial key}</p>       
  <table class="fixedlayouts" >
 
      <tr>
        <!--<img style="margin-top:10%;" src="download.png"    height="50px" widtd="50px" class="img-fluid" alt="Responsive image"/></td>-->
        <td width="5%"></td>
        <td width="9%"></td>
        <span style="color:blue"><td width="7.4%" style="text-align: left;"><img src="window.png"  class="img-fluid" alt="Responsive image" /></td></span>
        <span style="color:blue"><td width="7.4%" style="text-align: left;"><img src="mac.png"     class="img-fluid" alt="Responsive image" /></td></span>
        <span style="color:blue"><td  width="7.4%" style="text-align: left;"><img src="android.png"     class="img-fluid" alt="Responsive image" /></td></span>
        <span style="color:blue"><td  width="7.4%" style="text-align: left;"><img src="ios.png"     class="img-fluid" alt="Responsive image" /></td></span>
        <span style="color:blue"><td  width="7.4%" style="text-align: left;"><img src="linux.png"     class="img-fluid" alt="Responsive image" /></td></span>
        
      </tr>
  
  
      <tr>
        <td><img src="english.png"    class="img-fluid" alt="Responsive image"></td>
        
        <td><span style="font-weight: bold;">Downloads</span></td>
        
        <td style="text-align: left";><?php  if($windows_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496; font-weight: bold;" href="<?php echo $windows_link_EN;   ?>"><?php echo "Windows";   ?></a>     <?php    }  ?></td>


          <td style="text-align: left";><?php  if($Mac_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $Mac_link_EN;   ?>"><?php echo "Mac";   ?></a>     <?php    }  ?></td>
          
        
      
         <td style="text-align: left;";><?php  if($andriod_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $andriod_link_EN;   ?>"><?php echo "Android";   ?></a>     <?php    }  ?></td>


         
         <td style="text-align: left;";><?php  if($ios_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $ios_link_EN;   ?>"><?php echo "iOS";   ?></a>     <?php    }  ?></td>
          <td style="text-align: left;";><?php  if($linux_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $linux_link_EN;   ?>"><?php echo "Linux";   ?></a>     <?php    }  ?></td>
        
      </tr>
      <tr>
        <td><img src="french.png"    alt="Responsive image" /></td>
        <td ><span style="font-weight: bold;">Téléchargements</span></td>
        
        <td style="text-align: left; class="my-auto"><?php  if($windows_link_FR==NULL){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $windows_link_FR ;   ?>"><?php echo "Windows";   ?></a>     <?php    }  ?></td>

         <td style="text-align: left;";><?php  if($Mac_link_FR==NULL){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $Mac_link_FR ;   ?>"><?php echo "Mac";   ?></a>     <?php    }  ?></td>
  
        
        <td style="text-align: left;";><?php  if($andriod_link_FR==NULL){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $andriod_link_FR ;   ?>"><?php echo "Android";   ?></a>     <?php    }  ?></td>

         <td ><?php  if($ios_link_FR==NULL){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;margin-top: 20px;" href="<?php echo $ios_link_FR ;   ?>"><?php echo "iOS";   ?></a>     <?php    }  ?></td>
          <td style="text-align: left;";><?php  if($linux_link_FR==NULL){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $linux_link_FR ;   ?>"><?php echo "Linux";   ?></a>     <?php    }  ?></td>

        
       
      </tr>
      <tr valign="top">
                  <td></td>
        <td></td>
      
         <td ><font color="#708090" style="font-size: 8px;"><?php  if($windows_link_FR==NULL && $windows_link_EN==NULL){echo "";}else { 
          $list = explode(',', $windows_OS_Edition); 
          $list= array_reverse($list); 
           $length = count($list);
         ?> <?php 

            for ($i = 0; $i < $length; $i++) {
              if($i<$length){?><span class="edition"><?php  echo $list[$i]; ?> </span><br><?php }
              else{  
                if($i==15){?> <?php } ?>
               <span><?php echo $list[$i];?></span> <?php }
           }
                   if($i==2){?> <?php } 
              ?>

   
                
               <?php 
               }  ?></font></td>
         <td><font color="#708090"><?php  if($Mac_link_FR==NULL && $Mac_link_EN==NULL){echo "";}else { 
          $list = explode(',', $Mac_OS_Edition); 
          $list= array_reverse($list); 
           $length = count($list);
         ?> <?php 

            for ($i = 0; $i < $length; $i++) {
              if($i<$length){?><span class="edition"><?php  echo $list[$i]; ?> </span><br><?php }
              else{  
                if($i==15){?> <?php } ?>
               <span><?php echo $list[$i];?></span> <?php }
           }
                   if($i==2){?> <?php } 
              ?>

   
                
               <?php 
               }   ?></font></td>

          <td>
            <font color="#708090"><?php  if($andriod_link_FR==NULL && $andriod_link_EN==NULL){echo "";}else { 
          $list = explode(',', $andriod_OS_Edition); 
          $list= array_reverse($list); 
           $length = count($list);
         ?> <?php 

            for ($i = 0; $i < $length; $i++) {
              if($i<$length){?><span class="edition"><?php  echo $list[$i]; ?> </span><br><?php }
              else{  
                if($i==15){?> <?php } ?>
               <span><?php echo $list[$i];?></span> <?php }
           }
                   if($i==2){?> <?php } 
              ?>
                
               <?php 
               }    ?>

             </font>
          </td>
         <td><font color="#708090"><?php  if($ios_link_FR==NULL && $ios_link_EN==NULL){echo "";}else { 
          $list = explode(',', $ios_OS_Edition); 
          $list= array_reverse($list); 
           $length = count($list);
         ?> <?php 

            for ($i = 0; $i < $length; $i++) {
              if($i<$length){?><span class="edition"><?php  echo $list[$i]; ?> </span><br><?php }
              else{  
                if($i==15){?> <?php } ?>
               <span><?php echo $list[$i];?></span> <?php }
           }
                   if($i==2){?> <?php } 
              ?>

                
               <?php 
               }   ?></font></td>
         <td><font color="#708090"><?php  if($linux_link_FR==NULL && $linux_link_EN==NULL){echo "";}else { 
          $list = explode(',', $linux_OS_Edition); 
          $list= array_reverse($list); 
           $length = count($list);
         ?> <?php 

            for ($i = 0; $i < $length; $i++) {
              if($i<$length){?><span class="edition"><?php  echo $list[$i]; ?> </span><br><?php }
              else{  
                if($i==15){?> <?php } ?>
               <span><?php echo $list[$i];?></span> <?php }
           }
                   if($i==2){?> <?php } 
              ?>

   
                
               <?php 
               }    ?></font></td>
        
      </tr>
  
  </table>

  <?php
}
?>


  <!---------------------------USER GUIDE ----------------------------------------------->
  <br>
 <table class="fixedlayouts80">
       <tr>
        <!--<td rowspan="2" width="8%" style="text-align: center;"> <img src="book.png"    height="50px" width="50px" class="img-fluid" alt="Responsive image"></td>-->
        <td width="5%" ><img src="english.png" class="img-fluid" alt="Responsive image"></td>
        
        <td width="9%"><span style="font-weight: bold;">Instructions</span></td>

        <td width="37%">
          <?php  if($guideuser_EN_LINK==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $guideuser_EN_LINK;   ?>"><?php echo "User Guide"." | ";   ?></a>     <?php    }  ?>

        <?php  if($guide_faq_EN_LINK==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $guide_faq_EN_LINK;   ?>"><?php echo "Faqs"." | ";   ?></a>     <?php    }  ?>

       </td>
        
      </tr>
      <tr>
        <td ><img src="french.png"  class="img-fluid" alt="Responsive image"></td>
        <td><span style="font-weight: bold;">Instructions<span></td>
            <td>
           <?php  if($guideuser_FR_LINK==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $guideuser_FR_LINK;   ?>"><?php echo "User Guide"." | ";   ?></a>     <?php    }  ?>

       <?php  if($guide_faq_FR_LINK==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $guide_faq_FR_LINK;   ?>"><?php echo "Faqs"." | ";   ?></a>     <?php    }  ?>
   </td>
      </tr>
  
</table>

<!---------------------------Videos ----------------------------------------------->
<?php 
$overviewen_window="";
$installen_window="";
$activateen_window="";
$autorenewen_window="";
$overviewfr_window="";
$installfr_window="";
$activatefr_window="";
$autorenewenfr_window="";

$overviewen_iOS="";
 $overviewfr_iOS="";
 $installen_iOS="";
 $installfr_iOS="";
 $activateen_iOS="";
 $activatefr_iOS="";
 $autorenewen_iOS="";
 $autorenewenfr_iOS="";
 $overviewen_linux="";
 $overviewfr_linux="";
 $installen_linux="";
 $installfr_linux="";
 $activateen_linux="";
 $activatefr_linux="";
 $autorenewen_linux="";
 $autorenewenfr_linux="";
 $overviewen_mac="";
 $overviewfr_mac="";
 $installen_mac="";
 $installfr_mac="";
 $activateen_mac="";
 $activatefr_mac="";
 $autorenewen_mac="";
 $autorenewenfr_mac="";
 $overviewen_andriod="";
 $overviewfr_andriod="";
 $installen_andriod="";
 $installfr_andriod="";
 $activateen_andriod="";
 $activatefr_andriod="";
 $autorenewen_andriod="";
 $autorenewenfr_andriod="";

  

  $sqlv = "SELECT * FROM videos_section WHERE product_id='$product_id'";
  $resultv = $conn->query($sqlv);
  if ($result->num_rows > 0) {
  $rowv = $resultv->fetch_assoc();

$overviewen_window=$rowv["overviewen_window"];
$installen_window=$rowv["installen_window"];
$activateen_window=$rowv["activateen_window"];
$autorenewen_window=$rowv["autorenewen_window"];
$overviewfr_window=$rowv["overviewfr_window"];
$installfr_window=$rowv["installfr_window"];
$activatefr_window=$rowv["activatefr_window"];
$autorenewenfr_window=$rowv["autorenewenfr_window"];

 $overviewen_iOS=$rowv['overviewen_iOS'];
 $overviewfr_iOS=$rowv['overviewfr_iOS'];
 $installen_iOS=$rowv['installen_iOS'];
 $installfr_iOS=$rowv['installfr_iOS'];
 $activateen_iOS=$rowv['activateen_iOS'];
 $activatefr_iOS=$rowv['activatefr_iOS'];
 $autorenewen_iOS=$rowv['autorenewen_iOS'];
 $autorenewenfr_iOS=$rowv['autorenewenfr_iOS'];
 $overviewen_linux=$rowv['overviewen_linux'];
 $overviewfr_linux=$rowv['overviewfr_linux'];
 $installen_linux=$rowv['installen_linux'];
 $installfr_linux=$rowv['installfr_linux'];
 $activateen_linux=$rowv['activateen_linux'];
 $activatefr_linux=$rowv['activatefr_linux'];
 $autorenewen_linux=$rowv['autorenewen_linux'];
 $autorenewenfr_linux=$rowv['autorenewenfr_linux'];

 $overviewen_mac=$rowv['overviewen_mac'];
 $overviewfr_mac=$rowv['overviewfr_mac'];
 $installen_mac=$rowv['installen_mac'];
 $installen_mac=$rowv['installen_mac'];
 $activateen_mac=$rowv['activateen_mac'];
 $activatefr_mac=$rowv['activatefr_mac'];
 $autorenewen_mac=$rowv['autorenewen_mac'];
 $autorenewenfr_mac=$rowv['autorenewenfr_mac'];
 
 $overviewen_andriod=$rowv['overviewen_andriod'];
 $overviewfr_andriod=$rowv['overviewfr_andriod'];
 $installen_andriod=$rowv['installen_andriod'];
 $installfr_andriod=$rowv['installfr_andriod'];
 $activateen_andriod=$rowv['activateen_andriod'];
 $activatefr_andriod=$rowv['activatefr_andriod'];
 $autorenewen_andriod=$rowv['autorenewen_andriod'];
 $autorenewenfr_andriod=$rowv['autorenewenfr_andriod'];



}
  ?>
  <!---------------------------Videos ----------------------------------------------->
  <br> 
 <table class="fixedlayouts">
       <tr>
        <td width="5%" ><img src="english.png"     class="img-fluid" alt="Responsive image"></td>
        <td width="9%"><span style="font-weight: bold;">Videos</span></td>
        
        <td width="37%">


          <?php  if($overviewen_window==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewen_window;   ?>"><?php echo " Window Overview";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installen_window==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installen_window;   ?>"><?php echo " Window Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activateen_window==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activateen_window;   ?>"><?php echo "Window Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>
          <?php  if($autorenewenfr_window==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewenfr_window;   ?>"><?php echo "Window Auto Renewval";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>
   

          <?php   //mac-----------
            if($overviewen_mac==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewen_mac;   ?>"><?php echo "Overview Mac";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installen_mac==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installen_mac;   ?>"><?php echo "Mac Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activateen_mac==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activateen_mac;   ?>"><?php echo " Mac Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($autorenewen_mac==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewen_mac;   ?>"><?php echo " Mac AutoRenew";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>
        

            <?php //andriod-----------
            if($overviewen_andriod==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewen_andriod;   ?>"><?php echo "Overview andriod";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installen_andriod==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installen_andriod;   ?>"><?php echo "andriod Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activateen_andriod==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activateen_andriod;   ?>"><?php echo " andriod Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($autorenewen_andriod==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewen_andriod;   ?>"><?php echo " andriod AutoRenew";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>


         <?php //iOS-----------
            if($overviewen_iOS==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewen_iOS;   ?>"><?php echo "Overview iOS";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installen_iOS==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installen_iOS;   ?>"><?php echo "iOS Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activateen_iOS==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activateen_iOS;   ?>"><?php echo " iOS Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($autorenewen_iOS==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewen_iOS;   ?>"><?php echo " iOS AutoRenew";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

            <?php //Linux-----------
            if($overviewen_linux==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewen_linux;   ?>"><?php echo "Overview linux";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installen_linux==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installen_linux;   ?>"><?php echo "linux Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activateen_linux==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activateen_linux;   ?>"><?php echo " linux Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($autorenewen_linux==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewen_linux;   ?>"><?php echo " linux AutoRenew";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

  


      </td>
      </tr>
      <tr>
        <td><img src="french.png"   class="img-fluid" alt="Responsive image"></td>
        <td><span style="font-weight: bold;">Vidéos<span></td>
        
        <td><?php  if($overviewfr_window==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewfr_window;   ?>"><?php echo "Aperçu Windows";   ?></a> <span style="color: black" ><?php echo "|";  ?></span>    <?php    }  ?>
        <?php  if($installfr_window==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installfr_window;   ?>"><?php echo "Windows Installation ";   ?></a> <span style="color: black" ><?php echo "|";  ?></span>    <?php    }  ?>

        <?php  if($activatefr_window==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activatefr_window;   ?>"><?php echo " Windows Activation";   ?></a>  <span style="color: black" ><?php echo "|";  ?></span>   <?php    }  ?>


        <?php  if($autorenewenfr_window==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewenfr_window;   ?>"><?php echo "Windows Renouvellement ";   ?></a>  <span style="color: black" ><?php echo "|";  ?></span>   <?php    }  ?>

         <?php //mac-----------
            if($overviewfr_mac==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewen_mac;   ?>"><?php echo "Aperçu Mac";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installfr_mac==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installfr_mac;   ?>"><?php echo "Mac Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activatefr_mac==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activatefr_mac;   ?>"><?php echo " Mac Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($autorenewenfr_mac==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewenfr_mac;   ?>"><?php echo " Mac Renouvellement";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>
        

            <?php //andriod-----------
            if($overviewfr_andriod==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewfr_andriod;   ?>"><?php echo "Aperçu andriod";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installfr_andriod==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installfr_andriod;   ?>"><?php echo "andriod Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activatefr_andriod==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activatefr_andriod;   ?>"><?php echo " andriod Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($autorenewenfr_andriod==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewenfr_andriod;   ?>"><?php echo " andriod Renouvellement";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>


         <?php //iOS-----------
            if($overviewfr_iOS==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewfr_iOS;   ?>"><?php echo "Aperçu iOS";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installfr_iOS==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installfr_iOS;   ?>"><?php echo "iOS Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activatefr_iOS==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activatefr_iOS;   ?>"><?php echo " iOS Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($autorenewenfr_iOS==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewenfr_iOS;   ?>"><?php echo " iOS Renouvellement";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

            <?php //Linux-----------
            if($overviewfr_linux==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $overviewfr_linux;   ?>"><?php echo "Aperçu linux";   ?></a><span style="color: black" ><?php echo " | ";  ?></span>     <?php    }  ?>
        <?php  if($installfr_linux==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $installfr_linux;   ?>"><?php echo "linux Installation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($activatefr_linux==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $activatefr_linux;   ?>"><?php echo " linux Activation";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>

        <?php  if($autorenewenfr_linux==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $autorenewenfr_linux;   ?>"><?php echo " linux Renouvellement";   ?></a> <span style="color: black" ><?php echo " | ";  ?></span>    <?php    }  ?>


      </td>


        
       
      </tr>
  
</table>



 


  <!---------------------------support ----------------------------------------------->
 <br>
 <table class="fixedlayoutsup">
         <tr valign="bottom">
        <td   width="5%" style="text-align: center; ; "><!--<img style="margin-top:  50%; " src="support.png"    height="40px" width="40px" class="img-fluid" alt="Responsive image"/>--></td>
        <td width="9%"><?php if ($Manufacturer_Logo==NULL) {echo " "; }else{  ?> <img  height="31px" width="31px" src="<?php echo $Manufacturer_Logo; ?>"     class="img-fluid" alt="Responsive image" /><span class="edition" style="font-weight: bold;"><?php echo " ".$Product_Manufacturer;  ?></span> <?php }  ?></td>
        <td width="9%" style="text-align: center;"><img src="phone.png"     class="img-fluid" alt="Responsive image"></td>
        <td width="9%" style="text-align: center;"><img src="sms.png"     class="img-fluid" alt="Responsive image"></td>
        <td width="9%" style="text-align: center;"><img src="mail.png"   class="img-fluid" alt="Responsive image"></td>
        <td width="9%" style="text-align: center;"><img src="paper.png"     class="img-fluid" alt="Responsive image"></td>
        
   
      </tr>
       <tr valign="bottom">
        <td><img src="english.png"   class="img-fluid" alt="Responsive image" /></td>
        <td><span style="font-weight: bold;">User Support</span></td>
        
        <td style="text-align: center; font-weight: bold;"><?php  echo $general_phone_EN;  ?></td>
        
        
         <td style="text-align: center;"> <?php  if($general_msg_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $general_msg_link_EN;   ?>"><?php echo "Live Chat";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td>

         
         <td style="text-align: center;"> <?php  if($general_mail_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo "mailto:".$general_mail_link_EN;   ?>"><?php echo "Email";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td> 
         
         <td style="text-align: center;"> <?php  if($general_paper_link_EN==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $general_paper_link_EN;   ?>"><?php echo " Support Page";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td>  
       
              
      </tr>
      <tr valign="bottom">
        <td><img src="french.png"    class="img-fluid" alt="Responsive image" /></td>
        <td><span style="font-weight: bold;">Support utilisateur</span>
</td>
        <td style="text-align: center; font-weight: bold;"><?php  echo $general_phone_FR;  ?></td>
        
        
         <td style="text-align: center;"> <?php  if($general_msg_link_FR==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $general_msg_link_FR;   ?>"><?php echo "Live Chat";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td>

         
         <td style="text-align: center;"> <?php  if($general_mail_link_FR==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo "mailto:".$general_mail_link_FR;   ?>"><?php echo "Email";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td> 
         
         <td style="text-align: center;"> <?php  if($general_paper_link_FR==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $general_paper_link_FR;   ?>"><?php echo "Page Support";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td>  
         
      </tr>



         

      <!--XTRA SOFT SUPPORT SECTION -->
       <tr valign="center">
        <td   width="5%" style="text-align: center; ; "><!--<img style="margin-top:  50%; " src="support.png"    height="40px" width="40px" class="img-fluid" alt="Responsive image"/>--></td>
        <td width="9%"><?php if ($Xtrasoft_logo==NULL) {echo " "; }else{  ?> <img  height="45px" width="100px" src="<?php echo $Xtrasoft_logo; ?>" style="margin-top:5px;"    class="img-fluid" alt="Responsive image" /><span class="edition" style="font-weight: bold;"><?php echo " ";  ?></span> <?php }  ?></td>
        <td width="9%" style="text-align: center;"></td>
        <td width="9%" style="text-align: center;"></td>
        <td width="9%" style="text-align: center;"></td>
        <td width="9%" style="text-align: center;"></td>   
      </tr>
   
       
       <tr valign="bottom">
        <td><img src="english.png"   class="img-fluid" alt="Responsive image" /></td>
        <td><span style="font-weight: bold;">Support</span></td>
        
        <td style="text-align: center; font-weight: bold;"><?php  echo $Xtrasoft_en_phone;  ?></td>
        
        
         <td style="text-align: center;"> <?php  if($xtrasoft_livechat_en==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $xtrasoft_livechat_en;   ?>"><?php echo "Live Chat";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td>

         
         <td style="text-align: center;"> <?php  if($xtrasoft_email_en==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo "mailto:".$xtrasoft_email_en;   ?>"><?php echo "Email";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td> 
         
         <td style="text-align: center;"> <?php  if($xtrasoft_suport_en==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $xtrasoft_suport_en;   ?>"><?php echo " Support Page";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td>  
       
              
      </tr>
      <tr valign="bottom">
        <td><img src="french.png"    class="img-fluid" alt="Responsive image" /></td>
        <td><span style="font-weight: bold;">Assistance</span>
</td>
        <td style="text-align: center; font-weight: bold;"><?php  echo $Xtrasoft_FR_phone;  ?></td>
        
        
         <td style="text-align: center;"> <?php  if($xtrasoft_livechat_FR==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $xtrasoft_livechat_FR;   ?>"><?php echo "Live Chat";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td>

         
         <td style="text-align: center;"> <?php  if($xtrasoft_email_FR==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo "mailto:".$xtrasoft_email_FR;   ?>"><?php echo "Email";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td> 
         
         <td style="text-align: center;"> <?php  if($xtrasoft_suport_FR==""){echo "";}else{ ?><a target="_blank" style="color: #2f5496;font-weight: bold;" href="<?php echo $xtrasoft_suport_FR;   ?>"><?php echo "Page Support";   ?></a> <span style="color: black" ><?php echo "";  ?></span>    <?php    }  ?>   </td>  
         
      </tr>


     






  


</table>



</div>
<br><br>
<?php
  }
}








function image_resize($file_name, $width, $height, $crop=FALSE) {
   list($wid, $ht) = getimagesize($file_name);
   $r = $wid / $ht;
   if ($crop) {
      if ($wid > $ht) {
         $wid = ceil($wid-($width*abs($r-$width/$height)));
      } else {
         $ht = ceil($ht-($ht*abs($r-$w/$h)));
      }
      $new_width = $width;
      $new_height = $height;
   } else {
      if ($width/$height > $r) {
         $new_width = $height*$r;
         $new_height = $height;
      } else {
         $new_height = $width/$r;
         $new_width = $width;
      }
   }
   $source = imagecreatefromjpeg($file_name);
   $dst = imagecreatetruecolor($new_width, $new_height);
   image_copy_resampled($dst, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht);
   return $dst;
}

    ?>
</div>

</body>
</html>

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>