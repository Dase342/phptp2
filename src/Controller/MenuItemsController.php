<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenuItems Controller
 *
 * @property \App\Model\Table\MenuItemsTable $MenuItems
 * 
 *
 * @method \App\Model\Entity\MenuItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenuItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function initialize()
    {
        parent::initialize();
        
        $this->loadModel('Files');

        
    }


    public function index()
    {
        $this->paginate = [
            'contain' => ['Menus','Files']
        ];
        $menuItems = $this->paginate($this->MenuItems);

        $this->set(compact('menuItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => ['Menus', 'Files']
        ]);

        $this->set('menuItem', $menuItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $menuItem = $this->MenuItems->newEntity();
        if ($this->request->is('post')) {
            $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->getData());
            if ($this->MenuItems->save($menuItem)) {
                $this->Flash->success(__('The menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu item could not be saved. Please, try again.'));
        }
        $menus = $this->MenuItems->Menus->find('list', ['limit' => 200]);
    
        $files = $this->MenuItems->Files->find('list', ['limit' => 200]);

        $this->set(compact('menuItem', 'menus', 'files'));
    }

    public function addImg($id = null){
        $uploadData = '';
       
          if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'img/';
                $uploadFile = $uploadPath.$fileName;
                $ext = substr(strtolower(strrchr($fileName, '.')), 1); 
                $arr_ext = array('jpg', 'jpeg', 'gif','png');
                if(in_array($ext, $arr_ext))
                {
                    if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
                        $uploadData = $this->Files->newEntity();
                        $uploadData->name = $fileName;
                        $uploadData->path = $uploadPath;
                        $uploadData->created = date("Y-m-d H:i:s");
                        $uploadData->modified = date("Y-m-d H:i:s");
                      
                        if ($this->Files->save($uploadData)) {
                            $this->Flash->success(__('File has been uploaded and inserted successfully.'));

                            return $this->redirect(['action' => 'index']);
                        }else{
                            $this->Flash->error(__('Unable to upload file, please try again.'));
                        }
                    }else{
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('File is not an image.'));
                }
                
            }else{
                $this->Flash->error(__('Please choose a file to upload.'));
            }
            
        }
        $this->set('uploadData', $uploadData);
        
        $files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);

        
    }

    

    /**
     * Edit method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->getData());
            if ($this->MenuItems->save($menuItem)) {
                $this->Flash->success(__('The menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu item could not be saved. Please, try again.'));
        }
        $menus = $this->MenuItems->Menus->find('list', ['limit' => 200]);
        $files = $this->MenuItems->Files->find('list', ['limit' => 200]);
        $this->set(compact('menuItem', 'menus', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuItem = $this->MenuItems->get($id);
        if ($this->MenuItems->delete($menuItem)) {
            $this->Flash->success(__('The menu item has been deleted.'));
        } else {
            $this->Flash->error(__('The menu item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
