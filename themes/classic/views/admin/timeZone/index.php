<?php
/* @var $this TimeZoneController */
/* @var $model TimeZone */

$this->breadcrumbs = array(
    'Time Zones' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List TimeZone', 'url' => array('index')),
    array('label' => 'Create TimeZone', 'url' => array('create')),
);
?>

<h1>Manage Time Zones</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'time-zone-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        array(
            'name' => 'userCount',
            'filter' => false,
        ),
        array(
            'name' => 'countryCount',
            'filter' => false,
        ),
        array(
            'name' => 'status',
            'value' => '$data->statusText',
            'filter' => TimeZone::$statuses,
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
