<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

 //$this->extend('/Layout/TwitterBootstrap/dash');
?>
<h1 class="page-header">Users List</h1>

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th><?= $this->Paginator->sort('username') ?></th>
      <th><?= $this->Paginator->sort('email') ?></th>
      <th><?= $this->Paginator->sort('first_name') ?></th>
      <th><?= $this->Paginator->sort('last_name') ?></th>
      <th><?= $this->Paginator->sort('role') ?></th>
      <th><?= $this->Paginator->sort('active') ?></th>
      <th class="actions"><?= __d('CakeDC/Users', 'Actions') ?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach (${$tableAlias} as $user) : ?>
    <tr>
      <td><?= h($user->username) ?></td>
      <td><?= h($user->email) ?></td>
      <td><?= h($user->first_name) ?></td>
      <td><?= h($user->last_name) ?></td>
      <td><?= h($user->role) ?></td>
      <td><?= $user->active ? __('Yes') : __('No'); ?></td>
      <td class="actions">
        <?= $this->Html->link(__d('CakeDC/Users', ''), ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
        <?= $this->Html->link(__d('CakeDC/Users', ''), ['action' => 'changePassword', $user->id], ['title' => __('Change Password'), 'class' => 'btn btn-default glyphicon glyphicon-lock']) ?>
        <?= $this->Html->link(__d('CakeDC/Users', ''), ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
        <?= $this->Form->postLink(__d('CakeDC/Users', ''), ['action' => 'delete', $user->id], ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete # {0}?', $user->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<div class="paginator">
  <ul class="pagination">
    <?= $this->Paginator->prev('< ' . __d('CakeDC/Users', 'previous')) ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next(__d('CakeDC/Users', 'next') . ' >') ?>
  </ul>
  <p><?= $this->Paginator->counter() ?></p>
</div>
