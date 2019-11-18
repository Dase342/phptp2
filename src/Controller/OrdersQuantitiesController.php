<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrdersQuantities Controller
 *
 *
 * @method \App\Model\Entity\OrdersQuantity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersQuantitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Quantities']
        ];
        $ordersQuantities = $this->paginate($this->OrdersQuantities);

        $this->set(compact('ordersQuantities'));
    }

    /**
     * View method
     *
     * @param string|null $id Orders Quantity id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersQuantity = $this->OrdersQuantities->get($id, [
            'contain' => []
        ]);

        $this->set('ordersQuantity', $ordersQuantity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersQuantity = $this->OrdersQuantities->newEntity();
        if ($this->request->is('post')) {
            $ordersQuantity = $this->OrdersQuantities->patchEntity($ordersQuantity, $this->request->getData());
            debug($ordersQuantity);
            die();
            if ($this->OrdersQuantities->save($ordersQuantity)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['controller' => 'Orders','action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $type = $this->Auth->user('user_type_id');
        $userId = $this->Auth->user('id');

        if($type == 1){
            $orders = $this->OrdersQuantities->Orders->find('list', ['limit' => 200]);
            $quantities = $this->OrdersQuantities->Quantities->find('list', ['limit' => 200]);
        } else {
            $orders = $this->OrdersQuantities->Orders->find('list', ['limit' => 200])->where(['Orders.user_id =' => $userId]);
            $quantities = $this->OrdersQuantities->Quantities->find('list', ['limit' => 200]);
        }
        
        $this->set(compact('ordersQuantity', 'orders', 'quantities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orders Quantity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordersQuantity = $this->OrdersQuantities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersQuantity = $this->OrdersQuantities->patchEntity($ordersQuantity, $this->request->getData());
            if ($this->OrdersQuantities->save($ordersQuantity)) {
                $this->Flash->success(__('The orders quantity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders quantity could not be saved. Please, try again.'));
        }
        $this->set(compact('ordersQuantity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orders Quantity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersQuantity = $this->OrdersQuantities->get($id);
        if ($this->OrdersQuantities->delete($ordersQuantity)) {
            $this->Flash->success(__('The orders quantity has been deleted.'));
        } else {
            $this->Flash->error(__('The orders quantity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
