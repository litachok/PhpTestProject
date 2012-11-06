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
    //    $this->mStoreHouseDOM->save($mStoresrc); 
        $this->mStoreHouseDOM->save('./tempStora.xml'); 
    }
     //validate XML Schema check;
    function validate($schema)
    {  
        if($this->mStoreHouseDOM->schemaValidate($schema))
            return print 'valid';
        else   return print 'UnValid';
    }
 
    //Set Storege Item propertise
    function setItem1($inId,$inName,$inWeight,$inCategory,$inLocation)
    {   
        $this->mStoreItem= new Item($this->mStoreHouseDOM);
        $this->mStoreItem->setItem($inId, $inName, $inWeight, $inCategory, $inLocation);  
    }
     function setItem($inDomEl)
    {   $this->mStoreItem= new Item($this->mStoreHouseDOM);
        $this->mStoreItem->setDomEl($inDomEl);  
    }
        
     function addItemToDOM()
     {
            $root= $this->mStoreHouseDOM->documentElement;
            $root->appendChild($this->mStoreItem->getDomEl());         
     }
  
     function getItemElbyIndex($index)
     {
         $root= $this->mStoreHouseDOM->documentElement->getElementsByTagName("item");
         return $root->item($index);
    }
    function removeItembyIndex($index)
    {   $doc=$this->mStoreHouseDOM;
        $node=$this->getItemElbyIndex($index);    
        $this->mStoreItem->remove($doc, $node);    
    }
    
}


?>
