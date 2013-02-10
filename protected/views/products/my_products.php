<?php
 echo CHtml::link('Create New Product','/products/create');

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
        array( 'name'=>'owner_id', 'type'=>'raw', 'value'=>'buttons' ),
    ),
));
?>

<?php echo CHtml::link('All products','/products/all'); ?>