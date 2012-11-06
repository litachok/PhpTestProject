<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemClass
 * Item Class represent DB record ;
 * @author Bevzyuk
 */
class Item {
    
    protected $mName;
    protected $mWeight;
    public $mCategory;
    protected $mLocation;
    protected $mId;
    protected $mDomEl;
    protected $mIdAttr;
    protected $mDOMdoc;




    function __construct($inDOM) 
    {
        $this->mDOMdoc=$inDOM;
        $this->mName= new DOMElement('name',  '.');
        $this->mWeight= new DOMElement('weight',  0.0);
        $this->mCategory=new DOMElement('category','.');
        $this->mLocation=new DOMElement('location',  '.');
       
        //DOMElement
        $this->mDomEl=$inDOM->createElement('item');
        //Id Attr
        $this->mIdAttr= $inDOM->createAttribute('id');
        $this->mIdAttr->nodeValue='.';
        
        $this->newItem();
      
                
    }
    function getDomEl()
    {
       
        return $this->mDomEl;
    }
    function setItem($inId,$inName,$inWeight,$inCategory,$inLocation)
    {
        $this->mIdAttr->nodeValue=$inId;
        $this->mName->nodeValue=$inName;
        $this->mWeight->nodeValue=$inWeight;
        $this->mCategory->nodeValue=$inCategory;
        $this->mLocation->nodeValue=$inLocation;
    }
    function setDomEl($inDomEl)
    {
        $this->mDomEl=$inDomEl;   
    }
    function newItem()
    {    
        $this->mDomEl->setAttributeNode($this->mIdAttr);
        $this->mDomEl->appendChild($this->mName);
        $this->mDomEl->appendChild($this->mWeight);
        $this->mDomEl->appendChild($this->mCategory);
        $this->mDomEl->appendChild($this->mLocation);
    }
    
    function modDomEl($inId,$inName,$inWeight,$inCategory,$inLocation)
    {   
        
        
        $AttrNode=  $this->mDomEl->getAttributeNode('id');
        $AttrNode->nodeValue=$inId;
        
        $DomNodes=$this->mDomEl->childNodes;
         foreach ($DomNodes as $node)
	 {  
            if($node->nodeType != XML_TEXT_NODE)
                switch ($node->nodeName) 
                {                                                  
                    case 'name': 
                        $node->nodeValue=$inName;
                    break;
                    case 'weight':
                        $node->nodeValue=$inWeight;
                    break;
                    case 'category':
                        $node->nodeValue=$inCategory;
                    case 'location':
                        $node->nodeValue=$inLocation;
                    break;    
                 
                }              
	  	
               
        
     
         }
    }     
    function remove()
    {
        $root = $this->mDOMdoc->documentElement;    
        $root->removeChild($this->mDomEl);
    }


   
}

?>
