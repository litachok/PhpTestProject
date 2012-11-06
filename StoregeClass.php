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
    public $mStoreItem;
    protected $mDomElement;


    function __construct($xmlsrc, $schemasrc)
    {
        $this->mStoreHouseDOM=new DOMDocument();// В конструктор
        $this->open($xmlsrc);
        $this->validate($schemasrc);
        //
      //  $this->mStoreItem= new Item($this->mStoreHouseDOM);/// В конструктор
   }
    function open($xmlsrc)
    {
       // $this->mSchemasrc=$schemasrc;
        $this->mStoresrc=$xmlsrc;             
        $this->mStoreHouseDOM->load($xmlsrc); 
     //   $this->validate($schemasrc);
     
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
            $curItemDEl=$this->mStoreItem->getDomEl();
            $root->appendChild($curItemDEl);         
     }
  
     function getItemElbyIndex($index)
     {
         $root= $this->mStoreHouseDOM->documentElement->getElementsByTagName("item");
         $newItem=$root->item($index);
         $this->setItem($newItem);
         
         //return $root->item($index);
    }
    function removeItem()
    {      
        $this->mStoreItem->remove();    
    }
   
    /*  function removeItembyIndex($index)
    {   $doc=$this->mStoreHouseDOM;
        $this->setItem($this->getItemElbyIndex($index));    
        $this->mStoreItem->remove();    
    }
   * 
   */
     
    
    
}


?>
