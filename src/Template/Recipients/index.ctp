<?php
/* @var $this \Cake\View\View */
?>

<h1 class="page-header">Recipients</h1>

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th><?= $this->Paginator->sort('name', 'Recipient Name') ?></th>
      <th><?= $this->Paginator->sort('address') ?></th>
      <th><?= $this->Paginator->sort('representative') ?></th>
      <th><?= $this->Paginator->sort('contact') ?></th>
      <th><?= $this->Paginator->sort('telephone') ?></th>
      <th><?= $this->Paginator->sort('mobile') ?></th>
      <th class="actions"><?= __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($recipients as $recipient): ?>
    <tr>
      <td><?= h($recipient->name) ?></td>
      <td><?= h($recipient->address) ?></td>
      <td><?= h($recipient->representative) ?></td>
      <td><?= h($recipient->contact) ?></td>
      <td><?= h($recipient->telephone) ?></td>
      <td><?= h($recipient->mobile) ?></td>
      <td class="actions">
        <?= $this->Html->link('', ['action' => 'view', $recipient->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
        <?php if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'editor'): ?>
        <?= $this->Html->link('', ['action' => 'edit', $recipient->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
        <?= $this->Form->postLink('', ['action' => 'delete', $recipient->id], ['confirm' => __('Are you sure you want to delete recipient: {0}?', $recipient->name), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
