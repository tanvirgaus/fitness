<div class="medicalsUsers index">
	<h2><?php echo __('Medicals Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('medical_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($medicalsUsers as $medicalsUser): ?>
	<tr>
		<td><?php echo h($medicalsUser['MedicalsUser']['id']); ?>&nbsp;</td>
		<td><?php echo h($medicalsUser['MedicalsUser']['medical_id']); ?>&nbsp;</td>
		<td><?php echo h($medicalsUser['MedicalsUser']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($medicalsUser['MedicalsUser']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $medicalsUser['MedicalsUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $medicalsUser['MedicalsUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medicalsUser['MedicalsUser']['id']), null, __('Are you sure you want to delete # %s?', $medicalsUser['MedicalsUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Medicals User'), array('action' => 'add')); ?></li>
	</ul>
</div>
