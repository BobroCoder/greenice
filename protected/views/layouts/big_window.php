<?php $this->beginContent('/layouts/main'); ?>
<div id="bwindow">
        <div id="btitle">
            <span class="wtitle"><?php echo CHtml::encode($this->pageTitle); ?>. Logged in as <?php echo Yii::app()->user->getName(); ?></span>
            <span class="outlink"><?php echo CHtml::link('Logout', '/profile/logout') ?></span>
        </div>
        <div id="bcontent">
			<?php echo $content; ?>
        </div>
</div>
<?php $this->endContent(); ?>