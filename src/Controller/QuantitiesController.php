<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Quantities Controller
 *
 * @property \App\Model\Table\QuantitiesTable $Quantities
 *
 * @method \App\Model\Entity\Quantity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuantitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MenuItems']
        ];
        $quantities = $this->paginate($this->Quantities);

        $this->set(compact('quantities'));
    }

    /**
     * View method
     *
     * @param string|null $id Quantity id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quantity = $this->Quantities->get($id, [
            'contain' => ['MenuItems']
        ]);

        $this->set('quantity', $quantity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quantity = $this->Quantities->newEntity();
        if ($this->request->is('post')) {
            $quantity = $this->Quantities->patchEntity($quantity, $this->request->getData());
            if ($this->Quantities->save($quantity)) {
                $this->Flash->success(__('The quantity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quantity could not be saved. Please, try again.'));
        }
        $menuItems = $this->Quantities->MenuItems->find('list', ['limit' => 200]);
        $this->set(compact('quantity', 'menuItems'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quantity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quantity = $this->Quantities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quantity = $this->Quantities->patchEntity($quantity, $this->request->getData());
            if ($this->Quantities->save($quantity)) {
                $this->Flash->success(__('The quantity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quantity could not be saved. Please, try again.'));
        }
        $menuItems = $this->Quantities->MenuItems->find('list', ['limit' => 200]);
        $this->set(compact('quantity', 'menuItems'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quantity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quantity = $this->Quantities->get($id);
        if ($this->Quantities->delete($quantity)) {
            $this->Flash->success(__('The quantity has been deleted.'));
        } else {
            $this->Flash->error(__('The quantity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
