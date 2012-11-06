<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include'StoregeClass.php';
       $document= new Storege('./storage.xml','./schema.xsd');
       
   //    $document->addItem('usb', 3, 'A', "C");
       //$document->setItem('123123wqe', 'usb', 3, 'A', "C");
      // $document->setDomEl();

     ///  $document->setItem1('helpppppppp', 'usb', 3, 'A', "C");
       ///$document->addItemToDOM();
       ///$document->setItem1('lllllllllllll', 'usb', 3, 'A', "C");
       ///$document->addItemToDOM();
       //$document->setItem1('3333333333', 'usb', 3, 'A', "C");
       //$document->addItemToDOM();
       //$document->getItemDOM(3);
       ///$document->addItemToDOM();
      // $document->removeItem(4);
      // $document->save();
       //$document->validate('./schema.xsd');
     //  $document->setItem($document->getItemElbyIndex(3)); 
      // $document->addItemToDOM();
      // $document->removeItembyIndex(0);
      
       $document->getItemElbyIndex(1);
       //$document->mStoreItem->mCategory->nodeValue='C3';
       $document->mStoreItem->modDomEl( 'usb', 3, 'A', "C");
       
      
      $document->save();
       




// $document->printNodes();
       //// Hello Tony
       ///// New branche
       //test inside
       
     //  $document->addItem('LG','0.2','Notebook','A3');
       
      //  for($i=0;$i < $document->mSroreHouseSxml->count();$i++){
       // $document->getItemN($i, 'item');
        //$document->printItem();
        
       // }
        
        

     
        

        ?>
    </body>
</html>
