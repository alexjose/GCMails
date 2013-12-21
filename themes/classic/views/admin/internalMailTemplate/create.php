<?php
/* @var $this InternalMailTemplateController */
/* @var $model InternalMailTemplate */

$this->breadcrumbs=array(
	'Internal Mail Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InternalMailTemplate', 'url'=>array('index')),
	array('label'=>'Manage InternalMailTemplate', 'url'=>array('admin')),
);
?>

<h1>Create InternalMailTemplate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>