<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List User', 'url' => array('index')),
    array('label' => 'Create User', 'url' => array('create')),
);
?>

<h1>Manage Users</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'fullName',
        'user.email',
        array(
            'name' => 'countryID',
            'value' => '$data->country->name',
            'filter' => CHtml::ListData(Country::model()->active()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'timeZoneID',
            'value' => '$data->timeZone->name',
            'filter' => CHtml::ListData(TimeZone::model()->active()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'user.status',
            'value' => '$data->user->statusText',
            'filter' => User::$statuses
        ),
        'user.createdAt',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
