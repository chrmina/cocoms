<?php
/* @var $this \Cake\View\View */
$this->assign('title', 'CoCoMS: Home');
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

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">What is this?</h3>
    </div>
    <div class="panel-body">
      <p>
        CoCoMS is a simple Document Management System designed specifically for the management of correspondence generated during the execution of a construction project.
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">How to Use?</h3>
    </div>
    <div class="panel-body">
      <p>
        <b>Access is restricted to authorized registered users.</b>
      </p>
      <p>
        Please contact the system's administrator if you believe you should have access to CoCoMS.
      </p>
      <p>
         If you are an authorized registered user, please <?= $this->Html->link('LOGIN', '/login') ?>.
       </p>
    </div>
  </div>
</div>
