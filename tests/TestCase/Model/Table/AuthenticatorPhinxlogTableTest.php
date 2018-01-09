<?php
namespace Authenticator\Test\TestCase\Model\Table;

use Authenticator\Model\Table\AuthenticatorPhinxlogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Authenticator\Model\Table\AuthenticatorPhinxlogTable Test Case
 */
class AuthenticatorPhinxlogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Authenticator\Model\Table\AuthenticatorPhinxlogTable
     */
    public $AuthenticatorPhinxlog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.authenticator.authenticator_phinxlog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthenticatorPhinxlog') ? [] : ['className' => AuthenticatorPhinxlogTable::class];
        $this->AuthenticatorPhinxlog = TableRegistry::get('AuthenticatorPhinxlog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthenticatorPhinxlog);

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
