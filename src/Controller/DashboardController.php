<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Dashboard Controller.
 */
class DashboardController extends AppController
{
  public function index()
  {
    $totletters = TableRegistry::get('Letters')->find()->count();
    $totsenders = TableRegistry::get('Senders')->find()->count();
    $totrecipients = TableRegistry::get('Recipients')->find()->count();
    $totwp = TableRegistry::get('WorkPackages')->find()->count();
    $this->set(compact('totletters', 'totsenders', 'totrecipients', 'totwp'));
  }
}
