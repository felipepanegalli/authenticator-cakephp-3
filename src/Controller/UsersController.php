<?php

namespace Authenticator\Controller;

use Authenticator\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \Authenticator\Model\Table\UsersTable $Users
 *
 * @method \Authenticator\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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
            'contain' => ['Locales', 'Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Locales', 'Roles']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $locales = $this->Users->Locales->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'locales', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $locales = $this->Users->Locales->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'locales', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
