<?php
/* @var $this \Cake\View\View */
?>

<h1 class="page-header">Sender Information</h1>
<h3>Sender Name: <?= h($sender->name); ?></h3>

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
  <tr>
    <td><?= __('Id') ?></td>
    <td><?= h($sender->id) ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td><?= __('Name') ?></td>
    <td><?= h($sender->name) ?></td>
  </tr>
  <tr>
    <td><?= __('Representative') ?></td>
    <td><?= h($sender->representative) ?></td>
  </tr>
  <tr>
    <td><?= __('Contact') ?></td>
    <td><?= h($sender->contact) ?></td>
  </tr>
  <tr>
    <td><?= __('Telephone') ?></td>
    <td><?= h($sender->telephone) ?></td>
  </tr>
  <tr>
    <td><?= __('Mobile') ?></td>
    <td><?= h($sender->mobile) ?></td>
  </tr>
  <tr>
    <td><?= __('Fax') ?></td>
    <td><?= h($sender->fax) ?></td>
  </tr>
  <tr>
    <td><?= __('Email') ?></td>
    <td><?= h($sender->email) ?></td>
  </tr>
  <tr>
    <td><?= __('Address') ?></td>
    <td><?= $this->Text->autoParagraph(h($sender->address)) ?></td>
  </tr>
  <tr>
    <td><?= __('Remarks') ?></td>
    <td><?= $this->Text->autoParagraph(h($sender->remarks)); ?></td>
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
  <p>No related letter exist in the database.</p>
<?php endif; ?>

<div class="paginator">
  <ul class="pagination">
    <?= $this->Paginator->prev('&laquo;', array('escape' => false)) ?>
    <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
    <?= $this->Paginator->next('&raquo;', array('escape' => false)) ?>
  </ul>
  <p>Showing Page <?= $this->Paginator->counter() ?></p>
</div>
