<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->userID=>array('view','id'=>$model->userID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Profile', 'url'=>array('index')),
	array('label'=>'Create Profile', 'url'=>array('create')),
	array('label'=>'View Profile', 'url'=>array('view', 'id'=>$model->userID)),
	array('label'=>'Manage Profile', 'url'=>array('admin')),
);
?>

<h1>Update Profile <?php echo $model->userID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>