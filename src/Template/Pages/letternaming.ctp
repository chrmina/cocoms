<?php
/* @var $this \Cake\View\View */
$this->assign('title', 'CoCoMS: Letter Naming');
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
        In order to keep things tidy and in order it is suggested that a letter naming convention is followed. It is assumed that the project is broken down in work packages (WP) and each WP is assigned a unique number.
      </p>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Letter Naming Convention</h3>
    </div>
    <div class="panel-body">
      <p>
        The naming convention for letters is <b>SENDER-RECIPIENT-WPNumber-TYPE-XXXXX</b> where:
        <dl>
          <dt>SENDER</dt>
          <dd>The sender's name. For example if the sender is ACME Corporation then SENDER will be ACME.</dd>
          <dt>RECIPIENT</dt>
          <dd>The recipient's name. For example if the recipient is Smith Corporation then RECIPIENT will be SMITH.</dd>
          <dt>WPNumber</dt>
          <dd>The unique number of the work package. For example if the work package is 20000-Civil Works then WPNumber will be 20000. Note that letters not related to any WP shall be given the unique number 00000.</dd>
          <dt>TYPE</dt>
          <dd>The correspondence type: Use L for Letters, RFI for Requests for Information, RFA for Requests for Approval, etc.</dd>
          <dt>XXXXX</dt>
          <dd>A unique number identifying the letter, e.g. 000164.</dd>
        </dl>
      </p>
      <p>
        <u>Letter Name Examples</u>
        <br />
        Assume that a letter was sent from <b>ACME Corporation</b> to <b>Smith Corporation</b> regarding WP <b>20000-Civil Works</b>. The letter should be named: <b>ACME-SMITH-20000-L-00096</b>.
        <br />
        Assume that a letter was sent from <b>Brown Corporation</b> to <b>Homer Corporation</b> not related to any specific WP. The letter should be named: <b>BROWN-HOMER-00000-L-00243</b>.
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">File Naming Convention</h3>
    </div>
    <div class="panel-body">
      <p>
        The letter files (e.g. PDF) should be given the same name as the letter name following the letter naming convention (i.e. <b>SENDER-RECIPIENT-WPNumber-TYPE-XXXXX</b>). For example, if the letter is named <b>ACME-SMITH-20000-L-00096</b> then the associated PDF file should be named <b>ACME-SMITH-20000-L-00096.pdf</b>.
      </p>
    </div>
  </div>
</div>
