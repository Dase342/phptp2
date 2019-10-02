<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersMenuItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersMenuItemsTable Test Case
 */
class OrdersMenuItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersMenuItemsTable
     */
    public $OrdersMenuItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrdersMenuItems',
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
        $config = TableRegistry::getTableLocator()->exists('OrdersMenuItems') ? [] : ['className' => OrdersMenuItemsTable::class];
        $this->OrdersMenuItems = TableRegistry::getTableLocator()->get('OrdersMenuItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrdersMenuItems);

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
