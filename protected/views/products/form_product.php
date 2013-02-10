<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
        ),
)); 

?>
<table id="regform_table">
    <tr>
        <td class="tdlabel"><?php echo $form->labelEx($model,'name'); ?>:</td>
        <td><?php echo $form->textField($model,'name'); ?>
            <?php echo $form->error($model,'name'); ?></td>
    </tr>		
    <tr>
        <td class="tdlabel"><?php echo $form->labelEx($model,'price'); ?>:</td>
        <td><?php echo $form->textField($model,'price'); ?>
            <?php echo $form->error($model,'price'); ?></td>
    </tr>
    <tr>
        <td class="tdlabel"><?php echo $form->labelEx($model,'quantity'); ?>:</td>
        <td><?php echo $form->textField($model,'quantity'); ?>
            <?php echo $form->error($model,'quantity'); ?></td>
    </tr>
    <tr>
        <?php echo $form->hiddenField($model,'id'); ?>
        <td colspan="2" class="hcenter"><?php echo CHtml::submitButton('Submit'); ?> </td>
    </tr>
    
</table>
<?php $this->endWidget(); ?>
