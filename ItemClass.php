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
    protected $mCategory;
    protected $mLocation;
    protected $mId;
    protected $mDomEl;
    protected $mIdAttr;




    function __construct($inDOM) {
     
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
    function getDomEl(){
       
        return $this->mDomEl;
    }
    function setItem($inId,$inName,$inWeight,$inCategory,$inLocation){
        $this->mIdAttr->nodeValue=$inId;
        $this->mName->nodeValue=$inName;
        $this->mWeight->nodeValue=$inWeight;
        $this->mCategory->nodeValue=$inCategory;
        $this->mLocation->nodeValue=$inLocation;
    }
    
    function newItem(){
        
        $this->mDomEl->setAttributeNode($this->mIdAttr);
        $this->mDomEl->appendChild($this->mName);
        $this->mDomEl->appendChild($this->mWeight);
        $this->mDomEl->appendChild($this->mCategory);
        $this->mDomEl->appendChild($this->mLocation);
    }

    function remove($inDOM){
        
        
        
    }


   
}

?>
