<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Cargos Controller
 *
 * @property \App\Model\Table\CargosTable $Cargos
 *
 * @method \App\Model\Entity\Cargo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CargosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $cargos = $this->paginate($this->Cargos->find('all', ['conditions' => 'Cargos.deleted IS NULL']));

        $this->set(compact('cargos'));
    }

    /**
     * View method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cargo = $this->Cargos->get($id, [
            'contain' => ['Empleados']
        ]);

        $this->set('cargo', $cargo);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cargo = $this->Cargos->newEntity();
        if ($this->request->is('post')) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('The {0} has been saved.', 'Cargo'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Cargo'));
        }
        $this->set(compact('cargo'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cargo = $this->Cargos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('The {0} has been saved.', 'Cargo'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Cargo'));
        }
        $this->set(compact('cargo'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cargo = $this->Cargos->get($id);
        if ($this->Cargos->delete($cargo)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Cargo'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Cargo'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Remove method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null Redirects on successful remove, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function remove($id = null)
    {
        $cargo = $this->Cargos->get($id);
        $cargo->deleted = 1;

        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('The {0} has been removed.', 'Cargo'));
            } else {
                $this->Flash->error(__('The {0} could not be removed. Please, try again.', 'Cargo'));
            }

            return $this->redirect(['action' => 'index']);
        }
    }
}
