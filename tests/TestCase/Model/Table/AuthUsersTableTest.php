<?php
namespace Authenticator\Test\TestCase\Model\Table;

use Authenticator\Model\Table\AuthUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Authenticator\Model\Table\AuthUsersTable Test Case
 */
class AuthUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Authenticator\Model\Table\AuthUsersTable
     */
    public $AuthUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.authenticator.auth_users',
        'plugin.authenticator.auth_locales',
        'plugin.authenticator.auth_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthUsers') ? [] : ['className' => AuthUsersTable::class];
        $this->AuthUsers = TableRegistry::get('AuthUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthUsers);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
