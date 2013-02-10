<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
        ),
)); ?>
<table id="regform_table">
    <tr>
        <td class="tdlabel"><?php echo $form->labelEx($model,'email'); ?>:</td>
        <td><?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?></td>
    </tr>		
    <tr>
        <td class="tdlabel"><?php echo $form->labelEx($model,'password'); ?>:</td>
        <td><?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?></td>
    </tr>
    <tr>
        <td class="tdlabel"><?php echo $form->labelEx($model,'repassword'); ?>:</td>
        <td><?php echo $form->passwordField($model,'repassword'); ?>
            <?php echo $form->error($model,'repassword'); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="hcenter"><?php echo CHtml::submitButton('Submit'); ?> </td>
    </tr>

		
		



		
		


		

</table>
<?php $this->endWidget(); ?>