<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com).
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
use Cake\Core\Configure;

//$this->extend('/Layout/TwitterBootstrap/signin');
?>

<!-- Top Logo -->
<?php
echo $this->Html->image('main.png', ['alt' => 'CoCoMS', 'class' => 'img-responsive center-block']);
?>
<h1 class="text-center">CoCoMS</h1>
<p class="text-center">
  Construction Correspondence Management System
</p>
<hr />

<div class="col-md-2">
</div>
<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Login Form</h3>
    </div>
    <div class="panel-body">
      <div class="users form">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>
        <fieldset>
          <legend><?= __d('CakeDC/Users', 'Please enter your username and password') ?></legend>
          <?= $this->Form->input('username', ['required' => true]) ?>
          <?= $this->Form->input('password', ['required' => true]) ?>
          <?php
          if (Configure::read('Users.reCaptcha.login')) {
            echo $this->User->addReCaptcha();
          }
          if (Configure::read('Users.RememberMe.active')) {
            echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
                'type' => 'checkbox',
                'label' => __d('CakeDC/Users', 'Remember me'),
                'checked' => 'checked',
            ]);
          }
          ?>
          <?php
          $registrationActive = Configure::read('Users.Registration.active');
          if ($registrationActive) {
            echo $this->Html->link(__d('CakeDC/Users', 'Register'), ['action' => 'register']);
          }
          if (Configure::read('Users.Email.required')) {
            if ($registrationActive) {
              echo ' | ';
            }
            echo $this->Html->link(__d('CakeDC/Users', 'Reset Password'), ['action' => 'requestResetPassword']);
          }
          ?>
        </fieldset>
        <?= implode(' ', $this->User->socialLoginList()); ?>
        <?= $this->Form->button(__d('CakeDC/Users', 'Login'), ['class' => 'btn btn-default']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
<div class="col-md-2">
</div>
