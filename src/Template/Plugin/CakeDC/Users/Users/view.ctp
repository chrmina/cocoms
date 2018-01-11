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
$Users = ${$tableAlias};
?>
<h1 class="page-header">Details about user: <?= h($Users->username); ?></h1>
<table class="table table-striped" cellpadding="0" cellspacing="0">
  <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
  <tr>
    <th><?= __d('CakeDC/Users', 'Id') ?></th>
    <td><?= h($Users->id) ?></td>
  </tr>
  <tr>
    <th><?= __d('CakeDC/Users', 'Role') ?></th>
    <td><?= h($Users->role) ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <th><?= __d('CakeDC/Users', 'Username') ?></th>
    <td><?= h($Users->username) ?></td>
  </tr>
  <tr>
    <th><?= __d('CakeDC/Users', 'Email') ?></th>
    <td><?= h($Users->email) ?></td>
  </tr>
  <tr>
    <th><?= __d('CakeDC/Users', 'First Name') ?></th>
    <td><?= h($Users->first_name) ?></td>
  </tr>
  <tr>
    <th><?= __d('CakeDC/Users', 'Last Name') ?></th>
    <td><?= h($Users->last_name) ?></td>
  </tr>
  <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
  <tr>
    <th><?= __d('CakeDC/Users', 'Token') ?></th>
    <td><?= h($Users->token) ?></td>
  </tr>
  <tr>
    <th><?= __d('CakeDC/Users', 'API Token') ?></th>
    <td><?= h($Users->api_token) ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <th><?= __d('CakeDC/Users', 'Active') ?></th>
    <td><?= $Users->active ? __('Yes') : __('No'); ?></td>
  </tr>
  <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
  <tr>
    <th><?= __d('CakeDC/Users', 'Token Expires') ?></th>
    <td><?= h($Users->token_expires) ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <th><?= __d('CakeDC/Users', 'Activation Date') ?></th>
    <td><?= h($Users->activation_date) ?></td>
  </tr>
  <tr>
    <th><?= __d('CakeDC/Users', 'TOS Date') ?></th>
    <td><?= h($Users->tos_date) ?></td>
  </tr>
  <tr>
    <th><?= __d('CakeDC/Users', 'Created') ?></th>
    <td><?= h($Users->created->i18nFormat([\IntlDateFormatter::FULL, \IntlDateFormatter::SHORT])) ?></td>
  </tr>
  <tr>
    <th><?= __d('CakeDC/Users', 'Modified') ?></th>
    <td><?= h($Users->modified->i18nFormat([\IntlDateFormatter::FULL, \IntlDateFormatter::SHORT])) ?></td>
  </tr>
</table>

<?php if (!empty($Users->social_accounts)) : ?>
<h2 class="page-header">Related Accounts</h2>
<table class="table table-striped" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th><?= __d('CakeDC/Users', 'Id') ?></th>
      <th><?= __d('CakeDC/Users', 'User Id') ?></th>
      <th><?= __d('CakeDC/Users', 'Provider') ?></th>
      <th><?= __d('CakeDC/Users', 'Username') ?></th>
      <th><?= __d('CakeDC/Users', 'Reference') ?></th>
      <th><?= __d('CakeDC/Users', 'Avatar') ?></th>
      <th><?= __d('CakeDC/Users', 'Token') ?></th>
      <th><?= __d('CakeDC/Users', 'Token Expires') ?></th>
      <th><?= __d('CakeDC/Users', 'Active') ?></th>
      <th><?= __d('CakeDC/Users', 'Data') ?></th>
      <th><?= __d('CakeDC/Users', 'Created') ?></th>
      <th><?= __d('CakeDC/Users', 'Modified') ?></th>
      <th class="actions"><?= __d('CakeDC/Users', 'Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Users->social_accounts as $socialAccount) : ?>
      <tr>
        <td><?= h($socialAccount->id) ?></td>
        <td><?= h($socialAccount->user_id) ?></td>
        <td><?= h($socialAccount->provider) ?></td>
        <td><?= h($socialAccount->username) ?></td>
        <td><?= h($socialAccount->reference) ?></td>
        <td><?= h($socialAccount->avatar) ?></td>
        <td><?= h($socialAccount->token) ?></td>
        <td><?= h($socialAccount->token_expires) ?></td>
        <td><?= h($socialAccount->active) ?></td>
        <td><?= h($socialAccount->data) ?></td>
        <td><?= h($socialAccount->created) ?></td>
        <td><?= h($socialAccount->modified) ?></td>
        <td class="actions">
          <?= $this->Html->link(__d('CakeDC/Users', ''), ['controller' => 'Accounts', 'action' => 'view', $socialAccount->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
          <?= $this->Html->link(__d('CakeDC/Users', ''), ['controller' => 'Accounts', 'action' => 'edit', $socialAccount->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
          <?= $this->Form->postLink(__d('CakeDC/Users', ''), ['controller' => 'Accounts', 'action' => 'delete', $socialAccount->id], ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete # {0}?', $accounts->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
