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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     /*   $xml = new DOMDocument(); 
        $xml->load('./storage.xml');
        $xsdpath = new DOMXPath($xml);
        
        $productxp=$xsdpath->query("item")->item(0);
        print_r($productxp);
        
        
       */ 
        
        
      /*  if ($xml->schemaValidate("./schema.xsd")){
            
            echo "validate<p/>" ;
        //    $root=$xml->documentElement;
           // $type=$root->nodeName;
             /////////XPath/////////////////////////////////
     //       $XPxml = simplexml_load_file("./storage.xml");
            //$product= new SimpleXMLElement();
     //       $products = $XPxml->xpath("item");
           // $product=$products[0];
        //    print_r($products[0]->attributes()->id);
          //  print_r($products[0]->name.'<br/>');
            //print_r($products[0]);
         ///////////////////////////////////////////////// 
            
            
       
          //////////DOM///////////////////////////////////  
             
        }  else {
        echo "Unvalidate <p/>";    
        }
     
        
*/
     
        ?>
    </body>
</html>
