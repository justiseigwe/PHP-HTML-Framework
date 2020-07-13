<?php
/*
class : HtmlFormLabel
author: yte
desc: : for labels
*/
class HtmlFormLabel extends HtmlFormInput
{ 

    public function __construct ($name, $heading) {
         // Initialization of member vars 
       if (!isSet($name) || !isSet($heading)) {
            die("HtmlFormLabel constructor needs at least two arguments (name, title)");
         }
          
        else 
        {
            // actual initialization 
            $this->name = $name; // name defined in parent
            $this->heading = $heading; // name defined in parent 
        }
    }

     public function toString () {
        $return_string = "";
        $return_string .="<label for=\"$this->name\"><strong>$this->heading</strong></label>";
        return($return_string);
    }
}




?>