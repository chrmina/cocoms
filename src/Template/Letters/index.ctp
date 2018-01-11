<?php
/* @var $this \Cake\View\View */
?>

<h1 class="page-header">Letters</h1>
<h3 class="subheader">Filter / Search Letters</h3>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Please select a sender, recipient, work package or enter keywords to filter the letters</h3>
  </div>
  <div class="panel-body">
    <div class="search form">
      <div class="col-md-6">
        <?php
        echo $this->Form->create();
        // You'll need to populate the variables in the template from your controller
        echo $this->Form->input('sender_id', ['empty' => 'Pick a Sender']);
        echo $this->Form->input('recipient_id', ['empty' => 'Pick a Recipient']);
        echo $this->Form->input('work_package_id', ['empty' => 'Pick a Work Package']);
        ?>
      </div>
      <div class="col-md-6">
        <?php
        // Match the search param in your table configuration
        echo $this->Form->input('q', ['label' => 'Search Query', 'type' => 'textarea', 'rows' => '7']);
        //echo $this->Form->button('Filter', ['type' => 'submit']);
        //echo $this->Form->end();
        ?>
      </div>
      <div class="col-md-12 text-center">
        <div class="form-group">
          <?= $this->Form->button(__('Filter / Search'), ['type' => 'submit', 'class' => 'btn btn-default']) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>

<hr />

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th><?= $this->Paginator->sort('subject') ?></th>
      <th><?= $this->Paginator->sort('filelink') ?></th>
      <th><?= $this->Paginator->sort('sender_id') ?></th>
      <th><?= $this->Paginator->sort('recipient_id') ?></th>
      <th><?= $this->Paginator->sort('work_package_id') ?></th>
      <th><?= $this->Paginator->sort('docref') ?></th>
      <th><?= $this->Paginator->sort('docdate') ?></th>
      <th><?= __('Contents') ?></th>
      <th class="actions"><?= __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($letters as $letter): ?>
    <tr>
      <td><?= h($letter->subject) ?></td>
      <td><?= $letter->has('filelink') ? $this->Html->link($letter->filelink, DS. $letter->file_dir . $letter->filelink) : '' ?></td>
      <td><?= $letter->has('sender') ? $this->Html->link($letter->sender->name, ['controller' => 'Senders', 'action' => 'view', $letter->sender->id]) : '' ?></td>
      <td><?= $letter->has('recipient') ? $this->Html->link($letter->recipient->name, ['controller' => 'Recipients', 'action' => 'view', $letter->recipient->id]) : '' ?></td>
      <td><?= $letter->has('work_package') ? $this->Html->link($letter->work_package->name, ['controller' => 'WorkPackages', 'action' => 'view', $letter->work_package->id]) : '' ?></td>
      <td><?= h($letter->docref) ?></td>
      <td><?= h($letter->docdate) ?></td>
      <td>
        <?php
          echo $this->Text->truncate($letter->contents, 100, ['ellipsis' => '...', 'exact' => false]);
        ?>
      </td>
      <td class="actions">
        <?= $this->Html->link('', ['action' => 'view', $letter->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
        <?php if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'editor'): ?>
        <?= $this->Html->link('', ['action' => 'edit', $letter->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
        <?= $this->Form->postLink('', ['action' => 'delete', $letter->id], ['confirm' => __('Are you sure you want to delete letter: {0}?', $letter->subject), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
