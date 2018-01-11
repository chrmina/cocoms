<?php

namespace App\Controller;

/**
 * WorkPackages Controller.
 *
 * @property \App\Model\Table\WorkPackagesTable $WorkPackages
 */
class WorkPackagesController extends AppController
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
        $workPackages = $this->paginate($this->WorkPackages);

        $this->set(compact('workPackages'));
        $this->set('_serialize', ['workPackages']);
    }

    /**
     * View method.
     *
     * @param string|null $id Work Package id.
     *
     * @return \Cake\Network\Response|null
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workPackage = $this->WorkPackages->get($id);
        $this->set('workPackage', $workPackage);
        $this->set('_serialize', ['workPackage']);

        $this->paginate = array(
            'Letters' => array(
                'contain' => ['Senders', 'Recipients'],
                'conditions' => array('Letters.work_package_id' => $id),
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
        $workPackage = $this->WorkPackages->newEntity();
        if ($this->request->is('post')) {
            $workPackage = $this->WorkPackages->patchEntity($workPackage, $this->request->data);
            if ($this->WorkPackages->save($workPackage)) {
                $this->Flash->success(__('The work package has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The work package could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('workPackage'));
        $this->set('_serialize', ['workPackage']);
    }

    /**
     * Edit method.
     *
     * @param string|null $id Work Package id.
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workPackage = $this->WorkPackages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workPackage = $this->WorkPackages->patchEntity($workPackage, $this->request->data);
            if ($this->WorkPackages->save($workPackage)) {
                $this->Flash->success(__('The work package has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The work package could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('workPackage'));
        $this->set('_serialize', ['workPackage']);
    }

    /**
     * Delete method.
     *
     * @param string|null $id Work Package id.
     *
     * @return \Cake\Network\Response|null Redirects to index.
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workPackage = $this->WorkPackages->get($id);
        if ($this->WorkPackages->delete($workPackage)) {
            $this->Flash->success(__('The work package has been deleted.'));
        } else {
            $this->Flash->error(__('The work package could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
