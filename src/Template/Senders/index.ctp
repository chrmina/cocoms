<?php
/* @var $this \Cake\View\View */
?>

<h1 class="page-header">Senders</h1>

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th><?= $this->Paginator->sort('name', 'Sender Name'); ?></th>
      <th><?= $this->Paginator->sort('address'); ?></th>
      <th><?= $this->Paginator->sort('representative'); ?></th>
      <th><?= $this->Paginator->sort('contact'); ?></th>
      <th><?= $this->Paginator->sort('telephone'); ?></th>
      <th><?= $this->Paginator->sort('mobile'); ?></th>
      <th class="actions"><?= __('Actions'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($senders as $sender): ?>
    <tr>
      <td><?= h($sender->name) ?></td>
      <td><?= $this->Text->autoParagraph(h($sender->address)) ?></td>
      <td><?= h($sender->representative) ?></td>
      <td><?= h($sender->contact) ?></td>
      <td><?= h($sender->telephone) ?></td>
      <td><?= h($sender->mobile) ?></td>
      <td class="actions">
        <?= $this->Html->link('', ['action' => 'view', $sender->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
        <?php if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'editor'): ?>
        <?= $this->Html->link('', ['action' => 'edit', $sender->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
        <?= $this->Form->postLink('', ['action' => 'delete', $sender->id], ['confirm' => __('Are you sure you want to delete sender: {0}?', $sender->name), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="paginator">
  <ul class="pagination">
    <?= $this->Paginator->prev('&laquo;', array('escape' => false)) ?>
    <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
    <?= $this->Paginator->next('&raquo;', array('escape' => false)) ?>
  </ul>
  <p>Showing Page <?= $this->Paginator->counter() ?></p>
</div>
