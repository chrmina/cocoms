<?php
/* @var $this \Cake\View\View */

$this->Html->css('jquery/jquery-ui', ['block' => true]);
$this->Html->css('BootstrapUI.signin', ['block' => true]);
$this->Html->css('typeahead/typeahead', ['block' => true]);
$this->Html->css('bootstrap/bootstrap-tagsinput', ['block' => true]);
$this->Html->css('bootflat/skins/flat/blue', ['block' => true]);

$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
$this->start('tb_body_start');
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="container">
<?php
echo $this->Html->image('main.png', ['alt' => 'CoCoS', 'class' => 'img-responsive center-block']);
?>
<h1 class="page-header text-center">CoCoS</h1>
<p class="text-center">
  Construction Correspondence System
</p>
<br />
<?php
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->start('tb_footer');
echo ' ';
$this->end();

$this->append('content', '</div>');
echo $this->fetch('content');
