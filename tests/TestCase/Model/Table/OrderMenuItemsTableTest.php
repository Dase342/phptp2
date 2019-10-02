<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderMenuItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderMenuItemsTable Test Case
 */
class OrderMenuItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderMenuItemsTable
     */
    public $OrderMenuItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrderMenuItems',
        'app.Orders',
        'app.MenuItems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrderMenuItems') ? [] : ['className' => OrderMenuItemsTable::class];
        $this->OrderMenuItems = TableRegistry::getTableLocator()->get('OrderMenuItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderMenuItems);

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
