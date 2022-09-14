<?php

namespace app\core\db;

use app\core\Application;
use app\core\Model;

abstract class DbModel extends Model
{
    abstract public function tableName():string;
    abstract public function attributes():array;
    abstract public function primaryKey():string;


    //insert one into database

    public function save()
    {
        $tableName=$this->tableName();
        $attributes=$this->attributes();

        $params=array_map(fn($attr)=> ":$attr",$attributes);
        $statement=self::prepare("INSERT INTO $tableName (".implode(',',$attributes).")
                        VALUES(".implode(',',$params).")");
        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    //find one from the database

    public function findOne($where)
    {
        $tableName= static::tableName();
        $attributes=array_keys($where);
        $sql=implode("AND",array_map(fn($attr)=> "$attr=:$attr",$attributes));
        $statement=self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key =>$item){
            $statement->bindValue(":$key",$item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    //delete one item from database

    public function deleteOne($id)
    {
        $tableName= static::tableName();
        $statement=self::prepare("UPDATE $tableName SET deleted=1 WHERE id=$id");
        $statement->execute();
        return true;
    }

    //select all from the database

    public function findAllData()
    {
        $tableName= static::tableName();
        $statement=Application::$app->db->pdo->prepare("SELECT * FROM $tableName where deleted=0");
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}