<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs = array(
    'Countries' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Country', 'url' => array('index')),
    array('label' => 'Create Country', 'url' => array('create')),
);
?>

<h1>Manage Countries</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'country-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        array(
            'name' => 'userCount',
            'filter' => false,
        ),
        array(
            'name' => 'timeZoneID',
            'value' => '$data->timeZone->name',
            'filter' => CHtml::listData(TimeZone::model()->active()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'status',
            'value' => '$data->statusText',
            'filter' => Country::$statuses
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
