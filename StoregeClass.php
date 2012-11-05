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
 
        
    }
    
    //Save curent DOMDocument in to file
    function save()
    {
        $this->mStoreHouseDOM->save($mStoresrc);        
    }
    function getItemN($index,$xpQuery){
        
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
  
     function getItemDOM($index){
         
         $root= $this->mStoreHouseDOM->documentElement->getElementsByTagName("item");
         
         $item= $root->item($index)->childNodes;
         ////attr id='asdasdasdasd'
         $inId=$root->item($index)->getAttributeNode('id')->nodeValue;
         $this->mStoreItem->setId($inId);
         /*
                <name> </name>
		<weight> </weight>
		<category> </category>
		<location> </location>
         */
         foreach ($item as $node)
         {
            
                if ($node->nodeType == XML_ELEMENT_NODE)
                {
                     if ($node->nodeName == "name") 
                     {
                         $this->mStoreItem->setName($node->nodeValue);
                     }
                     elseif ($node->nodeName == "weight") 
                     {
                         $this->mStoreItem->setWeight($node->nodeValue);
                     }
                     elseif ($node->nodeName == "category") 
                     {
                         $this->mStoreItem->setCategory($node->nodeValue);
                     }
                    elseif ($node->nodeName == "location") 
                     {
                         $this->mStoreItem->setLocation($node->nodeValue);
                     }           
               }
         }     
     }
}


?>
