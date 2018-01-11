<?php
namespace App\Controller;
use App\Controller\AppController;
use App\Form\ContactForm;
use Cake\Event\Event;

class ContactController extends AppController
{
    public function index()
    {
        $contact = new ContactForm();
        if ($this->request->is('post')) {
            if ($contact->execute($this->request->data)) {
                $this->Flash->success('Your message has been sent; we\'ll get back to you soon!');
                $this->request->data['name'] = null;
                $this->request->data['email'] = null;
                $this->request->data['body'] = null;
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }
        $this->set('contact', $contact);
    }

    public function beforeFilter(Event $event)
    {
      parent::beforeFilter($event);
      $this->Auth->allow('index');
    }
}
