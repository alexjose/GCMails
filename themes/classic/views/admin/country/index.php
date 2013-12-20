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
        'id',
        'name',
        'status',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
