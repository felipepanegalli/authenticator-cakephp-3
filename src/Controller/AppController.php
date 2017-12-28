<?php

namespace Authenticator\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{

    public function beforeRender(Event $event)
    {
        date_default_timezone_set('America/Sao_Paulo');
    }
}
