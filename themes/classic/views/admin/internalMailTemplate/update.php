<?php
/* @var $this InternalMailTemplateController */
/* @var $model InternalMailTemplate */

$this->breadcrumbs=array(
	'Internal Mail Templates'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InternalMailTemplate', 'url'=>array('index')),
	array('label'=>'Create InternalMailTemplate', 'url'=>array('create')),
	array('label'=>'View InternalMailTemplate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InternalMailTemplate', 'url'=>array('admin')),
);
?>

<h1>Update InternalMailTemplate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>