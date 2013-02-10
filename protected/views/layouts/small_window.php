<?php $this->beginContent('/layouts/main'); ?>
<div id="swindow">
        <div id="stitle">
            <?php echo CHtml::encode($this->pageTitle); ?>
        </div>
        <div id="scontent">
			<?php echo $content; ?>
        </div>
</div>
<?php $this->endContent(); ?>