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
?>
<h1 class="page-header">New User Form</h1>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Please fill the form to add a new user.</h3>
  </div>
  <div class="panel-body">
    <div class="users form">
      <div class="col-md-6">
        <?php
        echo $this->Form->create(${$tableAlias});
        echo $this->Form->input('username', ['label' => __d('CakeDC/Users', 'Username')]);
        echo $this->Form->input('email', ['label' => __d('CakeDC/Users', 'E-Mail')]);
        echo $this->Form->input('password', ['label' => __d('CakeDC/Users', 'Password')]);
        echo $this->Form->input('active', ['type' => 'checkbox', 'label' => __d('CakeDC/Users', 'Active')]);
        ?>
      </div>
      <div class="col-md-6">
        <?php
        echo $this->Form->input('first_name', ['label' => __d('CakeDC/Users', 'First Name')]);
        echo $this->Form->input('last_name', ['label' => __d('CakeDC/Users', 'Last Name')]);
        echo $this->Form->input('role', [
            'type' => 'select',
            'label' =>  __d('CakeDC/Users', 'Role'),
            'options' => ['user' => 'user', 'editor' => 'editor', 'admin' => 'admin'],
            'default' => 'user'
        ]);
        ?>
      </div>
      <div class="col-md-12 text-center">
        <?= $this->Form->button(__d('CakeDC/Users', 'Add New User'), ['class' => 'btn btn-default']) ?>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
