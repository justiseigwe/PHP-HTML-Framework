<html>
<head></head>
<body> 
<h3> A Simple HTML - PHP Framework Developed by Yte ( Justice Igwe ) </h3>
<p> This simple to use framework will help you work around your html forms and its elements easily.
<br/>
you do not need to know html coding, just learn how to use this my framework and you are good to go
</p>
<br/>
<?php 
include("HtmlForm.php");
include("HtmlFormInput.php");
include("HtmlFormSelect.php");
include("HtmlFormText.php");
include("HtmlFormTextArea.php");
include("HtmlFormButton.php");
include("HtmlFormCheckBox.php");
include("HtmlFormRadioButton.php");
include("HtmlFormLabel.php");

if(isset($_POST['submit'])){
    $fn = $_POST['firstname'];
    $ln = $_POST['lastname'];
    $age = $_POST['age'];
    $mind = $_POST['feedback'];

    echo 'Your form contains the following contents.
    
        <hr/>
        Firstname : '.$fn.'<br/>
        Lastname  : '.$ln.'<br/>
        Age       : '.$age.'<br/>
        Feedback  : '.$mind.'
        ';

    if($age < 0) echo 'Select a valid age';
}

//iniitialize form
$my_form = new HtmlForm($_SERVER['PHP_SELF'], 'post', false, true/* allows heading break lines */); 

$first_name_label = new HtmlFormLabel('firstname', 'First Name');//adding a label

$my_form->addInputForm( new HtmlFormText(
      "firstname", $first_name_label->toString() , '', 
      array("required", "class='form-control'", "placeholder='Firstname'"))
    );

$last_name_label = new HtmlFormLabel('lastname', 'Last Name');//adding a label

$my_form->addInputForm( new HtmlFormText(
    "lastname", $last_name_label->toString(), '', 
    array("required", "class='form-control'", "placeholder='Lastname'"))
);

$my_form->addInputForm(
        new HtmlFormSelect(
        "age",
        "Age",
        array( "" => "Select Age",
                0 => "0 - 9",
                1 => "10 - 19",
                2 => "20 - 29",
                3 => "Senior citizen"),
            -1, // selected index of the dropdown menu
            true // set to true/false make select box required / not required
            )
    );

$my_form->addInputForm(
        new HtmlFormTextArea(
        "feedback", //name 
        "What's on your mind?", //title / heading
        "", //initial value of textarea
        array('placeholder' => "[textarea text]", 'class'=>"form-control", 'required'=>true),
        5
        )
    );

//add a check box
$my_form->addInputForm(
     new HtmlFormCheckBox(
         'name_check',
         "Make a CheckBox selection",
         array('class' => "form-control", 'required'=>true)
     )
);

$my_form->addInputForm(
    new HtmlFormCheckBox(
        'name_check',
        "Make a CheckBox 2 selection",
        array('class' => "form-control", 'required'=>true)
    )
);

//add a radio button
$my_form->addInputForm(
    new HtmlFormRadioButton(
        'name_radio',
        "Make a Radio Button selection",
        array('class' => "form-control", 'required'=>true)
    )
);

//add a radio button
$my_form->addInputForm(
    new HtmlFormRadioButton(
        'name_radio',
        "Make a Radio Button 2 selection",
        array('class' => "form-control", 'required'=>true)
    )
);

//add hidden variable
$my_form->addHiddenVariable('token', 123456);
$my_form->addHiddenVariable('sand', 90299929);
$my_form->addHiddenVariable('pick', 12348773887387766);

//customise and add a button
$my_form->addInputButton( new HtmlFormButton( 
    array('type' =>'submit', 
          'name' =>'submit', 
          'value'=>'Send Data'
          )
        ) );


//display the entire form
print($my_form->toString());
?>

</body>
</html>