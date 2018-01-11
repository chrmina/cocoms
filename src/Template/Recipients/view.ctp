<?php
/* @var $this \Cake\View\View */
?>

<h1 class="page-header">Recipient Information</h1>
<h3>Recipient Name: <?= h($recipient->name); ?></h3>
<table class="table table-striped" cellpadding="0" cellspacing="0">
  <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
  <tr>
    <th><?= __('Id') ?></th>
    <td><?= h($recipient->id) ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <th><?= __('Name') ?></th>
    <td><?= h($recipient->name) ?></td>
  </tr>
  <tr>
    <th><?= __('Representative') ?></th>
    <td><?= h($recipient->representative) ?></td>
  </tr>
  <tr>
    <th><?= __('Contact') ?></th>
    <td><?= h($recipient->contact) ?></td>
  </tr>
  <tr>
    <th><?= __('Telephone') ?></th>
    <td><?= h($recipient->telephone) ?></td>
  </tr>
  <tr>
    <th><?= __('Mobile') ?></th>
    <td><?= h($recipient->mobile) ?></td>
  </tr>
  <tr>
    <th><?= __('Fax') ?></th>
    <td><?= h($recipient->fax) ?></td>
  </tr>
  <tr>
    <th><?= __('Email') ?></th>
    <td><?= h($recipient->email) ?></td>
  </tr>
  <tr>
    <th><?= __('Address') ?></th>
    <td><?= h($recipient->address) ?></td>
  </tr>
  <tr>
    <th><?= __('Remarks') ?></th>
    <td><?= h($recipient->remarks) ?></td>
  </tr>
</table>

<hr />

<h3 class="subheader"><?= __('Related Letters') ?></h4>
<?php if (!empty($letters)): ?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
  <tr>
    <th><?= $this->Paginator->sort('subject') ?></th>
    <th><?= $this->Paginator->sort('filelink', 'Data File') ?></th>
    <th><?= $this->Paginator->sort('docref', 'Reference No.') ?></th>
    <th><?= $this->Paginator->sort('docdate', 'Letter Date') ?></th>
  </tr>
  <?php foreach ($letters as $letter): ?>
  <tr>
    <td><?= $this->Html->link($letter->subject, ['controller' => 'Letters', 'action' => 'view', $letter->id]) ?></td>
    <td><?= $letter->has('filelink') ? $this->Html->link($letter->filelink, DS. $letter->file_dir . $letter->filelink) : '' ?></td>
    <td><?= h($letter->docref) ?></td>
    <td><?= h($letter->docdate) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php else: ?>
  <p>No related letters exist in the database.</p>
<?php endif; ?>

<div class="paginator">
  <ul class="pagination">
    <?= $this->Paginator->prev('&laquo;', array('escape' => false)) ?>
    <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
    <?= $this->Paginator->next('&raquo;', array('escape' => false)) ?>
  </ul>
  <p>Showing Page <?= $this->Paginator->counter() ?></p>
</div>
