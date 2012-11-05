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


    function __construct(){
        $this->mStoreHouseDOM=new DOMDocument();// В конструктор
        $this->mStoreItem= new Item();/// В конструктор
        /////////SimpleXML
      //  $this->mSroreHouseSxml= new SimpleXMLElement();
        
   
        
    }
    function open($xmlsrc, $schemasrc){
        $this->mSchemasrc=$schemasrc;
        $this->mStoresrc=$xmlsrc;
        
       // $this->mStoreHouse=new DOMDocument();// В конструктор
        $this->mStoreHouseDOM->load($xmlsrc); 
        $this->validate($schemasrc);
        ////////////////SimpleXML
        $this->mSroreHouseSxml=simplexml_load_file($xmlsrc);
        
        
        
        
        
        
        
    }
    
    //Save curent DOMDocument in to file
    function save(){
        $this->mStoreHouseDOM->save($mStoresrc);        
    }
    function getItemN($index,$xpQuery){
        
        $itemArray=$this->mSroreHouseSxml->xpath($xpQuery);
        $inId=$itemArray[$index]->attributes()->id;
        $inName=$itemArray[$index]->name;
        $inWeight=$itemArray[$index]->weight;
        $inCategory=$itemArray[$index]->category;
        $inLocation=$itemArray[$index]->location;
      //  print_r($inLocation);
        $this->setItem($inId,$inName, $inWeight, $inCategory, $inLocation);
        
        
    }
  
    //Set Storege Item propertise
    function setItem($inId,$inName,$inWeight,$inCategory,$inLocation){
    //    $this->mStoreItem= new Item();/// В конструктор
        $this->mStoreItem->setId($inId);
        $this->mStoreItem->setName($inName);
        $this->mStoreItem->setWeight($inWeight);
        $this->mStoreItem->setCategory($inCategory);
        $this->mStoreItem->setLocation($inLocation);  
    }
    
    //validate XML Schema check;
    function validate($schema){  
        if($this->mStoreHouseDOM->schemaValidate($schema))
               return print 'valid';
        else   return print 'UnValid';
   }
    function printNodes()
    {    
         $itemaar=  $this->mStoreHouseDOM->getElementsByTagName('item');
            foreach ($itemaar as $node)
                {
                if($node->nodeType != XML_TEXT_NODE)
                    {
                    $children=$node->childNodes;
                  //  print_r($node);
                    foreach ($children as $child)
                        {
                        if($child->nodeType != XML_TEXT_NODE)
                            {
                             print $child->nodeName."<br/>";
                             print $child->nodeValue.'<br/>';
                            }
                        }
                    }              
                }
    }
    
    
    function printItem(){
        
        $this->mStoreItem->printItem();
        
    }
    
    
    function addItem($aName,$aWeight,$aCategory,$aLocation){
        $aName='sfdd';
        $root=new SimpleXMLElement("<storagehouse></storagehouse>");
        $rand='fdgs';
        $root->item['id']=$rand;
        $child= $root->item->addChild('name',$aName);
        $child= $root->item->addChild('weight',$aWeight);
        $child= $root->item->addChild('category',$aCategory);
        $child= $root->item->addChild('location',$aLocation);
        
        $this->mSroreHouseSxml->addChild($root->asXML());
        
        echo htmlentities($root->asXML());
        echo htmlentities($this->mSroreHouseSxml->asXML());
   
        }
}
 



?>
