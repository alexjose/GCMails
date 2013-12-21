<?php
/* @var $this UserController */
/* @var $user User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary(array($user, $user->profile)); ?>

    <div class="row">
        <?php echo $form->labelEx($user, 'email'); ?>
        <?php echo $form->textField($user, 'email', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($user, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($user, 'password'); ?>
        <?php echo $form->passwordField($user, 'password', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($user, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($user->profile, 'firstName'); ?>
        <?php echo $form->textField($user->profile, 'firstName', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($user->profile, 'firstName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($user->profile, 'lastName'); ?>
        <?php echo $form->textField($user->profile, 'lastName', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($user->profile, 'lastName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($user->profile, 'countryID'); ?>
        <?php echo $form->dropDownList($user->profile, 'countryID', CHtml::listData(Country::model()->active()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($user->profile, 'countryID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($user->profile, 'timeZoneID'); ?>
        <?php echo $form->dropDownList($user->profile, 'timeZoneID', CHtml::listData(TimeZone::model()->active()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($user->profile, 'timeZoneID'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($user->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->