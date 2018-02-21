<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <?= $this->Html->link('CoCoMS', '/pages/home', ['class' => 'navbar-brand']) ?>
     </div>
     <div id="navbar" class="collapse navbar-collapse">
       <ul class="nav navbar-nav">
        <?php
           if ($this->request->params['controller'] == 'Dashboard') {
             echo '<li class="active">';
             echo $this->User->AuthLink->link(__('Dashboard'), '/dashboard/index');
             echo '</li>';
           } else {
             echo '<li>';
             echo $this->User->AuthLink->link(__('Dashboard'), '/dashboard/index');
             echo '</li>';
           }
        ?>
        <?php
         if ($this->request->params['controller'] == 'Letters') {
           echo '<li class="active dropdown">';
         } else {
           echo '<li class="dropdown">';
         }
         ?>
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Letters <b class="caret"></b></a>
           <ul class="dropdown-menu" role="menu">
             <?php
             if ($this->User->AuthLink->isAuthorized('/letters/index')) {
               echo '<li>';
               echo $this->User->AuthLink->link(__('List Letters'), '/letters/index');
               echo '</li>';
             }
             if ($this->User->AuthLink->isAuthorized('/letters/add')) {
               echo '<li>';
               echo $this->User->AuthLink->link(__('Add Letter'), '/letters/add');
               echo '</li>';
             }
             ?>
             <li role="separator" class="divider"></li>
             <li>
               <?= $this->Html->link('Create Excel file', ['controller' => 'Letters', 'action' => 'index', '_ext' => 'xlsx', 'plugin' => false]) ?>
             </li>
           </ul>
         </li>
         <?php
         if ($this->request->params['controller'] == 'Senders') {
           echo '<li class="active dropdown">';
         } else {
           echo '<li class="dropdown">';
         }
         ?>
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Senders <b class="caret"></b></a>
           <ul class="dropdown-menu" role="menu">
             <?php
             if ($this->User->AuthLink->isAuthorized('/senders/index')) {
               echo '<li>';
               echo $this->User->AuthLink->link(__('List Senders'), '/senders/index');
               echo '</li>';
             }
             if ($this->User->AuthLink->isAuthorized('/senders/add')) {
               echo '<li>';
               echo $this->User->AuthLink->link(__('Add Sender'), '/senders/add');
               echo '</li>';
             }
             ?>
             <li role="separator" class="divider"></li>
             <li>
               <?= $this->Html->link('Create Excel file', ['controller' => 'Senders', 'action' => 'index', '_ext' => 'xlsx', 'plugin' => false]) ?>
             </li>
           </ul>
         </li>
         <?php
         if ($this->request->params['controller'] == 'Recipients') {
           echo '<li class="active dropdown">';
         } else {
           echo '<li class="dropdown">';
         }
         ?>
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recipients <b class="caret"></b></a>
           <ul class="dropdown-menu" role="menu">
             <?php
             if ($this->User->AuthLink->isAuthorized('/recipients/index')) {
               echo '<li>';
               echo $this->User->AuthLink->link(__('List Recipients'), '/recipients/index');
               echo '</li>';
             }
             if ($this->User->AuthLink->isAuthorized('/recipients/add')) {
               echo '<li>';
               echo $this->User->AuthLink->link(__('Add Recipient'), '/recipients/add');
               echo '</li>';
             }
             ?>
             <li role="separator" class="divider"></li>
             <li>
               <?= $this->Html->link('Create Excel file', ['controller' => 'Recipients', 'action' => 'index', '_ext' => 'xlsx', 'plugin' => false]) ?>
             </li>
           </ul>
         </li>
         <?php
         if ($this->request->params['controller'] == 'WorkPackages') {
           echo '<li class="active dropdown">';
         } else {
           echo '<li class="dropdown">';
         }
         ?>
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Work Packages <b class="caret"></b></a>
           <ul class="dropdown-menu" role="menu">
             <?php
             if ($this->User->AuthLink->isAuthorized('/work_packages/index')) {
               echo '<li>';
               echo $this->User->AuthLink->link(__('List Work Packages'), '/work_packages/index');
               echo '</li>';
             }
             if ($this->User->AuthLink->isAuthorized('/work_packages/add')) {
               echo '<li>';
               echo $this->User->AuthLink->link(__('Add Work Package'), '/work_packages/add');
               echo '</li>';
             }
             ?>
             <li role="separator" class="divider"></li>
             <li>
               <?= $this->Html->link('Create Excel file', ['controller' => 'WorkPackages', 'action' => 'index', '_ext' => 'xlsx', 'plugin' => false]) ?>
             </li>
           </ul>
         </li>
         <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Menu <b class="caret"></b></a>
             <ul class="dropdown-menu" role="menu">
               <li>
                 <?= $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index', 'plugin' => 'CakeDC/users']) ?>
               </li>
               <li>
                 <?= $this->Html->link(__('Add User'), ['controller' => 'users', 'action' => 'add', 'plugin' => 'CakeDC/users']) ?>
               </li>
             </ul>
           </li>
         <?php endif; ?>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i>
             <?= $this->request->session()->read('Auth.User.first_name') ?>
             <b class="caret"></b></a>
           <ul class="dropdown-menu" role="menu">
             <li class="dropdown-header">
               Signed in as: <?= $this->request->session()->read('Auth.User.username') ?>
             </li>
             <li class="dropdown-header">
               Role Type: <?= $this->request->session()->read('Auth.User.role') ?>
             </li>
             <li role="separator" class="divider"></li>
             <li>
               <?= $this->Html->link(__('View Profile'), ['controller' => 'users', 'action' => 'profile', 'plugin' => 'CakeDC/users']) ?>
             </li>
             <li>
               <?= $this->Html->link(__('Edit Profile'), ['controller' => 'users', 'action' => 'edit', $this->request->session()->read('Auth.User.id'), 'plugin' => 'CakeDC/users']) ?>
             </li>
             <li>
               <?= $this->Html->link(__('Change Password'), ['controller' => 'users', 'action' => 'changePassword', $this->request->session()->read('Auth.User.id'), 'plugin' => 'CakeDC/users']) ?>
             </li>
             <li role="separator" class="divider"></li>
             <li><?= $this->User->AuthLink->link(__('Logout'), '/logout') ?></li>
           </ul>
         </li>
       </ul>
     </div><!--/.nav-collapse -->
   </div>
</nav>
