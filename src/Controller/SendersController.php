<?php

namespace App\Controller;

/**
 * Senders Controller.
 *
 * @property \App\Model\Table\SendersTable $Senders
 */
class SendersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Set the layout
        $this->viewBuilder()->layout('default');
    }

    /**
     * Index method.
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $senders = $this->paginate($this->Senders);

        $this->set(compact('senders'));
        $this->set('_serialize', ['senders']);
    }

    /**
     * View method.
     *
     * @param string|null $id Sender id.
     *
     * @return \Cake\Network\Response|null
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sender = $this->Senders->get($id);
        $this->set('sender', $sender);
        $this->set('_serialize', ['sender']);

        $this->paginate = array(
            'Letters' => array(
                'conditions' => array('Letters.sender_id' => $id),
                'order' => ['docdate' => 'desc'],
            ),
        );
        $letters = $this->paginate('Letters');
        $this->set('letters', $letters);
    }

    /**
     * Add method.
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sender = $this->Senders->newEntity();
        if ($this->request->is('post')) {
            $sender = $this->Senders->patchEntity($sender, $this->request->data);
            if ($this->Senders->save($sender)) {
                $this->Flash->success(__('The sender has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sender could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sender'));
        $this->set('_serialize', ['sender']);
    }

    /**
     * Edit method.
     *
     * @param string|null $id Sender id.
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sender = $this->Senders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sender = $this->Senders->patchEntity($sender, $this->request->data);
            if ($this->Senders->save($sender)) {
                $this->Flash->success(__('The sender has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sender could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sender'));
        $this->set('_serialize', ['sender']);
    }

    /**
     * Delete method.
     *
     * @param string|null $id Sender id.
     *
     * @return \Cake\Network\Response|null Redirects to index.
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sender = $this->Senders->get($id);
        if ($this->Senders->delete($sender)) {
            $this->Flash->success(__('The sender has been deleted.'));
        } else {
            $this->Flash->error(__('The sender could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
