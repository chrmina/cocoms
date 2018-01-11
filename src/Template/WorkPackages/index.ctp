<?php
/* @var $this \Cake\View\View */
?>

<h1 class="page-header">Work Packages</h1>

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th><?= $this->Paginator->sort('number', 'WP Number'); ?></th>
      <th><?= $this->Paginator->sort('name', 'WP Name'); ?></th>
      <th><?= $this->Paginator->sort('wp_coordinator', 'WP Coordinator'); ?></th>
      <th><?= $this->Paginator->sort('wp_qs', 'WP QS'); ?></th>
      <th class="actions"><?= __('Actions'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($workPackages as $workPackage): ?>
    <tr>
      <td><?= h($workPackage->number) ?></td>
      <td><?= h($workPackage->name) ?></td>
      <td><?= h($workPackage->wp_coordinator) ?></td>
      <td><?= h($workPackage->wp_qs) ?></td>
      <td class="actions">
        <?= $this->Html->link('', ['action' => 'view', $workPackage->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
        <?php if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'editor'): ?>
        <?= $this->Html->link('', ['action' => 'edit', $workPackage->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
        <?= $this->Form->postLink('', ['action' => 'delete', $workPackage->id], ['confirm' => __('Are you sure you want to delete WP: {0}?', $workPackage->name), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
