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
        // By default deny access.
        return true;
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
