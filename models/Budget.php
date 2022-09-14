<?php

namespace app\models;

use app\core\db\DbModel;

class Budget extends DbModel
{
    public function primaryKey(): string
    {
        return "id";
    }

    public string $date='';
    public string $description='';
    public string $amount='';

    public function tableName():string
    {
        return "budget";
    }
    public function attributes():array
    {
        return ['date','description','amount'];
    }

    public function rules(): array
    {
        return [
            'date'=>[self::RULE_REQUIRED],
            'description'=>[self::RULE_REQUIRED],
            'amount'=>[self::RULE_REQUIRED],
        ];
    }
    public function labels(): array
    {
        return [
            'date'=>'Date of Adjustment',
            'description'=>'Description of the Budget',
            'amount'=>'Budget Amount',
        ];
    }

    public function save()
    {
        return parent::save();
    }

}