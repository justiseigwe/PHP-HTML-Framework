<?php
/*
class : HtmlCheckBox
author: yte
desc: : for checkbox
*/
class HtmlFormCheckBox extends HtmlFormInput
{
    private $_value_array = array(); 

    public function __construct ($name, $heading,$value_array) {
         // Initialization of member vars 
       if (!isSet($name) /*|| !isSet($heading)*/) {
            die("HtmlFormCheckBox constructor needs at least two arguments (name, title)");
         }
        elseif (!isSet($value_array)) 
        {
          die("HtmlFormCheckBox needs a minimum of two arguments: a name, and value array");
        }
        elseif (!is_array($value_array)) 
        {
          die("Third argument to HtmlCheckBox() should be array with keys are values");
        }
        else 
        {
            // actual initialization 
            $this->name = $name; // name defined in parent
            $this->heading = $heading; // name defined in parent
            $this->_value_array = $value_array; 
        }
    }

     public function toString () {
        $return_string = "";
        $return_string .="<input type='checkbox' name=\"$this->name\" ";
        foreach($this->_value_array as $key => $value){
            $return_string .= "$key='{$value}' ";
        } 
        $return_string .="/>";
        return($return_string);
    }
}




?>