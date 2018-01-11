<?php
/* @var $this \Cake\View\View */
$this->assign('title', 'CoCoMS: Admin Menu');
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
      <h3 class="panel-title">General Info</h3>
    </div>
    <div class="panel-body">
      <p>
        The Admin Menu will allow you to manage all registered users of CoCoMS. Only administrators can add, edit or delete users in the database. Other user types can edit their profile data only.
      </p>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">List Users</h3>
    </div>
    <div class="panel-body">
      <p>
        Here you can see data about all the users stored in the database. Note that only users having Administrator privileges can edit or delete users from the database.
      </p>
      <p>
        <u>Action Buttons</u>
        <br />
        <div class = 'glyphicon glyphicon-eye-open'></div> The eye button will enable you to see detailed information about a specific user.
        <br />
        <div class = 'glyphicon glyphicon-lock'></div> The lock button will enable you to edit the password of a specific user.
        <br />
        <div class = 'glyphicon glyphicon-pencil'></div> The pencil button will enable you to edit a specific user.
        <br />
        <div class = 'glyphicon glyphicon-trash'></div> Trash button will enable you to delete a specific user.
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Add Users to the Database</h3>
    </div>
    <div class="panel-body">
      <p>
        Fill the form to add a user in the database. Note that only users having Administrator privileges can add users in the database.
      </p>
      <p>
        <u>Form Fields</u>
        <dl>
          <dt>Username</dt>
          <dd>Enter the username of the new user.</dd>
          <dt>E-Mail</dt>
          <dd>Enter the e-mail address of the new user.</dd>
          <dt>Password</dt>
          <dd>Enter the password of the new user.</dd>
          <dt>Active Checkbox</dt>
          <dd>Check the box to make the user active, i.e. enable the user to login and use CoCoMS.</dd>
          <dt>First Name</dt>
          <dd>Enter the first name / given name of the new user.</dd>
          <dt>Last Name</dt>
          <dd>Enter the last name / family name of the new user.</dd>
          <dt>Role</dt>
          <dd>Selected the role of the user, i.e. user, editor or administrator. Note that each role has different system privileges. Refer to <?= $this->Html->link('User Roles', ['controller' => 'Pages', 'action' => 'userroles', 'plugin' => false]) ?> for details regarding the user privileges for each role.</dd>
          <dt>Add New User Button</dt>
          <dd>Click on the button to save the user data in the database and create the new user.</dd>
        </dl>
      </p>
    </div>
  </div>
</div>
