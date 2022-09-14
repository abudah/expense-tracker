
<?php

use app\core\Controller;
use app\core\form\TextareaField ;

$this->title='addincome'
/**
 * @var $model \app\models\addIncomeForm
 */
?>
<div class="container-in">

    <h1>Add Income</h1>

    <?php $form=\app\core\form\Form::begin('','post') ?>

    <?php echo $form->field($model, 'title')?>
    <?php echo $form->field($model, 'amount')?>
    <?php echo new \app\core\form\SelectField($model, 'category')?>
    <?php echo $form->field($model, 'date')->dateField()?>
    <?php echo new TextareaField($model, 'note')?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo \app\core\form\Form::end(); ?>

</div>

