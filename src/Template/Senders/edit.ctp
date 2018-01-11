<?php
  /* @var $this \Cake\View\View */
?>

<h1 class="page-header">Edit Sender Form</h1>
<h3>Sender Name: <?= h($sender->name); ?></h3>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Please edit the data in the form.</h3>
  </div>
  <div class="panel-body">
    <div class="sender form">
      <div class="col-md-6">
        <?php
        echo $this->Form->create($sender);
        echo $this->Form->input('name');
        echo $this->Form->input('representative');
        echo $this->Form->input('contact');
        echo $this->Form->input('telephone');
        echo $this->Form->input('mobile');
        echo $this->Form->input('fax');
        echo $this->Form->input('email');
        ?>
      </div>
      <div class="col-md-6">
        <?php
        echo $this->Form->input('address', ['rows' => '8']);
        echo $this->Form->input('remarks', ['rows' => '10']);
        ?>
      </div>
      <div class="col-md-12 text-center">
        <div class="form-group">
          <?= $this->Form->button(__('Save Data'), ['class' => 'btn btn-default']) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
