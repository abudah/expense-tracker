<?php

namespace app\models;

use app\core\db\DbModel;


class addIncomeForm extends DbModel
{
    public function primaryKey(): string
    {
        return "id";
    }

    public string $title='';
    public string $amount='';
    public string $date='';
    public string $category='';
    public string $note='';

    public function tableName():string
    {
        return "income";
    }
    public function attributes():array
    {
        return ['title','amount','date','category','note'];
    }

    public function rules(): array
    {
        return [
            'title'=>[self::RULE_REQUIRED],
            'amount'=>[self::RULE_REQUIRED],
            'date'=>[self::RULE_REQUIRED],
            'category'=>[self::RULE_REQUIRED],
        ];
    }
    public function labels(): array
    {
        return [
            'title'=>'Title',
            'amount'=>'Amount',
            'date'=>'Date',
            'category'=>'Category',
            'note'=>"Note"
        ];
    }

    public function save()
    {
        return parent::save();
    }

}