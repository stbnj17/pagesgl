<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Areas Controller
 *
 * @property \App\Model\Table\AreasTable $Areas
 *
 * @method \App\Model\Entity\Area[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AreasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $areas = $this->Areas->find()
        ->select(['r.area',
                 'Areas.id',
                 'Areas.area_id',
                 'Areas.area',
                 'Areas.created',
                 'Areas.modified',
                 'Areas.deleted'
        ])
        ->join([
            'table' => 'areas',
            'alias' => 'r',
            'type' => 'LEFT',
            'conditions' => 'Areas.area_id = r.id'
        ])
        ->where('Areas.deleted IS NULL');
        /*$areas = $this->paginate($this->Areas->find('all', ['conditions' => 'Areas.deleted IS NULL']));*/

        $this->set(compact('areas'));
    }

    /**
     * View method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subareas = $this->paginate($this->Areas->find()
        ->where(['Areas.deleted IS NULL', 'Areas.area_id = '.$id]));

        $empleados = $this->paginate($this->Areas->Empleados->find()
        ->where(['Empleados.deleted IS NULL', 'Empleados.area_id = '.$id]));

        $area = $this->paginate($this->Areas->find()
        ->select(['r.area',
                 'Areas.id',
                 'Areas.area_id',
                 'Areas.area',
                 'Areas.created',
                 'Areas.modified',
                 'Areas.deleted'
        ])
        ->join([
            'table' => 'areas',
            'alias' => 'r',
            'type' => 'LEFT',
            'conditions' => 'Areas.area_id = r.id'
        ])
        ->where(['Areas.deleted IS NULL', 'Areas.id = '.$id]));

        $this->set('areas', ['area' => $area, 'subareas' => $subareas, 'empleados' => $empleados]);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $area = $this->Areas->newEntity();
        if ($this->request->is('post')) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The {0} has been saved.', 'Area'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Area'));
        }
        $areas = $this->Areas->Areas->find('list', ['limit' => 200]);
        $this->set(compact('area', 'areas'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The {0} has been saved.', 'Area'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Area'));
        }
        $areas = $this->Areas->Areas->find('list', ['limit' => 200]);
        $this->set(compact('area', 'areas'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $area = $this->Areas->get($id);
        if ($this->Areas->delete($area)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Area'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Area'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Remove method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null Redirects on successful remove, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function remove($id = null)
    {
        $area = $this->Areas->get($id);
        $area->deleted = 1;

        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The {0} has been removed.', 'Area'));
            } else {
                $this->Flash->error(__('The {0} could not be removed. Please, try again.', 'Area'));
            }

            return $this->redirect(['action' => 'index']);
        }
    }
}
