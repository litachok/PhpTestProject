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
        $this->mStoreItem= new Item();/// В конструктор
   }
    function open($xmlsrc, $schemasrc)
    {
        $this->mSchemasrc=$schemasrc;
        $this->mStoresrc=$xmlsrc;
                  
        $this->mStoreHouseDOM->load($xmlsrc); 
        $this->validate($schemasrc);
        ////////////////SimpleXML
        $this->mSroreHouseSxml=simplexml_load_file($xmlsrc);
 
        
    }
    
    //Save curent DOMDocument in to file
    function save()
    {
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
    function setItem($inId,$inName,$inWeight,$inCategory,$inLocation)
    {
   
        $this->mStoreItem->setId($inId);
        $this->mStoreItem->setName($inName);
        $this->mStoreItem->setWeight($inWeight);
        $this->mStoreItem->setCategory($inCategory);
        $this->mStoreItem->setLocation($inLocation);  
    }
    function setDomEl()
    {
                 ///attr
        $item=  $this->mStoreHouseDOM->createElement('item');
        $attr= $this->mStoreHouseDOM->createAttribute('id');
        $attr->nodeValue=  $this->mStoreItem->getId();
        $item->setAttributeNode($attr);
                //add Element
        $name= $item->appendChild(new DOMElement('name',  $this->mStoreItem->getName()));
        $weight= $item->appendChild(new DOMElement('weight',  $this->mStoreItem->getWeight()));
        $category=$item->appendChild(new DOMElement('category',  $this->mStoreItem->getCategory()));
        $location=$item->appendChild(new DOMElement('location',  $this->mStoreItem->getLocation()));

                ///append To DOM and save in to xml file
        $this->addItemToDOM($item);
        
        
        
        
     }
    //validate XML Schema check;
    function validate($schema)
    {  
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
    
    
    function printItem()
    {    
        $this->mStoreItem->printItem();
        
    }
       
     function addItemToDOM($inDomEl)
    {
       
            $root= $this->mStoreHouseDOM->documentElement;
          //add Attribute 
        
            $root->appendChild($inDomEl);
             
            //Save to file
            $this->mStoreHouseDOM->save("temp.xml");
          
     }


}


?>
