<?php 

require_once ('inputClass.php');

class select extends checkboxClass {
    public function __construct($name, $parameters, $formName) {
        parent::__construct($name, $parameters, $formName);
        $this->multiple = ((isset($parameters['multiple'])) && ($parameters['multiple'] === true)) ? true : false;
    }

    public function __toString() {
        $options = '';
        foreach($this->optionList as $index => $option) {
            $selected = (in_array($index, $this->value)) ? ' selected' : '';
            $options .= "<option value=\"$index\"$selected>$option</option>";
        }

        $multiple = ($this->multiple) ? ' multiple' : '';
        $classes = $this->getClasses();
        return "<p id=\"$this->formName-$this->name\" class=\"$classes\"><label><span class=\"label\">$this->label</span><select$multiple name=\"$this->name[]\">$options</select></label></p>";
    }
}