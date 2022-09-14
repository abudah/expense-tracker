<?php
$this->title='register'
?>
<div class="container">


<h1>Create an Account</h1>

    <?php $form =\app\core\form\Form::begin('','post')?>
        <?php echo $form->field($model,'firstname')  ?>
        <?php echo $form->field($model,'lastname')  ?>
        <?php echo $form->field($model,'email')  ?>
        <?php echo $form->field($model,'password')->passwordField()?>
        <?php echo $form->field($model,'confirmPassword')->passwordField()  ?>

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php \app\core\form\Form::end()?>
