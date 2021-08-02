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

    public static function getSelect($filters = [], $columns = '*') {
        $sql = "SELECT ${columns} FROM " . static::$tableName . static::getFilters($filters) ;      
        return $sql;
    }

    private static function getFilters($filters) {
        $sql = '';
        if (count($filters) > 0){
            $sql .= "WHERE 1 = 1";
            foreach($filters as $column => $value){
                $sql .= "AND ${column} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    private static function getFormatedValue($value){
        if (is_null($value)) {
            return "null";
        } else if (gettype($value) == 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }
}