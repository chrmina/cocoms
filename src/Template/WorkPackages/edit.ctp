<?php
  /* @var $this \Cake\View\View */
?>

<h1 class="page-header">Edit Work Package Form</h1>
<h3>Work Package Name: <?= h($workPackage->name); ?></h3>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Please edit the data in the form.</h3>
  </div>
  <div class="panel-body">
    <div class="workpackages form">
      <div class="col-md-6">
        <?php
        echo $this->Form->create($workPackage);
        echo $this->Form->input('number', ['label' => 'WP Number']);
        echo $this->Form->input('name', ['label' => 'WP Name']);
        ?>
      </div>
      <div class="col-md-6">
        <?php
        echo $this->Form->input('wp_coordinator', ['label' => 'WP Coordinator']);
        echo $this->Form->input('wp_qs', ['label' => 'WP QS']);
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
