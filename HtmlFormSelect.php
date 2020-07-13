<?php
/*
class : HtmlForm
author: yte
desc: : for select
*/
class HtmlFormSelect extends HtmlFormInput
{
    private $_value_array = array();
    private $_selected_value, $required_value;
    private $required = '';

    public function __construct ($name, $heading,
    $value_array,
    $selected_value=NULL, $required_value = false) {
        if (!isSet($value_array)) 
        {
          die("HtmlFormSelect needs a minimum of two arguments: a name, and value array");
        }
        elseif (!is_array($value_array)) 
        {
          die("Third argument to HtmlFormSelect() should be array where keys are values ".
              "submitted, and values are display values");
        }
        else 
        {
            // actual initialization
            $this->name = $name;
            $this->heading = $heading;
            $this->_value_array = $value_array;
            $this->_selected_value = $selected_value;
            $this->required_value = $required_value;
            
            if($this->required_value)
             $this->required = 'required';
        }
    }

    public function toString () {
        $return_string = "";
        $return_string .="<select name=\"$this->name\" id=\"$this->name\" $this->required>";
            while ($var_entry = each($this->_value_array)) 
            {
                $submit_value = $var_entry['key'];
                $display_value = $var_entry['value'];
               if ($submit_value == $this->_selected_value) 
                {
                $return_string .= "<option value='${submit_value}' selected >";
                }
                else 
                {
                    $return_string .= "<option value='${submit_value}'>";
                }
                $return_string .= $display_value. "</option>";
            } 
        $return_string .= "</select>";
        return($return_string);
    }
}




?>