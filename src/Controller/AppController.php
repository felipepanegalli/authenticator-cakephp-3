<?php

namespace Authenticator\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Authenticator.Locales');
        $this->loadComponent('Cookie');

        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'loginAction' => [
                'plugin' => 'Authenticator',
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Authenticator.Users'
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        $this->Auth->allow(['display', 'login', 'logout']);
        $this->set('user', $this->Auth->user());
    }

    //Nega o acesso a todos os controllers
    public function isAuthorized($user)
    {
        // By default deny access.
        return false;
    }

    public function beforeRender(Event $event)
    {
        date_default_timezone_set('America/Sao_Paulo');
    }
}
