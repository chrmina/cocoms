<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->element('head') ?>
</head>
<body style="background-color: #f1f2f6;">
  <?php if ($this->request->session()->read('Auth.User.id')): ?>
    <!-- NavBar -->
    <?= $this->element('navbar') ?>
  <?php endif; ?>
  <!-- Page Content -->
  <div class="container">
    <!-- Contents -->
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </div>
  <!-- Footer -->
  <?= $this->element('footer') ?>
</body>
</html>
