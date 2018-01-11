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

<h1 class="page-header text-center">Password Change Form</h1>

<div class="col-md-3">
</div>
<div class="col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Password Change Form</h3>
    </div>
    <div class="panel-body">
      <div class="form">
        <?= $this->Flash->render('auth') ?>
        <?php
        echo $this->Form->create($user);
        ?>
        <fieldset>
          <legend>
            <?= __d('CakeDC/Users', 'Please fill the form to change the password.') ?>
          </legend>
          <?php if ($validatePassword) : ?>
            <?= $this->Form->control('current_password', [
              'type' => 'password',
              'required' => true,
              'label' => __d('CakeDC/Users', 'Current password')]);
            ?>
          <?php endif; ?>
          <?= $this->Form->control('password', [
            'type' => 'password',
            'required' => true,
            'label' => __d('CakeDC/Users', 'New password')]);
          ?>
          <?= $this->Form->control('password_confirm', [
            'type' => 'password',
            'required' => true,
            'label' => __d('CakeDC/Users', 'Confirm password')]);
          ?>
        </fieldset>
        <?= $this->Form->button(__d('CakeDC/Users', 'Submit'), ['class' => 'btn btn-default']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3">
</div>
