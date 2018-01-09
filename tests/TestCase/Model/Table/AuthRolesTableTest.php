<?php
namespace Authenticator\Test\TestCase\Model\Table;

use Authenticator\Model\Table\AuthRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Authenticator\Model\Table\AuthRolesTable Test Case
 */
class AuthRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Authenticator\Model\Table\AuthRolesTable
     */
    public $AuthRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('AuthRoles') ? [] : ['className' => AuthRolesTable::class];
        $this->AuthRoles = TableRegistry::get('AuthRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthRoles);

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
