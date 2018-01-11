<?php
  /* @var $this \Cake\View\View */
?>

<h1 class="page-header">Add Sender Form</h1>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Please fill the form to add a new sender.</h3>
  </div>
  <div class="panel-body">
    <div class="senders form">
      <div class="col-md-6">
        <?php
        echo $this->Form->create($sender);
        echo $this->Form->input('name', ['placeholder' => 'e.g. ACME Corporation']);
        echo $this->Form->input('representative', ['placeholder' => 'e.g. John Smith']);
        echo $this->Form->input('contact', ['placeholder' => 'e.g. Homer Simpson']);
        echo $this->Form->input('telephone', ['placeholder' => 'e.g. +81-03-5555-5555']);
        echo $this->Form->input('mobile', ['placeholder' => 'e.g. +81-90-5555-5555']);
        echo $this->Form->input('fax', ['placeholder' => 'e.g. +81-03-5555-5556']);
        echo $this->Form->input('email', ['placeholder' => 'e.g. john@test.com']);
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
          <?= $this->Form->button(__('Add New Sender'), ['class' => 'btn btn-default']) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
