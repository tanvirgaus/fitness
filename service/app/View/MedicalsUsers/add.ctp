<div class="medicalsUsers form">
<?php echo $this->Form->create('MedicalsUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Medicals User'); ?></legend>
	<?php
		echo $this->Form->input('medical_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Medicals Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
