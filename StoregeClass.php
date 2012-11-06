<?php


    
/**
 * Description of StoregeClass
 * 
 * Represent storehouse  
 * 
 * @author Bevzyuk
 */
include 'ItemClass.php';
class Storege {
   
    public $mStoreHouseDOM;
    protected $mStoresrc;
    protected $mSchemasrc;
    protected $mStoreItem;
    public $mSroreHouseSxml;
    protected $mDomElement;


    function __construct()
    {
        $this->mStoreHouseDOM=new DOMDocument();// В конструктор
      //  $this->mStoreItem= new Item($this->mStoreHouseDOM);/// В конструктор
   }
    function open($xmlsrc, $schemasrc)
    {
        $this->mSchemasrc=$schemasrc;
        $this->mStoresrc=$xmlsrc;
                  
        $this->mStoreHouseDOM->load($xmlsrc); 
        $this->validate($schemasrc);
 
        
    }
    
    //Save curent DOMDocument in to file
    function save()
    {
        $this->mStoreHouseDOM->save($mStoresrc);        
    }
 
    //Set Storege Item propertise
    function setItem1($inId,$inName,$inWeight,$inCategory,$inLocation)
    {   
        $this->mStoreItem= new Item($this->mStoreHouseDOM);
        $this->mStoreItem->setItem($inId, $inName, $inWeight, $inCategory, $inLocation);  
    }
    
    //validate XML Schema check;
    function validate($schema)
    {  
        if($this->mStoreHouseDOM->schemaValidate($schema))
            return print 'valid';
        else   return print 'UnValid';
    }
       
     function addItemToDOM()
    {
            $root= $this->mStoreHouseDOM->documentElement;
            $root->appendChild($this->mStoreItem->getDomEl());
            
            //Save to file
          
          
     }
  
     function getItemDOM($index){
         
         $root= $this->mStoreHouseDOM->documentElement->getElementsByTagName("item");
         $item= $root->item($index)->childNodes;
         
            //attr id='asdasdasdasd'
         $id=$root->item($index)->getAttributeNode('id')->nodeValue;
         
         /*
                <name> </name>
		<weight> </weight>
		<category> </category>
		<location> </location>
         
          * 
          */
         foreach ($item as $node)
         {  
                if ($node->nodeType == XML_ELEMENT_NODE)
                {
                     if ($node->nodeName == "name") 
                     {
                         $name=$node->nodeValue;
                     }
                     elseif ($node->nodeName == "weight") 
                     {
                         $weight=$node->nodeValue;
                     }
                     elseif ($node->nodeName == "category") 
                     {
                         $category=$node->nodeValue;
                     }
                    elseif ($node->nodeName == "location") 
                     {
                         $location=$node->nodeValue;
                     }           
               }
         }
         $this->setItem1($id,$name,$weight,$category,$location);
     }
}


?>
