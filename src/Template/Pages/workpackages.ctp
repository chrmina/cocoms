<?php
/* @var $this \Cake\View\View */
$this->assign('title', 'CoCoMS: About Work Packages');
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
        The List Work Packages menu item will allow you to view all the relevant data regarding the work packages in the CoCoMS database. Depending on your user privileges, you can also add, edit or delete work packages in the database. You can also export the data of all the work packages to an Excel file.
      </p>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">List Work Packages</h3>
    </div>
    <div class="panel-body">
      <p>
        Here you can see data about all the work packages stored in the database. Note that only users having Editor or Administrator privileges can edit or delete work packages from the database.
      </p>
      <p>
        <u>Action Buttons</u>
        <br />
        <div class = 'glyphicon glyphicon-eye-open'></div> The eye button will enable you to see detailed information about a specific work package.
        <br />
        <div class = 'glyphicon glyphicon-pencil'></div> The pencil button will enable you to edit a specific work package.
        <br />
        <div class = 'glyphicon glyphicon-trash'></div> The trash button will enable you to delete a specific work package.
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Add Work Packages to the Database</h3>
    </div>
    <div class="panel-body">
      <p>
        Fill the form to add a work package in the database. Note that only users having Editor or Administrator privileges can add work packages in the database.
      </p>
      <p>
        <u>Form Fields</u>
        <dl>
          <dt>WP Number</dt>
          <dd>Enter the work package number (e.g. 20000).</dd>
          <dt>WP Name</dt>
          <dd>Enter the name of the work package (e.g. 20000-Civil).</dd>
          <dt>WP Coordinator</dt>
          <dd>Enter the name of the person / manager in charge of the work package.</dd>
          <dt>WP QS</dt>
          <dd>Enter the name of the QS (Quantity Surveyor) in charge of the work package.</dd>
        </dl>
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Create Excel File</h3>
    </div>
    <div class="panel-body">
      <p>
        Clicking on this menu item will generate an Excel file that contains data about all the work packages saved in the database.
      </p>
    </div>
  </div>
</div>
