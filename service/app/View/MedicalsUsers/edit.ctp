<div class="medicalsUsers form">
<?php echo $this->Form->create('MedicalsUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Medicals User'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MedicalsUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MedicalsUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Medicals Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
