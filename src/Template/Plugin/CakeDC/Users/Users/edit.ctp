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
$Users = ${$tableAlias};
?>
<h1 class="page-header text-center">Edit User Information</h1>
<div class="col-md-2">
</div>
<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Edit User Form</h3>
    </div>
    <div class="panel-body">
      <div class="users form">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create($Users) ?>
        <fieldset>
          <legend><?= __d('CakeDC/Users', 'Please edit the user information below.') ?></legend>
          <?php
          echo $this->Form->input('username');
          echo $this->Form->input('email');
          echo $this->Form->input('first_name');
          echo $this->Form->input('last_name');
          if ($this->request->session()->read('Auth.User.role') == 'admin') {
            echo $this->Form->input('role', [
              'type' => 'select',
              'label' =>  __d('CakeDC/Users', 'Role'),
              'options' => ['user' => 'user', 'editor' => 'editor', 'admin' => 'admin'],
            ]);
            echo $this->Form->input('active');
          }
          ?>
        </fieldset>
        <?php
        echo $this->Form->button(__d('CakeDC/Users', 'Submit'), ['class' => 'btn btn-default']);
        echo $this->Form->end();
        ?>
      </div>
    </div>
  </div>
</div>
<div class="col-md-2">
</div>
