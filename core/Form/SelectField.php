<?php

namespace app\core\form;

class SelectField extends BaseField
{
    public function renderInput(): string
    {
         return sprintf('<select name ="%s" class="form-control%s">
            <option value="Sales">Sales</option>
            <option value="Credit">Credit</option>
            <option value="Other">Other</option>
     </select>',


            $this->attribute,
            $this->model->hasError($this->attribute) ? 'is invalid' : '');
     }

}