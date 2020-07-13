<?php
/*
class : HtmlFormInput
author: yte
desc: : Abstract class to be inherited by all the other classes
*/
abstract class HtmlFormInput {
    public $name; // The variable name for form submission
    public $heading; // The visible label on form

    public function __construct() {
    die("Class HtmlFormInput intended only to be subclassed");
    }

    public function toString () 
    {
    die("Subclass of HtmlFormInput missing  definition of toString()");
    }

}
?>