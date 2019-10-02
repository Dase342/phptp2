<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserTypeTable Test Case
 */
class UserTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserTypeTable
     */
    public $UserType;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserType'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserType') ? [] : ['className' => UserTypeTable::class];
        $this->UserType = TableRegistry::getTableLocator()->get('UserType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserType);

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
