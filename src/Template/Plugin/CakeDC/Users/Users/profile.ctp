<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<h1 class="page-header">Profile Data</h1>
<h3>User Full Name: <?= h($user->first_name).' '.h($user->last_name) ?></h3>
<h3><?= $this->Html->image(empty($user->avatar) ? $avatarPlaceholder : $user->avatar, ['width' => '180', 'height' => '180']); ?></h3>
<h3>
  <?= $this->Html->tag('span', __d('CakeDC/Users', '{0} {1}', $user->first_name, $user->last_name), ['class' => 'full_name']) ?>
</h3>

<table class="table table-striped" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th><?= $this->Paginator->sort('username') ?></th>
      <th><?= $this->Paginator->sort('email') ?></th>
      <th><?= $this->Paginator->sort('first_name') ?></th>
      <th><?= $this->Paginator->sort('last_name') ?></th>
      <th><?= $this->Paginator->sort('role') ?></th>
      <th><?= $this->Paginator->sort('active') ?></th>
      <th class="actions"><?= __d('CakeDC/Users', 'Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= h($user->username) ?></td>
      <td><?= h($user->email) ?></td>
      <td><?= h($user->first_name) ?></td>
      <td><?= h($user->last_name) ?></td>
      <td><?= h($user->role) ?></td>
      <td><?= $user->active ? __('Yes') : __('No'); ?></td>
      <td class="actions">
        <?= $this->Html->link(__d('CakeDC/Users', ''), ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
        <?= $this->Html->link(__d('CakeDC/Users', ''), ['action' => 'changePassword', $user->id], ['title' => __('Change Password'), 'class' => 'btn btn-default glyphicon glyphicon-lock']) ?>
        <?= $this->Html->link(__d('CakeDC/Users', ''), ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
        <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
          <?= $this->Form->postLink(__d('CakeDC/Users', ''), ['action' => 'delete', $user->id], ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete user: {0}?', $user->username), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
        <?php endif; ?>
      </td>
    </tr>
  </tbody>
</table>

<?php if (!empty($user->social_accounts)): ?>
  <h6>
    <?= __d('CakeDC/Users', 'Social Accounts') ?>
  </h6>
  <table cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th><?= __d('CakeDC/Users', 'Avatar'); ?></th>
        <th><?= __d('CakeDC/Users', 'Provider'); ?></th>
        <th><?= __d('CakeDC/Users', 'Link'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($user->social_accounts as $socialAccount):
        $escapedUsername = h($socialAccount->username);
        $linkText = empty($escapedUsername) ? __d('CakeDC/Users', 'Link to {0}', h($socialAccount->provider)) : h($socialAccount->username)
      ?>
      <tr>
        <td>
          <?= $this->Html->image($socialAccount->avatar, ['width' => '90', 'height' => '90']) ?>
        </td>
        <td>
          <?= h($socialAccount->provider) ?>
        </td>
        <td>
          <?= $this->Html->link($linkText, $socialAccount->link, ['target' => '_blank']) ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>
