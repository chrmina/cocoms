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
    $letters = TableRegistry::get('Letters')->find('all');
    $senders = TableRegistry::get('Senders')->find('all');
    $recipients = TableRegistry::get('Recipients')->find('all');
    $wp = TableRegistry::get('WorkPackages')->find('all');

    $totletters = $letters->count();
    $totsenders = $senders->count();
    $totrecipients = $recipients->count();
    $totwp = $wp->count();

    $query = $letters->find('all')->where(['Letters.sender_id =' => 'f5535ade-138b-46bd-97e7-142f08785118']);
    $number = $query->count();

    $this->set(compact('totletters', 'totsenders', 'totrecipients', 'totwp', 'number'));
  }
}
