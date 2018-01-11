<div class="row">
	<div class="col-md-12">
		<div class="footer">
			<div class="container">
				<div class="clearfix">
					<div class="footer-logo">
						<?= $this->Html->image('main.png', ['height' => '50px', 'alt' => 'CoCoMS', 'url' => ['controller' => 'Pages', 'action' => 'home', 'plugin' => false]]) ?>
						<?= $this->Html->link('CoCoMS', ['controller' => 'Pages', 'action' => 'home', 'plugin' => false]) ?>
					</div>
						<dl class="footer-nav">
							<dt class="nav-title">ABOUT</dt>
							<dd class="nav-item">
								<?= $this->Html->link('> What is CoCoMS?', ['controller' => 'Pages', 'action' => 'whatiscocoms', 'plugin' => false]) ?>
							</dd>
							<dd class="nav-item">
								<?= $this->Html->link('> History', ['controller' => 'Pages', 'action' => 'history', 'plugin' => false]) ?>
							</dd>
						</dl>
						<dl class="footer-nav">
							<dt class="nav-title">USAGE</dt>
							<dd class="nav-item">
								<?= $this->Html->link('> Letters', ['controller' => 'Pages', 'action' => 'letters', 'plugin' => false]) ?>
							</dd>
							<dd class="nav-item">
								<?= $this->Html->link('> Senders', ['controller' => 'Pages', 'action' => 'senders', 'plugin' => false]) ?>
							</dd>
							<dd class="nav-item">
								<?= $this->Html->link('> Recipients', ['controller' => 'Pages', 'action' => 'recipients', 'plugin' => false]) ?>
							</dd>
							<dd class="nav-item">
								<?= $this->Html->link('> Work Packages', ['controller' => 'Pages', 'action' => 'workpackages', 'plugin' => false]) ?>
							</dd>
							<?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
								<dd class="nav-item">
									<?= $this->Html->link('> Admin Menu', ['controller' => 'Pages', 'action' => 'adminmenu', 'plugin' => false]) ?>
								</dd>
							<?php endif; ?>
						</dl>
						<dl class="footer-nav">
							<dt class="nav-title">DATA STRUCTURES</dt>
							<dd class="nav-item">
								<?= $this->Html->link('> Letter Naming', ['controller' => 'Pages', 'action' => 'letternaming', 'plugin' => false]) ?>
							</dd>
							<dd class="nav-item">
								<?= $this->Html->link('> Work Breakdown Structure', ['controller' => 'Pages', 'action' => 'wbs', 'plugin' => false]) ?>
							</dd>

							<dd class="nav-item">
								<?= $this->Html->link('> User Roles', ['controller' => 'Pages', 'action' => 'userroles', 'plugin' => false]) ?>
							</dd>
						</dl>
						<dl class="footer-nav">
							<dt class="nav-title">CONTACT</dt>
							<dd class="nav-item">
								<?= $this->Html->link('> Basic Info', ['controller' => 'Pages', 'action' => 'basicinfo', 'plugin' => false]) ?>
							</dd>
							<dd class="nav-item">
								<?= $this->Html->link('> Contact Form', ['controller' => 'Contact', 'action' => 'index', 'plugin' => false]) ?>
							</dd>
						</dl>
					</div>
					<div class="footer-copyright text-center">
						Copyright &copy; <a href="http://github.com/chrmina">Christakis Mina</a>
					</div>
				</div>
      </div>
  </div>
</div>
