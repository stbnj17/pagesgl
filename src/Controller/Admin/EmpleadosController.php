<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Empleados Controller
 *
 * @property \App\Model\Table\EmpleadosTable $Empleados
 *
 * @method \App\Model\Entity\Empleado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpleadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Areas', 'Cargos']
        ];
        $empleados = $this->paginate($this->Empleados->find('all', ['conditions' => 'Empleados.deleted IS NULL']));

        $this->set(compact('empleados'));
    }

    /**
     * View method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empleado = $this->Empleados->get($id, [
            'contain' => ['Areas', 'Cargos']
        ]);

        $this->set('empleado', $empleado);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empleado = $this->Empleados->newEntity();
        if ($this->request->is('post')) {
            $empleado = $this->Empleados->patchEntity($empleado, $this->request->getData());
            if ($this->Empleados->save($empleado)) {
                $this->Flash->success(__('The {0} has been saved.', 'Empleado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Empleado'));
        }
        $areas = $this->Empleados->Areas->find('list', ['limit' => 200]);
        $cargos = $this->Empleados->Cargos->find('list', ['limit' => 200]);
        $this->set(compact('empleado', 'areas', 'cargos'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empleado = $this->Empleados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empleado = $this->Empleados->patchEntity($empleado, $this->request->getData());
            if ($this->Empleados->save($empleado)) {
                $this->Flash->success(__('The {0} has been saved.', 'Empleado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Empleado'));
        }
        $areas = $this->Empleados->Areas->find('list', ['limit' => 200]);
        $cargos = $this->Empleados->Cargos->find('list', ['limit' => 200]);
        $this->set(compact('empleado', 'areas', 'cargos'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empleado = $this->Empleados->get($id);
        if ($this->Empleados->delete($empleado)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Empleado'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Empleado'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Remove method
     *
     * @param string|null $id Empleado id.
     * @return \Cake\Http\Response|null Redirects on successful remove, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function remove($id = null)
    {
        $empleado = $this->Empleados->get($id);
        $empleado->deleted = 1;

        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Empleados->save($empleado)) {
                $this->Flash->success(__('The {0} has been removed.', 'Empleado'));
            } else {
                $this->Flash->error(__('The {0} could not be removed. Please, try again.', 'Empleado'));
            }

            return $this->redirect(['action' => 'index']);
        }
    }
}
