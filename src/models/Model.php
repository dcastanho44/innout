<?php

class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    function __construct($arr){    //array como parametro pra construtor
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr){
        if($arr) {                                     //se tiver algo no array
            foreach($arr as $key => $value){           
                $this-> $key = $value;                //set
            }
        }
    }

    public function __get($key){                   //get - método mágico
        return $this->values[$key];
    }

    public function __set($key, $value){         //set - método mágico
        $this->values[$key] = $value;
    }
}