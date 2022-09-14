<?php

?>


<?php
?>

<?php

use app\core\Controller;
use app\core\form\TextareaField ;

$this->title='Adjust Budget'
/**
 * @var $model \app\models\Budget
 */
?>
<div class="container-in">
    <h1>Budget</h1>
    <?php $form=\app\core\form\Form::begin('','post') ?>
    <?php echo $form->field($model, 'date')-> dateField()?>
    <?php echo new TextareaField($model, 'description')?>
    <?php echo $form->field($model, 'amount')?>

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo \app\core\form\Form::end(); ?>

</div>

