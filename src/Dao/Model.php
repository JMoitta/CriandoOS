<?php

require_once 'src/Dao/DataAccess.php';

class Model {
    
    public static $nameTable;
    
    private static function validateTable(){
        if(self::$nameTable == NULL){
            return array (
                "Error: null \$nameTable" => "A variavel \$nameTable não foi iniciada"
            );
        } else {
            return;
        }
    }
    
    private static function validateArray($array, $variableName){
        if(!is_array($array) AND $array !== NULL){
            return array (
                "Error: null \$$variableName" => "A variavel \$$variableName = $array não e um array e diferente de nulo"
            );
        } else {
            return;
        }
    }
    
    private static function validateArrayNotNull($array, $variableName){
        if(!is_array($array)){
            return array (
                "Error: null \$$variableName" => "A variavel \$$variableName = $array não e um array "
            );
        } else {
            return;
        }
    }
    
    public static function select ($field = null, $where = null) {
        
        $error[] = self::validateTable();
        $error[] = self::validateArray($field,"field");
        $error[] = self::validateArray($where,"where");
        foreach ($error as $value){
            if($value !== NULL){
                return $error;
            }
        }
        $f = "";
        $vTable = self::$nameTable;
        $w = "";
        if (is_array($field)){
            foreach ($field as $vField){
                $f .= $vField.", ";
            }
            $vField = substr($f, 0, strlen($f) -2);
        } else {
            $vField = "*";
        }
        if (is_array($where)){
            $w = " WHERE ";
            foreach ($where as $k => $v){
                $w .= $k."=:".$k." ";
            }
            $vWhere = substr($w, 0, strlen($w) -1);
        } else {
            $vWhere = "";
        }
        $sql = "SELECT {$vField} FROM {$vTable}{$vWhere}";
        $pdo = DataAccess::conectData();
        $query = $pdo->prepare($sql);
        if (is_array($where)){
            foreach ($where as $k =>$v){
                $query->bindValue(":$k", $v);
            }
        }
        try{
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            return $e->getCode().$e->getMessage();
        }
    }
    
    public static function insertInto ($values){
        $error[] = self::validateTable();
        $error[] = self::validateArrayNotNull($values,"values");
        foreach ($error as $value){
            if($value !== NULL){
                return $error;
            }
        }
        $vTable = "`".Config::$BDNAME."`.`".self::$nameTable."`";
        $f = "";
        $v = "";
        foreach ($values as $k => $valueK){
            $f .= "`".$k."`, ";
            $v .= "'".$valueK."', ";
        }
        $vFields = substr($f, 0, strlen($f) -2);
        $vValues = substr($v, 0, strlen($v) -2);
        $sql = "INSERT INTO {$vTable} ({$vFields}) VALUES ({$vValues})";
        $pdo = DataAccess::conectData();
        $query = $pdo->prepare($sql);
        try{
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            return $e->getCode().$e->getMessage();
        }
    }
    
    public static function update ($values, $wheres){
        $error[] = self::validateTable();
        $error[] = self::validateArrayNotNull($values,"values");
        $error[] = self::validateArrayNotNull($wheres,"wheres");
        foreach ($error as $value){
            if($value !== NULL){
                return $error;
            }
        }
        $vTable = "`".Config::$BDNAME."`.`".self::$nameTable."`";
        $v = "";
        $w = "";
        foreach ($values as $k => $valuesK){
            $v .= "`".$k."` = '".$valuesK."', ";
        }
        foreach ($wheres as $k => $valuesK){
            $w .= "`".self::$nameTable."`.`".$k."` = '".$valuesK."'";
        }
        $vValues = substr($v, 0, strlen($v) -2);
        $vWheres = $w;
        $sql = "UPDATE {$vTable} SET {$vValues} WHERE {$vWheres}";
        $pdo = DataAccess::conectData();
        $query = $pdo->prepare($sql);
        try{
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            return $e->getCode().$e->getMessage();
        }
    }
    
    public static function delete ($wheres){
        $error[] = self::validateTable();
        $error[] = self::validateArrayNotNull($wheres,"wheres");
        foreach ($error as $value){
            if($value !== NULL){
                return $error;
            }
        }
        $vTable = "`".Config::$BDNAME."`.`".self::$nameTable."`";
        $w = "";
        foreach ($wheres as $k => $valueK){
            $w .= "`".$k."` = '".$valueK."'";
        }
        $vWhere = $w;
        $sql = "DELETE FROM {$vTable} WHERE {$vWhere}";
        $pdo = DataAccess::conectData();
        $query = $pdo->prepare($sql);
        try{
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            return $e->getCode().$e->getMessage();
        }
    }
}