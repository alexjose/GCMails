<?php
/* @var $this TimeZoneController */
/* @var $model TimeZone */

$this->breadcrumbs=array(
	'Time Zones'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TimeZone', 'url'=>array('index')),
	array('label'=>'Create TimeZone', 'url'=>array('create')),
);

?>

<h1>Manage Time Zones</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'time-zone-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
