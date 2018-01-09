<?php
namespace Authenticator\Test\TestCase\Model\Table;

use Authenticator\Model\Table\AuthLocalesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Authenticator\Model\Table\AuthLocalesTable Test Case
 */
class AuthLocalesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Authenticator\Model\Table\AuthLocalesTable
     */
    public $AuthLocales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.authenticator.auth_locales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthLocales') ? [] : ['className' => AuthLocalesTable::class];
        $this->AuthLocales = TableRegistry::get('AuthLocales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthLocales);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
