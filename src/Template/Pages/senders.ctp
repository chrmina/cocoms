<?php
/* @var $this \Cake\View\View */
$this->assign('title', 'CoCoMS: About Senders');
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
        The List Senders menu item will allow you to view all the relevant data regarding the senders in the CoCoMS database. Depending on your user privileges, you can also add, edit or delete senders in the database. You can also export the data of all the senders to an Excel file.
      </p>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">List Senders</h3>
    </div>
    <div class="panel-body">
      <p>
        Here you can see data about all the senders stored in the database. Note that only users having Editor or Administrator privileges can edit or delete senders from the database.
      </p>
      <p>
        <u>Action Buttons</u>
        <br />
        <div class = 'glyphicon glyphicon-eye-open'></div> The eye button will enable you to see detailed information about a specific sender.
        <br />
        <div class = 'glyphicon glyphicon-pencil'></div> The pencil button will enable you to edit a specific sender.
        <br />
        <div class = 'glyphicon glyphicon-trash'></div> Trash button will enable you to delete a specific sender.
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Add Senders to the Database</h3>
    </div>
    <div class="panel-body">
      <p>
        Fill the form to add a sender in the database. Note that only users having Editor or Administrator privileges can add senders in the database.
      </p>
      <p>
        <u>Form Fields</u>
        <dl>
          <dt>Name</dt>
          <dd>Enter the name (e.g. company name) of the sender.</dd>
          <dt>Representative</dt>
          <dd>Enter the name of the representative of the sender.</dd>
          <dt>Contact</dt>
          <dd>Enter the name of the contact person of the sender's organization.</dd>
          <dt>Telephone</dt>
          <dd>Enter the telephone number of the sender.</dd>
          <dt>Mobile</dt>
          <dd>Enter the mobile telephone number of the sender.</dd>
          <dt>Fax</dt>
          <dd>Enter the FAX number of the sender.</dd>
          <dt>E-mail</dt>
          <dd>Enter the email address of the sender.</dd>
          <dt>Address</dt>
          <dd>Enter the address of the sender.</dd>
          <dt>Remarks</dt>
          <dd>Enter any remarks, notes or additional info about the sender.</dd>
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
        Clicking on this menu item will generate an Excel file that contains data about all the senders saved in the database.
      </p>
    </div>
  </div>
</div>
