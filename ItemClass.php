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


    function __construct() {
        $this->mName=".";
        $this->mLocation=".";
        $this->mWeight=0.0;
        $this->mCategory=".";
        $this->mId=".";
    }
    function setId($inId){
        $this->mId=$inId;    
    }
    function getId(){
        return $this->mId;
    }


    function setName($sName)
    {        
        $this->mName=$sName;
    }
    function getName() 
    {
        return $this->mName;
    }
    function setWeight($fWeight)
    {
        $this->mWeight=$fWeight;
    }
    function getWeight()
    {
        return $this->mWeight;
    }
    function setCategory($sCategory)
    {
        $this->mCategory=$sCategory;
    }
    function getCategory()
    {
        return $this->mCategory;
    }
    function setLocation($enLocation)
    {
        $this->mLocation=$enLocation;
    }
    function getLocation()
    {
        return $this->mLocation;
    }
   
    function printItem(){
        
        print '<br/>'.$this->mId.'<br/>'.$this->mName.'<br/>'.$this->mWeight.'<br/>'.$this->mCategory.'<br/>'.$this->mLocation.'<br/>';
        
        
    }
    
}

?>
