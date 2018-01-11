<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org).
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 *
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;
use Cake\Controller\Controller;

/**
 * Application Controller.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
  /**
   * Initialization hook method.
   *
   * Use this method to add common initialization code like loading components.
   */

  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler', ['viewClassMap' => ['xlsx' => 'CakeExcel.Excel']]);
    $this->loadComponent('Flash');
    $this->loadComponent('CakeDC/Users.UsersAuth');
    $config['Auth']['authorize']['CakeDC/Users.SimpleRbac'] = [
      //autoload permissions.php
      'autoload_config' => 'permissions',
      //role field in the Users table
      'role_field' => 'role',
      //default role, used in new users registered and also as role matcher when no role is available
      'default_role' => 'user',
      /*
       * This is a quick roles-permissions implementation
       * Rules are evaluated top-down, first matching rule will apply
       * Each line define
       *      [
       *          'role' => 'admin',
       *          'plugin', (optional, default = null)
       *          'prefix', (optional, default = null)
       *          'extension', (optional, default = null)
       *          'controller',
       *          'action',
       *          'allowed' (optional, default = true)
       *      ]
       * You could use '*' to match anything
       * Suggestion: put your rules into a specific config file
       */
       'permissions' => [], // you could set an array of permissions or load them using a file 'autoload_config'
    ];
  }
}
