<?php
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
        array( 'name'=>'owner_id', 'type'=>'raw',
   'value'=>'CHtml::mailto(CHtml::encode($data->owner->email))' ),
    ),
));
?>

<br />
<?php echo CHtml::link('My products','/products'); ?>