<?php

namespace App\Controller;

/**
 * Documents Controller.
 *
 * @property \App\Model\Table\LettersTable $Letters
 */
class LettersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Set the layout
        $this->viewBuilder()->layout('default');
        $this->loadComponent('Search.Prg', [
          // This is default config. You can modify "actions" as needed to make
          // the PRG component work only for specified methods.
          'actions' => ['index', 'lookup'],
        ]);
    }

    /**
     * Index method.
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $query = $this->Letters
          // Use the plugins 'search' custom finder and pass in the
          // processed query params
          ->find('search', ['search' => $this->request->query])
          // You can add extra things to the query if you need to
          //->contain(['Senders'])
          ->where(['subject IS NOT' => null]);

        $senders = $this->Letters->Senders->find('list')->order(['name' => 'ASC']);
        $this->set(compact('senders'));

        $recipients = $this->Letters->Recipients->find('list')->order(['name' => 'ASC']);
        $this->set(compact('recipients'));

        $workPackages = $this->Letters->WorkPackages->find('list')->order(['name' => 'ASC']);
        $this->set(compact('workPackages'));

        $this->paginate = [
            'contain' => ['Senders', 'Recipients', 'WorkPackages'],
            'order' => ['docdate' => 'desc'],
        ];

        $this->set('letters', $this->paginate($query));
    }

    /**
     * View method.
     *
     * @param string|null $id Document id.
     *
     * @return \Cake\Network\Response|null
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $letter = $this->Letters->get($id, [
            'contain' => ['Senders', 'Recipients', 'WorkPackages', 'Tags'],
        ]);
        $this->set(compact('letter'));
    }

    /**
     * Add method.
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $letter = $this->Letters->newEntity();
        if ($this->request->is('post')) {
            $letter = $this->Letters->patchEntity($letter, $this->request->data);
            if ($this->Letters->save($letter)) {
                $this->Flash->success(__('The letter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The letter could not be saved. Please, try again.'));
            }
        }
        $senders = $this->Letters->Senders->find('list')->order(['name' => 'ASC']);
        $recipients = $this->Letters->Recipients->find('list')->order(['name' => 'ASC']);
        $workPackages = $this->Letters->WorkPackages->find('list')->order(['name' => 'ASC']);
        $this->set(compact('letter', 'senders', 'recipients', 'workPackages'));
        $this->set('_serialize', ['letter']);
    }

    /**
     * Edit method.
     *
     * @param string|null $id Document id.
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $letter = $this->Letters->get($id, [
            'contain' => ['Senders', 'Recipients', 'WorkPackages', 'Tags'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $letter = $this->Letters->patchEntity($letter, $this->request->data);
            if ($this->Letters->save($letter)) {
                $this->Flash->success(__('The letter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The letter could not be saved. Please, try again.'));
            }
        }

        // Manage Tags
        $delimiter = ','; // same as delimiter at TagBehavior
        $tags = [];
        $alltags = $letter->tags;
        foreach ($alltags as $tag):
          $tags[] = $tag->label;
        endforeach;
        $letter->tags = implode($delimiter, $tags);

        $senders = $this->Letters->Senders->find('list')->order(['name' => 'ASC']);
        $recipients = $this->Letters->Recipients->find('list')->order(['name' => 'ASC']);
        $workPackages = $this->Letters->WorkPackages->find('list')->order(['name' => 'ASC']);
        $this->set(compact('letter', 'senders', 'recipients', 'workPackages'));
    }

    /**
     * Delete method.
     *
     * @param string|null $id Document id.
     *
     * @return \Cake\Network\Response|null Redirects to index.
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $letter = $this->Letters->get($id);
        if ($this->Letters->delete($letter)) {
            $this->Flash->success(__('The letter has been deleted.'));
        } else {
            $this->Flash->error(__('The letter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $results = $this->Letters->find('list', [
             'keyField' => 'id',
             'valueField' => 'docref',
           ]);
            $resultsArr = [];
            foreach ($results as $result) {
                $resultsArr[] = ['label' => $result['id'], 'value' => $result['docref']];
            }
            echo json_encode($resultsArr);
        }
    }

    /* Method for generating the references for the tags */
    public function getall()
    {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $results = $this->Letters->find('all', [
             'keyField' => 'id',
             'valueField' => 'docref',
            ]);

            $resultsArr = [];
            foreach ($results as $result) {
                $resultsArr[] = $result['docref'];
            }
            echo json_encode($resultsArr);
        }
    }
}
