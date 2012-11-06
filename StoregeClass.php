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
    protected $mStoraPath;
    public $mStoreItem;
    protected $mDomElement;


    function __construct($xmlsrc, $schemasrc)
    {
        $this->mStoreHouseDOM=new DOMDocument();// В конструктор
        $this->mStoraPath='./Storage/';
        $this->open($xmlsrc);
        $this->validate($this->mStoraPath.$schemasrc);      
   }
    function open($xmlsrc)
    {
        $this->mStoresrc=$xmlsrc;             
        $this->mStoreHouseDOM->load($this->mStoraPath.$xmlsrc);  
    }
    //Save curent DOMDocument in to file
    function save()
    {
       $this->mStoreHouseDOM->save($this->mStoraPath.$this->mStoresrc); 
        //$this->mStoreHouseDOM->save('./Storage/'.'./tempStora.xml'); //temp
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
        $this->mStoreItem->multiSetItem($inId, $inName, $inWeight, $inCategory, $inLocation);  
    }
    
     function setItem($inDomEl)
    {   $this->mStoreItem= new Item($this->mStoreHouseDOM);
       // $this->mStoreItem->setDomEl($inDomEl);
       $this->mStoreItem->multiSetItem($inDomEl);
    }
    //append curent Item to DOM
     function addItemToDOM()
     {
            $root= $this->mStoreHouseDOM->documentElement;
            $curItemDEl=$this->mStoreItem->getDomEl();
            $root->appendChild($curItemDEl);         
     }
     //set curent Item by index
     function getItemElbyIndex($index)
     {
         $root= $this->mStoreHouseDOM->documentElement->getElementsByTagName("item");
         $newItem=$root->item($index);
         $this->setItem($newItem);
    }
    //remove curent Item
    function removeItem()
    {      
        $this->mStoreItem->remove();    
    }   
}


?>
