<?php
namespace Authenticator\Controller;

use Authenticator\Controller\AppController;

/**
 * AuthUsers Controller
 *
 * @property \Authenticator\Model\Table\AuthUsersTable $AuthUsers
 *
 * @method \Authenticator\Model\Entity\AuthUser[] paginate($object = null, array $settings = [])
 */
class AuthUsersController extends AppController
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

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if ($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Username or password is invalid, try again!'));
        }
        $this->viewBuilder()->setLayout('login');
    }

    public function logout(){
        $this->Flash->success(__('You are now logged out.'));
        return $this->redirect($this->Auth->logout());
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AuthLocales', 'AuthRoles']
        ];
        $authUsers = $this->paginate($this->AuthUsers);

        $this->set(compact('authUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Auth User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $authUser = $this->AuthUsers->get($id, [
            'contain' => ['AuthLocales', 'AuthRoles']
        ]);

        $this->set('authUser', $authUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authUser = $this->AuthUsers->newEntity();
        if ($this->request->is('post')) {
            $authUser = $this->AuthUsers->patchEntity($authUser, $this->request->getData());
            if ($this->AuthUsers->save($authUser)) {
                $this->Flash->success(__('The auth user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auth user could not be saved. Please, try again.'));
        }
        $authLocales = $this->AuthUsers->AuthLocales->find('list', ['limit' => 200]);
        $authRoles = $this->AuthUsers->AuthRoles->find('list', ['limit' => 200]);
        $this->set(compact('authUser', 'authLocales', 'authRoles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Auth User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $authUser = $this->AuthUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $authUser = $this->AuthUsers->patchEntity($authUser, $this->request->getData());
            if ($this->AuthUsers->save($authUser)) {
                $this->Flash->success(__('The auth user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auth user could not be saved. Please, try again.'));
        }
        $authLocales = $this->AuthUsers->AuthLocales->find('list', ['limit' => 200]);
        $authRoles = $this->AuthUsers->AuthRoles->find('list', ['limit' => 200]);
        $this->set(compact('authUser', 'authLocales', 'authRoles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Auth User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $authUser = $this->AuthUsers->get($id);
        if ($this->AuthUsers->delete($authUser)) {
            $this->Flash->success(__('The auth user has been deleted.'));
        } else {
            $this->Flash->error(__('The auth user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
