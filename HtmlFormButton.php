<?php
/*
class : HtmlButton
author: yte
desc: : for buttons
*/
class HtmlFormButton extends HtmlFormInput
{
    private $_value_array = array();   

    public function __construct ($value_array) {
        if (!isSet($value_array)) 
        {
          die("HtmlButton needs a minimum of two arguments: a name, and value array");
        }
        elseif (!is_array($value_array)) 
        {
          die("Third argument to HtmlButton() should be array with keys are values");
        }
        else 
        {
            // actual initialization 
            $this->_value_array = $value_array; 
        }
    }

     public function toString () {
        $return_string = "";
        $return_string .="<input ";
            foreach($this->_value_array as $key => $value){
                $return_string .= "$key='{$value}' ";
            } 
        $return_string .= "/>";
        return($return_string);
    }
}




?>