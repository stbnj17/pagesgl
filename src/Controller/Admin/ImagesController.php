<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts']
        ];
        $images = $this->paginate($this->Images->find('all', ['conditions' => 'Images.deleted IS NULL']));

        $this->set(compact('images'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('image', $image);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $image = $this->Images->newEntity();
        if ($this->request->is('post')) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The {0} has been saved.', 'Image'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Image'));
        }
        $posts = $this->Images->Posts->find('list', ['limit' => 200]);
        $this->set(compact('image', 'posts'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The {0} has been saved.', 'Image'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Image'));
        }
        $posts = $this->Images->Posts->find('list', ['limit' => 200]);
        $this->set(compact('image', 'posts'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Image'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Image'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Remove method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects on successful remove, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function remove($id = null)
    {
        $image = $this->Images->get($id);
        $image->deleted = 1;

        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The {0} has been removed.', 'Image'));
            } else {
                $this->Flash->error(__('The {0} could not be removed. Please, try again.', 'Image'));
            }

            return $this->redirect(['action' => 'index']);
        }
    }
}
