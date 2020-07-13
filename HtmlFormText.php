<?php
/*
class : HtmlForm
author: yte
desc: : for textbox or input text
*/
class HtmlFormText extends HtmlFormInput
{
    private $initial_value;
    private $attributes;

  public function __construct ($name,$heading,$initial_value="",
                             $additional_attribute=array())
    {
        // Initialization of member vars
        if (!isSet($name) || !isSet($heading)) 
        {
        die("HtmlFormText constructor needs at least two arguments (name, title)");
        }
        $this->name = $name; // name defined in parent
        $this->heading = $heading; // defined in parent
        $this->initial_value = $initial_value;
        $this->attributes = $additional_attribute;
    }

  public function toString () {
        $return_string = "";
        $return_string .= "<input type='text' ";
        $return_string .= "name=\"$this->name\" ";
        $return_string .= "id=\"$this->name\" "; 
        $return_string .= "value=\"$this->initial_value\" ";
        foreach($this->attributes as $val => $key)
        $return_string .= "$key ";

        $return_string .= " />";
        return($return_string);
    }
}

?>