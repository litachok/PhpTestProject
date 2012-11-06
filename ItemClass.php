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
    //return DOMElement  which Item represent
    function getDomEl()
    {
       
        return $this->mDomEl;
    }
    
    function multiSetItem()
    {
        if(func_num_args() == 1)///if input DOMElement
            {
               $args = func_get_args();
               $inDomEl = $args[0];        
               $this->mDomEl=$inDomEl;
               
               
               $inId = $inDomEl->getAttributeNode('id')->nodeValue ;
               $elNodes=$this->mDomEl->childNodes;
               foreach ($elNodes as $node)
                  {
                   switch ($node->nodeName) 
                   {
                       case 'name':
                           $inName=$node->nodeValue;

                           break;
                       case 'weight':
                           $inWeight=$node->nodeValue;

                           break;
                       case 'category':
                           $inCategory=$node->nodeValue;

                           break;
                       case 'location':
                           $inLocation=$node->nodeValue;

                           break;
                   }  
                 }
              
                          
         }elseif (func_num_args() == 5) // if list of properties value
             {
               $args = func_get_args();
               $inId = $args[0];
               $inName = $args[1];
               $inWeight = $args[2];
               $inCategory = $args[3];
               $inLocation = $args[4];                                      
             }
             
               $this->mIdAttr->nodeValue=$inId;
               $this->mName->nodeValue=$inName;
               $this->mWeight->nodeValue=$inWeight;
               $this->mCategory->nodeValue=$inCategory;
               $this->mLocation->nodeValue=$inLocation;  
             
             
    }
   
    // modifies the current Item (<Tag>,value); 
    function modItem($proper,$value)
    {
        
        if($proper=='id'){
            $AttrNode=$this->mDomEl->getAttributeNode('id');
            $AttrNode->nodeValue=$value;
        }
        
        $elNodes=$this->mDomEl->childNodes;
        switch ($proper) {            
            case 'name':
            foreach ($elNodes as $node)
                if($node->nodeName=='name')
                    $node->nodeValue=$value;
                break;
            case 'weight':
             foreach ($elNodes as $node)
                if($node->nodeName=='weight')
                    $node->nodeValue=$value;

                break;
            case 'category':
            foreach ($elNodes as $node)
                if($node->nodeName=='category')
                    $node->nodeValue=$value;

                break;
            case 'location':
            foreach ($elNodes as $node)
                if($node->nodeName=='location'){
                    $node->nodeValue=$value;
                     
                }
                break;
            default:
                break;
      }
    }
    
   
    //remove curent
    function remove()
    {
        $root = $this->mDOMdoc->documentElement;    
        $root->removeChild($this->mDomEl);
    }

    
    protected function newItem()
    {    
        $this->mDomEl->setAttributeNode($this->mIdAttr);
        $this->mDomEl->appendChild($this->mName);
        $this->mDomEl->appendChild($this->mWeight);
        $this->mDomEl->appendChild($this->mCategory);
        $this->mDomEl->appendChild($this->mLocation);
    }
    

   
}


?>
