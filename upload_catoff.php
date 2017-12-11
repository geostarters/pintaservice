<?php
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolderRoot = 'cloudifier';   //2
$storeFolderServeis = 'serveis';
$storeFolderCatOffline = 'catoffline';
$paramUid = $_POST['uid'];
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = $ds. $storeFolderRoot . $ds. $storeFolderServeis . $ds. $storeFolderCatOffline . $ds. $paramUid . $ds;  //4   
 
	if (!file_exists($targetPath)) {
		mkdir($targetPath, 0777, true);
	}
 
	//$time=date("Ymdhisa");
   
    //$targetFile =  $targetPath.$time. $_FILES['file']['name'];  //5
	$targetFile =  $targetPath. $_FILES['file']['name'];  //5
	//$targetFile2 =  $targetPath2.$time. $_FILES['file']['name'];  //5 
    
    
    
 
    move_uploaded_file($tempFile,$targetFile); //6
	//move_uploaded_file($tempFile,$targetFile2); //6
	
	echo '{"STATUS":"OK","uid":"'.$paramUid.'","targetFile":"'.$targetFile.'"}';
     
}else{
	
	echo '{"STATUS":"ERROR","STYLE":"No es pot carregar"}';
}	
?>     

