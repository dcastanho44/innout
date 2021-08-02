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

    public static function getOne($filters = [], $columns = '*') {
        $class = get_called_class(); 
        $result = static::getResultSetFromSelect($filters, $columns);

        return $result ? new $class ($result->fetch_assoc()) : null;
    }

    public static function get($filters = [], $columns = '*') {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if ($result) {
            $class = get_called_class(); 
            while($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    public static function getResultSetFromSelect($filters = [], $columns = '*') {
        $sql = "SELECT ${columns} FROM " . static::$tableName . static::getFilters($filters) ;      
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
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