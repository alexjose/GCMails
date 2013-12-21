<?php
/* @var $this InternalMailTemplateController */
/* @var $model InternalMailTemplate */

$this->breadcrumbs = array(
    'Internal Mail Templates' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List InternalMailTemplate', 'url' => array('index')),
    array('label' => 'Create InternalMailTemplate', 'url' => array('create')),
    array('label' => 'Update InternalMailTemplate', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete InternalMailTemplate', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage InternalMailTemplate', 'url' => array('admin')),
);
?>

<h1>View Mail Template <?php echo $model->name; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'template:html',
    ),
));
?>
