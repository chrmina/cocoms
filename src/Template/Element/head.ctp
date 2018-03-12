<?= $this->Html->charset() ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<?= $this->fetch('meta') ?>
<?= $this->Html->meta('icon', 'favicon.png', ['type'=>'image/png']) ?>
<title>
  <?= $this->fetch('title') ?>
</title>
<?php
// Bootstrap core CSS
echo $this->Html->css(['bootstrap.min.css']);
// Bootflat core CSS
echo $this->Html->css(['bootflat/bootflat.min']);
// Bootflat Skin CSS
echo $this->Html->css(['bootflat/skins/flat/green.css']);
// jquery-ui CSS
echo $this->Html->css(['jquery-ui']);
// typeahead CSS
echo $this->Html->css(['typeahead']);
// bootstrap-tagsinput CSS
echo $this->Html->css(['bootstrap-tagsinput']);
// IE10 viewport hack for Surface/desktop Windows 8 bug
echo $this->Html->css(['ie10-viewport-bug-workaround.css']);
// Custom styles for this template
echo $this->Html->css(['starter-template.css']);
?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php
  // jquery JavaScript
  echo $this->Html->script('jquery-3.1.1.min');
  // Bootflat checkbox
  echo $this->Html->script('icheck.min');
  // jquery-ui
  echo $this->Html->script('jquery-ui');
  // jquery calendar plugin
  echo $this->Html->script('cal');
  // Bootstrap core JavaScript
  echo $this->Html->script('bootstrap.min.js');
  // Bootstrap tagsinput plugin
  echo $this->Html->script('bootstrap-tagsinput');
  // Bootstrap typeahead plugin
  echo $this->Html->script('typeahead.bundle');
  // IE10 viewport hack for Surface/desktop Windows 8 bug
  echo $this->Html->script('ie10-viewport-bug-workaround.js');
?>
<script>
 $(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });
 });
</script>
