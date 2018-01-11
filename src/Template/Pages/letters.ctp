<?php
/* @var $this \Cake\View\View */
$this->assign('title', 'CoCoMS: About Letters');
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
        The List Letters menu item will allow you to view all the relevant data regarding a letter in the CoCoMS database. Depending on your user privileges, you can also add, edit or delete letters in the database. You can also export the data of all the letters to an Excel file.
      </p>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">List Letters</h3>
    </div>
    <div class="panel-body">
      <p>
        Here you can see data about all the letters stored in the database. You can also filter the letter data by sender, recipient and work package. Alternatively you can search for specific keywords. Note that only users having Editor or Administrator privileges can edit or delete letters from the database.
      </p>
      <p>
        <u>Action Buttons</u>
        <br />
        <div class = 'glyphicon glyphicon-eye-open'></div> The eye button will enable you to see detailed information about a specific letter.
        <br />
        <div class = 'glyphicon glyphicon-pencil'></div> The pencil button will enable you to edit a specific letter.
        <br />
        <div class = 'glyphicon glyphicon-trash'></div> Trash button will enable you to delete a specific letter.
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Add Letters to the Database</h3>
    </div>
    <div class="panel-body">
      <p>
        Fill the form to add a letter in the database. Note that only users having Editor or Administrator privileges can add letters in the database.
      </p>
      <p>
        <u>Form Fields</u>
        <dl>
          <dt>Subject</dt>
          <dd>Enter the subject / title of the letter.</dd>
          <dt>Data File</dt>
          <dd>Click on the button to add and save the file (e.g. PDF) associated with the letter in the database. Refer to <?= $this->Html->link('Letter Naming', ['controller' => 'Pages', 'action' => 'letternaming', 'plugin' => false]) ?> for details regarding the file naming convention.</dd>
          <dt>Sender</dt>
          <dd>Select the sender of the letter from the drop-down menu.</dd>
          <dt>Recipient</dt>
          <dd>Select the recipient of the letter from the drop-down menu.</dd>
          <dt>Work Package</dt>
          <dd>Select the work package associated with the letter from the drop-down menu.</dd>
          <dt>Letter Ref. No. (Docref)</dt>
          <dd>Enter the letter's reference number.</dd>
          <dt>Letter Date</dt>
          <dd>When you click on the input box a calendar dialog will appear that will enable you to select the letter's date. Alternatively you can input the date manually using the format YYYY-MM-DD, e.g. 2017-10-31.</dd>
          <dt>Contents</dt>
          <dd>Enter the contents (main body) of the letter. This will allow you in the future to search the database for specific keywords contained in the letter body.</dd>
          <dt>References</dt>
          <dd>Enter the letter's references. These are treated like tags. If a reference number is already in the database it will automatically appear in the list.</dd>
          <dt>Confidential Checkbox</dt>
          <dd>If the letter is confidential then click on the checkbox.</dd>
          <dt>Reply Requested Checkbox</dt>
          <dd>If a reply is required for the letter then click on the checkbox.</dd>
          <dt>Add New Letter Button</dt>
          <dd>Click on the button to save the letter data in the database.</dd>
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
        Clicking on this menu item will generate an Excel file that contains data about all the letters saved in the database.
      </p>
    </div>
  </div>
</div>
