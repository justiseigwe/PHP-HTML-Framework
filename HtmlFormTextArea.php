<?php
/*
class : HtmlForm
author: yte
desc: : for textarea
*/
class HtmlFormTextArea extends HtmlFormInput {

    private $initial_value; 
    private $wrapType;
    private $attributes;

    public function __construct ($name, $heading,
    // optional args:
    $initial_value="",
    $additional_attribute=array(),
    $wrapType="virtual")
    {
        // Initialization of member vars 
        if (!isSet($name) || !isSet($heading)) {
           die("HtmlFormTextArea constructor needs at least two arguments (name, title)");
        }
        $this->name = $name; // name defined in parent
        $this->heading = $heading; // name defined in parent
        $this->initial_value = $initial_value;         
        $this->attributes = $additional_attribute;
        $this->wrapType = $wrapType;
    }

    public function toString ()
    {
        $return_string = "";
        $return_string .= "<textarea ";
        $return_string .= "name=\"$this->name\" "; 
        $return_string .= "id=\"$this->name\" "; 
        $return_string .= "wrap='$this->wrapType' ";
       // $return_string .= $this->additionalAttributes();
        foreach($this->attributes as $key => $value)
        $return_string .= "$key='{$value}' ";

        $return_string .= ">";
        $return_string .= $this->initial_value;
        $return_string .= "</textarea>";
        return($return_string);
    }

    public function additionalAttributes () {
    // OVERRIDE THIS to return a string with
    // TextArea attributes other than
    // NAME, ROWS, COLS, and WRAP
    return(TRUE);
    }
}
?>