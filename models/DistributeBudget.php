<?php

namespace app\models;

use app\core\db\DbModel;

class DistributeBudget extends DbModel
{
    public function primaryKey(): string
    {
        return "id";
    }

    public string $budget_id='';
    public string $loan='';
    public string $insurance='';
    public string $social='';
    public string $rent='';
    public string $other='';

    public function tableName():string
    {
        return "distribute_budget";
    }
    public function attributes():array
    {
        return ['budget_id','loan','insurance','social','rent','other'];
    }

    public function rules(): array
    {
        return [

        ];
    }
    public function labels(): array
    {
        return [
            'budget_id'=>'Budget ID',
            'loan'=>'Loan',
            'insurance'=>'Insurance',
            'social'=>'Social',
            'rent'=>'Rent',
            'other'=>'Other',
        ];
    }

    public function save()
    {
        return parent::save();
    }

    public function check(array $getBody)
    {
        $amount=$getBody['budget_amount'];
        $loan=$getBody['loan'];
        $insurance=$getBody['insurance'];
        $social=$getBody['social'];
        $rent=$getBody['rent'];
        $other=$getBody['other'];
        $total=$loan+$insurance+$social+$rent+$other;
        if($total<$amount){
            return true;
        }else{
            $this->addError('loan', 'You have assigned over Budget');
            $this->addError('insurance', 'You have assigned over Budget');
            $this->addError('social', 'You have assigned over Budget');
            $this->addError('rent', 'You have assigned over Budget');
            $this->addError('other', 'You have assigned over Budget');
            return false;
        }


    }


}