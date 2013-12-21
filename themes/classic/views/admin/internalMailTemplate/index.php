<?php
/* @var $this InternalMailTemplateController */
/* @var $model InternalMailTemplate */

$this->breadcrumbs = array(
    'Internal Mail Templates' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List InternalMailTemplate', 'url' => array('index')),
    array('label' => 'Create InternalMailTemplate', 'url' => array('create')),
);
?>

<h1>Manage Internal Mail Templates</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'internal-mail-template-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        'statusText::Status',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
