<?php

use app\core\Controller;
use app\core\form\TextareaField ;

$this->title='contact'
/**
 * @var $model \app\models\ContactForm
 */
?>
<div class="container">


<h1>Contact</h1>

    <?php $form=\app\core\form\Form::begin('','post') ?>
    <?php echo $form->field($model, 'subject')?>
    <?php echo $form->field($model, 'email')?>
    <?php echo new TextareaField($model, 'body')?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo \app\core\form\Form::end(); ?>
    <form method="post" action="">

</div>
