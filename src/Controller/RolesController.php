<?php
namespace Authenticator\Controller;

use Authenticator\Controller\AppController;

/**
 * Roles Controller
 *
 * @property \Authenticator\Model\Table\RolesTable $Roles
 *
 * @method \Authenticator\Model\Entity\Role[] paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    public function isAuthorized($user)
    {
        //Verifica qual é a action
        $action = $this->request->getParam('action');
        //Carrega o Model de Regras
        $this->loadModel('AuthRoles');
        //Carrega a ragra baseado na role_id do usuário
        $role = $this->AuthRoles->find()->where(['id' => $this->Auth->user('role_id')])->first();
        //Verifica se o usuário é administrador e está nas actions do array, permite o acesso das actions inclusas
        if (strtolower($role['title']) == 'administrator' and in_array($action, ['index', 'view', 'add', 'edit', 'delete'])) {
            return true;

            //Verifica se o usuário é usuario e está nas actions do array, permite o acesso das actions inclusas
        } elseif (strtolower($role['title']) == 'user' and in_array($action, ['index', 'view'])) {
            return true;

            //Se nenhuma das condições foram True, nega o acesso
        } else {
            return false;
        }

        //Aqui vai alguma validação caso necessário...
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('role', $role);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
