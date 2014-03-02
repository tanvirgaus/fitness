<div class="medicals view">
<h2><?php echo __('Medical'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medical['Medical']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($medical['Medical']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medical'), array('action' => 'edit', $medical['Medical']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medical'), array('action' => 'delete', $medical['Medical']['id']), null, __('Are you sure you want to delete # %s?', $medical['Medical']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medicals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medical'), array('action' => 'add')); ?> </li>
	</ul>
</div>
