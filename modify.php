<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
  include 'StoregeClass.php';
  $document= new Storege('./storage.xml','./schema.xsd');
  
   $value = $_GET['index'];
 
  $document->getItemElbyIndex($value);
 
  if (isset($_GET['run'])) $linkchoice=$_GET['run']; 
   else $linkchoice=''; 
  
   switch($linkchoice){ 

   case 'SaveItem' : 
//   $document->setItem1($inId, $inName, $inWeight, $inCategory, $inLocation);
   echo "Item Saved";
   echo $_GET['name'];    
   break; 
  } 
 
 
  
  
?>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify Element</title>
</head>
<body>
<form name="el" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div class="input">
<p><?php echo 'index: <input name="index" type="text" value="'.$value.'" />'; ?> </p>    
<p><?php echo 'Name: <input name="name" type="text" value="'.$document->mStoreItem->inName.'" />'; ?> </p>
<p><?php echo 'Weight: <input name="weight" type="text" value="'.$document->mStoreItem->inWeight.'" />'; ?></p>
<p><?php echo 'Category: <input name="category" type="text" value="'.$document->mStoreItem->inCategory.'" />'; ?></p>
<p><?php echo 'Location: <input name="value" type="text" value="'.$document->mStoreItem->inLocation.'" />'; ?></p>
</div>
<input type="submit" value="Save">
</form>   
<div id="button">
<br>       
<a href="?run=SaveItem?">Add</a>
<a href="?run=RemoveItem">Remove</a>
<?php echo '<a href="modify.php?index='.++$value.'">Next</a>' ?>
</div>
</body>
</html>