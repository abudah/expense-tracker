<?php

namespace app\core\form;

class SelectFieldExpense extends BaseField
{
    public function renderInput(): string
    {
        return sprintf('<select name ="%s" class="form-control%s">
            <option value="Insurance">Insurance</option>
            <option value="Loan">Loan</option>
             <option value="Rent">Rent</option>
            <option value="Social">Social</option>
            <option value="Other">Other</option>
     </select>',


            $this->attribute,
            $this->model->hasError($this->attribute) ? 'is invalid' : '');
     }

}