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
      <h3 class="panel-title">Request Password Reset</h3>
    </div>
    <div class="panel-body">
      <div class="form">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create('User') ?>
        <fieldset>
          <legend>
            <?= __d('CakeDC/Users', 'Please enter your email') ?>
          </legend>
          <?= $this->Form->input('email', ['label' => 'Email', 'placeholder' => 'e.g. user@test.com']) ?>
        </fieldset>
        <?= $this->Form->button(__d('CakeDC/Users', 'Submit'), ['class' => 'btn btn-default']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
<div class="col-md-2">
</div>
