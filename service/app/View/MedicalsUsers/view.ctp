<div class="medicalsUsers view">
<h2><?php echo __('Medicals User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medicalsUser['MedicalsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medical Id'); ?></dt>
		<dd>
			<?php echo h($medicalsUser['MedicalsUser']['medical_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($medicalsUser['MedicalsUser']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($medicalsUser['MedicalsUser']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medicals User'), array('action' => 'edit', $medicalsUser['MedicalsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medicals User'), array('action' => 'delete', $medicalsUser['MedicalsUser']['id']), null, __('Are you sure you want to delete # %s?', $medicalsUser['MedicalsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medicals Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medicals User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
