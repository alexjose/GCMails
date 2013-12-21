<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'profile-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'userID'); ?>
        <?php echo $form->textField($model, 'userID', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'userID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'firstName'); ?>
        <?php echo $form->textField($model, 'firstName', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'firstName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'lastName'); ?>
        <?php echo $form->textField($model, 'lastName', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'lastName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'timeZoneID'); ?>
        <?php echo $form->textField($model, 'timeZoneID'); ?>
        <?php echo $form->error($model, 'timeZoneID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countryID'); ?>
        <?php echo $form->textField($model, 'countryID'); ?>
        <?php echo $form->error($model, 'countryID'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->