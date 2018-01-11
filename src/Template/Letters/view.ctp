<?php
/* @var $this \Cake\View\View */
?>

<h1 class="page-header">Letter Reference No. <?= h($letter->docref); ?></h1>

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <tr>
    <th><?= __('Subject') ?></th>
    <td><?= h($letter->subject) ?></td>
  </tr>
  <tr>
    <th><?= __('Data File') ?></th>
    <td><?= $letter->has('filelink') ? $this->Html->link($letter->filelink, DS. $letter->file_dir . $letter->filelink) : '' ?></td>
  </tr>
  <tr>
    <th><?= __('Sender') ?></th>
    <td><?= $letter->has('sender') ? $this->Html->link($letter->sender->name, ['controller' => 'Senders', 'action' => 'view', $letter->sender->id]) : '' ?></td>
  </tr>
  <tr>
    <th><?= __('Recipient') ?></th>
    <td><?= $letter->has('recipient') ? $this->Html->link($letter->recipient->name, ['controller' => 'Recipients', 'action' => 'view', $letter->recipient->id]) : '' ?></td>
  </tr>
  <tr>
    <th><?= __('Work Package') ?></th>
    <td><?= $letter->has('work_package') ? $this->Html->link($letter->work_package->name, ['controller' => 'WorkPackages', 'action' => 'view', $letter->work_package->id]) : '' ?></td>
  </tr>
  <tr>
    <th><?= __('Reference No. (Docref)') ?></th>
    <td><?= h($letter->docref) ?></td>
  </tr>
  <tr>
    <th><?= __('Letter Date') ?></th>
    <td><?= h($letter->docdate) ?></td>
  </tr>
  <tr>
    <th><?= __('Contents') ?></th>
    <td><?= h($letter->contents) ?></td>
  </tr>
  <tr>
    <th><?= __('References') ?></th>
    <td>
      <?php /*TO DO: Generate links to the respective letter from the tags*/ ?>
      <?php foreach ($letter->tags as $tag): ?>
      <?= h($tag->label) ?>
      <?php endforeach; ?>
    </td>
  </tr>
  <tr>
    <th><?= __('Confidential') ?></th>
    <td><?= $letter->confidential ? __('Yes') : __('No'); ?></td>
  </tr>
  <tr>
    <th><?= __('Reply Required') ?></th>
    <td><?= $letter->replyreq ? __('Yes') : __('No'); ?></td>
  </tr>
</table>
