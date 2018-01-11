<?php
  /* @var $this \Cake\View\View */
?>

<h1 class="page-header">New Work Package Form</h1>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Please fill the form to add a new work package.</h3>
  </div>
  <div class="panel-body">
    <div class="workpackages form">
      <div class="col-md-6">
        <?php
        echo $this->Form->create($workPackage);
        echo $this->Form->input('number', ['label' => 'WP Number', 'placeholder' => 'e.g. 20000']);
        echo $this->Form->input('name', ['label' => 'WP Name', 'placeholder' => 'e.g. 20000-Civil Works']);
        ?>
      </div>
      <div class="col-md-6">
        <?php
        echo $this->Form->input('wp_coordinator', ['label' => 'WP Coordinator', 'placeholder' => 'e.g. John Smith']);
        echo $this->Form->input('wp_qs', ['label' => 'WP QS', 'placeholder' => 'e.g. Homer Simpson']);
        ?>
      </div>
      <div class="col-md-12 text-center">
        <div class="form-group">
          <?= $this->Form->button(__('Add New Work Package'), ['class' => 'btn btn-default']) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
