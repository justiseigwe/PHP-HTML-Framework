<?php
/*
class : HtmlForm
author: yte
desc: : implementing a html form framework to be used in major application development
*/
class HtmlForm{

    public $actionTarget; // path to receiving page
    private $inputForms; // array of HtmlFormInput
    private $hiddenVariables; // associative name/val  
    private $inputButtons;
    private $method_type;
    private $multipart = false, $enctype='', $headingBreakLine;

    /*
    Constructor
    */

    public function __construct($action_target, $method_type='post', $multipart = false, $headingBreakLine = false) 
    {
        $this->actionTarget    = $action_target;
        $this->method_type     = $method_type;
        $this->multipart       = $multipart;
        $this->inputForms      = array();
        $this->inputButtons    = array();
        $this->hiddenVariables = array();
        $this->headingBreakLine = $headingBreakLine;
        if($this->multipart)
         $this->enctype = "enctype='multipart/form-data'"; // for forms with uploading of docs/images etc
        
    }
 

    /*
    method: toString()
    desc: Returns the string output of the class
    */
    public function toString () 
    { 
        $return_string  = "";
        $return_string .="<form method=\"$this->method_type\" action=\"$this->actionTarget\" $this->enctype>\n";
        $return_string .= $this->inputFormsString();
        $return_string .= $this->hiddenVariablesString();
        $return_string .= "<br/>\n";
        $return_string .= $this->inputButtonString();
        $return_string .= "</form>";
        return($return_string);
    }

     
    /*
    method : addInputForm(inputs)
    desc   : Adds all the form input to the form
    */

    public function addInputForm ($input_form) 
    {
    if (!isSet($input_form) ||
        !is_object($input_form) ||
        !is_subclass_of($input_form,'htmlforminput'))
          {
            die("Argument to HtmlForm::addInputForm ".
                "must be instance of HtmlFormInput.".
                " Given argument is of class " . get_class($input_form));
          }
          else 
          {
            array_push($this->inputForms, $input_form);
          }
    } 

    /*
    method: addInputButton( button )
    desc:   Adds a button to the form
    */

    public function addInputButton ($input_button) 
    {
      if (!isSet($input_button) ||
          !is_object($input_button) ||
          !is_a($input_button, 'HtmlFormButton'))
            {
             die("Argument to HtmlForm::addInputButton must be instance of HtmlFormButton");
            }
            else 
            {
             array_push($this->inputButtons, $input_button);
            }
    }

    /*
    method: addHiddenVariable($name, $value)
    desc:  Adds a hidden form variable to the form
    */

    public function addHiddenVariable ($name, $value)
    {
        if (!isSet($value)) 
        {
          die("HtmlForm::addHiddenVariable requires two arguments (name and value)");
        }
        else
        {
          $this->hiddenVariables[$name] = $value;
        }
    }
    
    /* 
    method: inputFormString()
    desc:  Returns all the added form elements in string format
    */

    public function inputFormsString () 
    {
        $return_string = "";
        $form_array = $this->inputForms;
        foreach ($form_array as $input_form) 
            {
                $return_string .= "<strong>$input_form->heading</strong>";
                if ($this->headingElementBreak()) 
                {
                $return_string .= "<br/>";
                }
                $return_string .= $input_form->toString();
                $return_string .= "<br/>\n";
            }
        return($return_string);
        }

    /* 
    method: inputButtonString()
    desc:  Returns all the added buttons to the form in string format
    */

    public function inputButtonString () 
    {
        $button_array = $this->inputButtons; 
        $return_string = "";
            foreach ($button_array as $input_button) 
            { 
                $return_string .= $input_button->toString();
            } 
            return($return_string);
    }

    /* 
    method: hiddenVariableString()
    desc:  Returns all the added hidden variables
    */

    public function hiddenVariablesString () 
    {
        $return_string = "";
        while ($hidden_var = each($this->hiddenVariables)) 
        {
            $var_name = $hidden_var['key'];
            $var_value = $hidden_var['value'];
            $return_string .="<input type='hidden' ".
            "name='$var_name' ".
            "value='$var_value' />";
            $return_string .= "\n";
        }
        return($return_string);
        }

    /* 
    method: headingElementBreak()
    desc:  Returns a break or <br/> tag to the elements if enabled
    */

    public function headingElementBreak () 
    {
        // override to disable breaks after headings,
        // or to do more complicated layout

        return ($this->headingBreakLine == TRUE) ? TRUE : FALSE;
    }
    
}
?>