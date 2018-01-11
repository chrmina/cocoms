<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com).
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/*
 * IMPORTANT:
 * This is an example configuration file. Copy this file into your config directory and edit to
 * setup your app permissions.
 *
 * This is a quick roles-permissions implementation
 * Rules are evaluated top-down, first matching rule will apply
 * Each line define
 *      [
 *          'role' => 'role' | ['roles'] | '*'
 *          'prefix' => 'Prefix' | , (default = null)
 *          'plugin' => 'Plugin' | , (default = null)
 *          'controller' => 'Controller' | ['Controllers'] | '*',
 *          'action' => 'action' | ['actions'] | '*',
 *          'allowed' => true | false | callback (default = true)
 *      ]
 * You could use '*' to match anything
 * 'allowed' will be considered true if not defined. It allows a callable to manage complex
 * permissions, like this
 * 'allowed' => function (array $user, $role, Request $request) {}
 *
 * Example, using allowed callable to define permissions only for the owner of the Posts to edit/delete
 *
 * (remember to add the 'uses' at the top of the permissions.php file for Hash, TableRegistry and Request
   [
        'role' => ['user'],
        'controller' => ['Posts'],
        'action' => ['edit', 'delete'],
        'allowed' => function(array $user, $role, Request $request) {
            $postId = Hash::get($request->params, 'pass.0');
            $post = TableRegistry::get('Posts')->get($postId);
            $userId = Hash::get($user, 'id');
            if (!empty($post->user_id) && !empty($userId)) {
                return $post->user_id === $userId;
            }
            return false;
        }
    ],
 */
use Cake\Utility\Hash;
use Cake\Network\Request;

return [
  'Users.SimpleRbac.permissions' => [
    [
        'role' => '*',
        'plugin' => 'CakeDC/Users',
        'controller' => 'Users',
        'action' => ['register', 'login'],
    ],
    [
        'role' => ['user', 'editor'],
        'plugin' => 'CakeDC/Users',
        'controller' => 'Users',
        'action' => ['logout', 'profile'],
    ],
    // Rule for users & editors to be able to view or change only their own accounts!
    [
        'role' => ['user', 'editor'],
        'plugin' => 'CakeDC/Users',
        'controller' => 'Users',
        'action' => ['edit', 'view'],
        'allowed' => function (array $user, $role, Request $request) {
          $requserid = Hash::get($request->params, 'pass.0');
          $loggeduser = $request->session()->read('Auth.User.id');
          if (!empty($requserid) && !empty($loggeduser)) {
            return $requserid === $loggeduser;
          }
          return false;
        }
    ],
    [
        'role' => '*',
        'controller' => 'Pages',
        'action' => 'display',
    ],
    [
        'role' => 'user',
        'controller' => ['Letters', 'Recipients', 'Senders', 'WorkPackages'],
        'action' => ['index', 'view'],
    ],
    [
        'role' => 'editor',
        'controller' => ['Letters', 'Recipients', 'Senders', 'WorkPackages'],
        'action' => '*',
    ],
  ],
];
