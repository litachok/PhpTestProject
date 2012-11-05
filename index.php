<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include'StoregeClass.php';
       $document= new Storege();
       $document->open('./storage.xml','./schema.xsd');
      // $document->printNodes();
       //// Hello Tony
       ///// New branche
       //test inside
       
       $document->addItem('LG','0.2','Notebook','A3');
       
        for($i=0;$i < $document->mSroreHouseSxml->count();$i++){
        $document->getItemN($i, 'item');
        $document->printItem();
        
        }
        
        

     
        

        ?>
    </body>
</html>
