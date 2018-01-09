<?php
namespace Authenticator\Controller;

use Authenticator\Controller\AppController;

/**
 * Locales Controller
 *
 * @property \Authenticator\Model\Table\LocalesTable $Locales
 *
 * @method \Authenticator\Model\Entity\Locale[] paginate($object = null, array $settings = [])
 */
class LocalesController extends AppController
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
        if (strtolower($role['title']) == 'administrator' and in_array($action, ['changeLanguage'])) {
            return true;

            //Verifica se o usuário é usuario e está nas actions do array, permite o acesso das actions inclusas
        } elseif (strtolower($role['title']) == 'user' and in_array($action, ['changeLanguage'])) {
            return true;

            //Se nenhuma das condições foram True, nega o acesso
        } else {
            return false;
        }

        //Aqui vai alguma validação caso necessário...
    }

    public function changeLanguage($lang){
        $this->Cookie->config([
            'expiration' => '99 years',
            'httpOnly' => true
        ]);

        $this->Cookie->write('sys_locale', $lang);
        return $this->redirect($this->referer());
    }
}
