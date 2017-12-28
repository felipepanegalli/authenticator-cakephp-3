<?php
namespace Authenticator\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\I18n\I18n;

/**
 * Locales component
 */
class LocalesComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $components = ['Cookie'];
    public function initialize(array $config)
    {
        $locale = $config['user_preference'] ?? null;
        $localeExists = $this->Cookie->check('sys_locale');

        if ($localeExists) {
            $locale = $this->Cookie->read('sys_locale');
        }

        if ($locale) {
            I18n::locale($locale);
        }
    }
}
