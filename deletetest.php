<?php 
         echo "no";
          $length_of_saved=0;
         $OS_ED="";
          $query = "SELECT * FROM product_record";
           $result = $conn->query($query); 
           while($inner = $result->fetch_assoc()){
             if($product_id==$inner["Product_ID"] && $inner["os_id"]==$row["os_id"]){
              
               $OS_ED = explode(',', $inner["OS_Edition"]); 
              $length_of_saved = count($OS_ED);
               }
             }

            
        $list = explode(',', $row["OS_Edition"]); 
         // $list= array_reverse($list); 
        $length = count($list);
        $common=array_intersect($list,$OS_ED);
        print_r($common);
        $lenghtofcom=count($common);
        for ($i = 0; $i < $lenghtofcom; $i++){
?>  &nbsp;&nbsp;<input  name="<?php echo $row["OS"]."[]";  ?>" type="checkbox" checked value="<?php echo $list[$i];?>">  
<?php echo $common[$i];

        }
           for ($i = 0; $i