<?php
/* @var $this TimeZoneController */
/* @var $model TimeZone */

$this->breadcrumbs = array(
    'Time Zones' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List TimeZone', 'url' => array('index')),
    array('label' => 'Create TimeZone', 'url' => array('create')),
    array('label' => 'Update TimeZone', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete TimeZone', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage TimeZone', 'url' => array('admin')),
);
?>

<h1>View TimeZone #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'name',
        'userCount:number:User Count',
        'countryCount:number:Country Count',
        'statusText:text:Status',
    ),
));
?>


<h2>Countries</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'country-grid',
    'dataProvider' => $country->search(),
    'filter' => $country,
    'columns' => array(
        'name',
        array(
            'name' => 'userCount',
            'filter' => false,
        ),
        array(
            'name' => 'status',
            'value' => '$data->statusText',
            'filter' => Country::$statuses
        ),
        array(
            'class' => 'CButtonColumn',
            'viewButtonUrl' => 'array("/admin/country/view", "id" => $data->id)',
            'updateButtonUrl' => 'array("/admin/country/update", "id" => $data->id)',
            'deleteButtonUrl' => 'array("/admin/country/delete", "id" => $data->id)'
        ),
    ),
));
?>

<h2>Users</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $profile->search(),
    'filter' => $profile,
    'columns' => array(
        'fullName',
        'user.email',
        'user.statusText:text:Status',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>