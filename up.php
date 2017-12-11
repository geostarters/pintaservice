<?php
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'tmp';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
   
   
   

 
 $time=date("Ymdhisa");
   
    $targetFile =  $targetPath.$time. $_FILES['file']['name'];  //5
    
    
    
 
    move_uploaded_file($tempFile,$targetFile); //6
	
	echo '{"STATUS":"OK","STYLE":"/pintaservice/tmp/'.$time.$_FILES['file']['name'].'"}';
     
}else{
	
	echo '{"STATUS":"ERROR","STYLE":"No es pot carregar"}';
}	
?>     

