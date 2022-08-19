<?php

class FormBuilder
{
    const METHOD_POST = "post";
    const METHOD_GET = "get";

    public $method;
    public $target;
    public $submit;
    public $type;

    public $id;
    public $label;
    public $value;
    public $placeholder;
    public $name;
    public $group;

    function __construct(string $target, string $submit, string $method = 'post') {
        $this->method = $method;
        $this->target = $target;
        $this->submit = $submit;
        echo '<form action="',$this->target,'" method="', $this->method, '">';
    }

    function addTextField(string $id, string $label, ?string $placeholder, ?string $value) {
        $this->type='text';
        $this->id = $id;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        echo '<label for="', $this->id, '">', $this->label, ' </label>';
        echo '<input id="', $this->id, '" name="', $this->id,'" placeholder="', $this->placeholder,'" value="', $this->value,'" />','<br>';

    }

    function addRadioGroup(string $name,  $group){
        $this->type = 'radio';
        $this->name = $name;
        $this->group = $group;

        foreach ($this->group as $key => $value){
            if ($value[2]){
                echo '<input type="', $this->type, '" id="', $value[0],'"  name="', $this->name, '" value="',$key,'" checked>';
            }
            else{
                echo '<input type="', $this->type, '" id="', $value[0],'"  name="', $this->name, '" value="',$key,'" />';
            }
            echo '<label for="', $value[0], '">', $value[1],'</label>','<br>';
        }
    }

    function addSelectBox(string $id, $group, string $label){
        $this->id = $id;
        $this->group = $group;
        $this->label = $label;
        echo '<label for="', $this->id, '">', $this->label, ' </label>';
        echo '<select id="', $this->id, '" name="', $this->id,'">';
        foreach ($this->group as $key => $value){
            if ($value[1]){
                echo '<option value="', $key, '" selected>', $value[0], '</option>';
            }
            else{
                echo '<option value="', $key, '" >', $value[0], '</option>';
            }
        }
        echo '</select>','<br>';

    }

    function addCheckBox($name, $group){
        $this->type = 'checkbox';
        $this->group = $group;
        foreach ($this->group as $key => $value){
            if ($value[1]){
                echo '<label for="', $key, '"><input id="', $key, '" name="',$name,'[]" type="', $this->type, '" value="',$key,'" checked> ', $value[0],'</label>';
            }
            else{
                echo '<label for="', $key, '"><input id="', $key, '" name="',$name,'[]" type="', $this->type, '" value="',$key,'"> ', $value[0],'</label>';
            }
        }
    }

    function getForm() {
        $this->type='submit';
        echo '<p>','<input type="', $this->type, '" value="', $this->submit, '" />','</p>';
        echo '</form>';
    }
}