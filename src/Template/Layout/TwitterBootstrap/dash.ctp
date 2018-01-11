<?php

/* @var $this \Cake\View\View */

$this->Html->css('jquery/jquery-ui', ['block' => true]);
$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->Html->css('typeahead/typeahead', ['block' => true]);
$this->Html->css('bootstrap/bootstrap-tagsinput', ['block' => true]);
$this->Html->css('bootflat/skins/flat/blue', ['block' => true]);

$this->prepend('tb_body_attrs', ' class="'.implode(' ', [$this->request->controller, $this->request->action]).'" ');
$this->start('tb_body_start');
?>

<body <?= $this->fetch('tb_body_attrs') ?>>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#" class="pull-left">
          <?= $this->Html->image('logo.png', ['height' => '50px', 'alt' => 'CoCoS']) ?>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Letters <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li>
                  <?= $this->Html->link(__('List Letters'), ['controller' => 'Letters', 'action' => 'index', 'plugin' => false]) ?>
                </li>
                <li>
                  <?= $this->Html->link(__('New Letter'), ['controller' => 'Letters', 'action' => 'add', 'plugin' => false]) ?>
                </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Senders <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><?= $this->Html->link(__('List Senders'), ['controller' => 'Senders', 'action' => 'index', 'plugin' => false]) ?></li>
              <li><?= $this->Html->link(__('New Sender'), ['controller' => 'Senders', 'action' => 'add', 'plugin' => false]) ?></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recipients <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <?= $this->Html->link(__('List Recipients'), ['controller' => 'Recipients', 'action' => 'index', 'plugin' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('New Recipient'), ['controller' => 'Recipients', 'action' => 'add', 'plugin' => false]) ?>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Work Packages <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <?= $this->Html->link(__('List Work Packages'), ['controller' => 'WorkPackages', 'action' => 'index', 'plugin' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('New Work Package'), ['controller' => 'WorkPackages', 'action' => 'add', 'plugin' => false]) ?>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/cocos/profile">Dashboard</a></li>
          <li>
            <?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout', 'plugin' => 'CakeDC/users']) ?>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container-fluid">
    <?php
    /**
    * Default `flash` block.
    */
    if (!$this->fetch('tb_flash')) {
      $this->start('tb_flash');
      if (isset($this->Flash))
        echo $this->Flash->render();
        $this->end();
      }
      $this->end();

      $this->start('tb_body_end');
      echo '</body>';
      $this->end();

      $this->append('content', '</div>');
      echo $this->fetch('content');
    ?>
