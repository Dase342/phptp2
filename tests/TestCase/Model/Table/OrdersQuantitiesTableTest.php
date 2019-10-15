<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersQuantitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersQuantitiesTable Test Case
 */
class OrdersQuantitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersQuantitiesTable
     */
    public $OrdersQuantities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrdersQuantities',
        'app.Orders',
        'app.Quantities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrdersQuantities') ? [] : ['className' => OrdersQuantitiesTable::class];
        $this->OrdersQuantities = TableRegistry::getTableLocator()->get('OrdersQuantities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrdersQuantities);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
