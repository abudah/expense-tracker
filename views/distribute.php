
<?php

use app\core\Controller;
use app\core\form\TextareaField ;

$this->title='addincome'
/**
 * @var $model \app\models\DistributeBudget
 */
?>
<?php
    $budget=new \app\models\Budget();
    $budget_id=0;
    $values=$budget->findAllData();
    $record = array_values($values);
        foreach ($record as $row) {
            $budget_id=$row['id'] ;
            $budget_amount=$row['amount'];
        }
?>


<div class="container-in">

    <h1>Distribute Budget</h1>
    <?php $form=\app\core\form\Form::begin('','post') ?>
    <label>Use Budget ID : <?php echo $budget_id ?></label><br>
    <label>Assigned Budget Amount : <?php echo $budget_amount ?></label>
    <input type="text" name="budget_amount" value="<?php echo $budget_amount ?>" hidden>
    <?php echo $form->field($model, 'budget_id')?>
    <?php echo $form->field($model, 'insurance')?>
    <?php echo $form->field($model, 'loan')?>
    <?php echo $form->field($model, 'rent')?>
    <?php echo $form->field($model, 'social')?>
    <?php echo $form->field($model, 'other')?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo \app\core\form\Form::end(); ?>

</div>

