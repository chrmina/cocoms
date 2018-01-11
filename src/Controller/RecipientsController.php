<?php

namespace App\Controller;

/**
 * Recipients Controller.
 *
 * @property \App\Model\Table\RecipientsTable $Recipients
 */
class RecipientsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
      // Set the layout
      $this->viewBuilder()->layout('default');
    }

    /**
     * Index method.
     */
    public function index()
    {
        $this->set('recipients', $this->paginate($this->Recipients));
        $this->set('_serialize', ['recipients']);
    }

    /**
     * View method.
     *
     * @param string|null $id Recipient id.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipient = $this->Recipients->get($id);
        $this->set('recipient', $recipient);
        $this->set('_serialize', ['recipient']);

        $this->paginate = array(
            'Letters' => array(
                'conditions' => array('Letters.recipient_id' => $id),
                'order' => ['docdate' => 'desc'],
            ),
        );
        $letters = $this->paginate('Letters');
        $this->set('letters', $letters);
    }

    /**
     * Add method.
     */
    public function add()
    {
        $recipient = $this->Recipients->newEntity();
        if ($this->request->is('post')) {
            $recipient = $this->Recipients->patchEntity($recipient, $this->request->data);
            if ($this->Recipients->save($recipient)) {
                $this->Flash->success(__('The recipient has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipient could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recipient'));
        $this->set('_serialize', ['recipient']);
    }

    /**
     * Edit method.
     *
     * @param string|null $id Recipient id.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipient = $this->Recipients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipient = $this->Recipients->patchEntity($recipient, $this->request->data);
            if ($this->Recipients->save($recipient)) {
                $this->Flash->success(__('The recipient has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipient could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recipient'));
        $this->set('_serialize', ['recipient']);
    }

    /**
     * Delete method.
     *
     * @param string|null $id Recipient id.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipient = $this->Recipients->get($id);
        if ($this->Recipients->delete($recipient)) {
            $this->Flash->success(__('The recipient has been deleted.'));
        } else {
            $this->Flash->error(__('The recipient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
