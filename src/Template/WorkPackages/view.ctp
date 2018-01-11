<?php
/* @var $this \Cake\View\View */
?>

<h1 class="page-header">Work Package Information</h1>
<h3>Work Package Name: <?= h($workPackage->name); ?></h3>

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
  <tr>
    <td><?= __('ID') ?></td>
    <td><?= h($workPackage->id) ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td><?= __('WP Number') ?></td>
    <td><?= h($workPackage->number) ?></td>
  </tr>
  <tr>
    <td><?= __('WP Name') ?></td>
    <td><?= h($workPackage->name) ?></td>
  </tr>
  <tr>
    <td><?= __('WP Coordinator') ?></td>
    <td><?= h($workPackage->wp_coordinator) ?></td>
  </tr>
  <tr>
    <td><?= __('WP QS') ?></td>
    <td><?= h($workPackage->wp_qs) ?></td>
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
    <th><?= $this->Paginator->sort('sender', 'Sender') ?></th>
    <th><?= $this->Paginator->sort('recipient', 'Recipient') ?></th>
  </tr>
  <?php foreach ($letters as $letter): ?>
  <tr>
    <td><?= $this->Html->link($letter->subject, ['controller' => 'Letters', 'action' => 'view', $letter->id]) ?></td>
    <td><?= $letter->has('filelink') ? $this->Html->link($letter->filelink, DS. $letter->file_dir . $letter->filelink) : '' ?></td>
    <td><?= h($letter->docref) ?></td>
    <td><?= h($letter->docdate) ?></td>
    <td><?= $this->Html->link($letter->sender->name, ['controller' => 'Senders', 'action' => 'view', $letter->sender->id]) ?></td>
    <td><?= $this->Html->link($letter->recipient->name, ['controller' => 'Recipients', 'action' => 'view', $letter->recipient->id]) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php else: ?>
  <p>No related letters exist in the database.</p>
<?php endif; ?>

<div class="paginator">
  <ul class="pagination">
    <?= $this->Paginator->first('&laquo;', array('escape' => false)); ?>
    <?= $this->Paginator->prev('<') ?>
    <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
    <?= $this->Paginator->next('>') ?>
    <?= $this->Paginator->last('&raquo;', array('escape' => false)); ?>
  </ul>
  <p>Showing Page <?= $this->Paginator->counter() ?></p>
</div>
