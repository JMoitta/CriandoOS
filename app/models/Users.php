<?php



class Users extends ActiveRecord\Model {

}
/*
require_once 'src/Dao/Model.php';


class Users extends Model{
    
    private static function initNameTable(){
        if (self::$nameTable === null){
            self::$nameTable = strtolower(__CLASS__);
        }
    }
    public static function consulta(){
        self::initNameTable();
        
        $field = array (
            "email",
            "pass"
        );
        $where = array (
            "nivel" => 0
        );
        //$field = "marco";
        //$where = "nao sei";
        return self::select();
    }
    public static function cadastrar () {
        self::initNameTable();
        $values = array(
            "email" => "delubio@gmail.com",
            "pass" => "12344"
        );
        return self::insertInto($values);
    }
    
    public static function atualizar () {
        self::initNameTable();
        $values = array (
            "email" => "1lorde.gamer@gmail.com.br",
            "pass" => "123abc"
        );
        $wheres = array (
            "id" => 1
        );
        return self::update($values, $wheres);
    }
    
    public static function deletar ($wheres) {
        self::initNameTable();
        self::delete($wheres);
        
    }    
}
 *
 */