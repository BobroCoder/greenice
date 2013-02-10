<?php
echo CHtml::form('/products/create','post',array('style'=>'margin:0; padding:0;'));
echo CHtml::submitButton('Create New Product',array('style'=>'padding:7px;'));
echo CHtml::endForm();

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'showTableOnEmpty'=>true,
    'template'=>'{items}{pager}',
    'pager'=>array(
        'header'         => '&nbsp;',
        'firstPageLabel' => '',
        'prevPageLabel'  => '',
        'nextPageLabel'  => '',
        'lastPageLabel'  => '',
        'cssFile' => Yii::app()->getUrlManager()->getBaseUrl() . '/css/pager.css',
    ),
    'cssFile'=>Yii::app()->getUrlManager()->getBaseUrl() . '/css/gridview.css',
    'pagerCssClass'=>'gridpager',
    'selectableRows'=>0,
    'columns' => array(
        'id',
        'name',
        'price',
        'quantity',
        'created_at',
        array( 'name'=>'owner_id', 'type'=>'raw', 'value'=>'CHtml::link("Edit","/products/edit/?pid=$data->id")."  ". CHtml::link("Delete","/products/delete/?pid=$data->id",array("confirm" => "Really remove the product \"$data->name\"?"))'),
    ),
));
?>

<?php echo CHtml::link('All products','/products/all'); ?>