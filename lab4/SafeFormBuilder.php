<?php

class SafeFormBuilder extends FormBuilder
{
    function __construct(string $target, string $submit, string $method = 'post')
    {
        parent::__construct($target, $submit, $method);
    }

    function addTextField(string $id, string $label, ?string $placeholder, ?string $value)
    {
        if (isset($_POST[$id])){
            $value=$_POST[$id];
        }
        elseif (isset($_GET[$id])){
            $value=$_GET[$id];
        }
        parent::addTextField($id, $label, $placeholder, $value);
    }

    function addSelectBox(string $id, $group, string $label)
    {
        foreach ($group as $key=>$value){
            if (isset($_POST[$id])){
                if (strcmp($key, $_POST[$id]) === 0){
                    $group[$key][1]=true;
                }
                else{
                    $group[$key][1]=false;
                }
            }
            elseif (isset($_GET[$id])){
                if (strcmp($key, $_GET[$id]) === 0){
                    $group[$key][1]=true;
                }
                else{
                    $group[$key][1]=false;
                }
            }
        }


        parent::addSelectBox($id, $group, $label);
    }

    public function addCheckBox($name, $group)
    {
        foreach ($group as $key=>$value){
            if (isset($_POST[$name])){
                for ($i=0; $i<count($_POST[$name]); $i++){
                    if (strcmp($key, $_POST[$name][$i]) === 0){
                        $group[$_POST[$name][$i]][1]=true;
                    }

                }
            }
            if (isset($_GET[$name])){
                for ($i=0; $i<count($_GET[$name]); $i++){
                    if (strcmp($key, $_GET[$name][$i]) === 0){
                        $group[$_GET[$name][$i]][1]=true;
                    }

                }
            }
        }


        parent::addCheckBox($name, $group);
    }

    public function addRadioGroup(string $name, $group)
    {
        foreach ($group as $key => $value){
            if (isset($_POST[$name])){
                if (strcmp($key, $_POST[$name]) === 0){
                    $group[$key][2]=true;
                }
                else{
                    $group[$key][2]=false;
                }
            }
            if (isset($_GET[$name])){
                if (strcmp($key, $_GET[$name]) === 0){
                    $group[$key][2]=true;
                }
                else{
                    $group[$key][2]=false;
                }
            }
        }
        parent::addRadioGroup($name, $group);
    }
}


