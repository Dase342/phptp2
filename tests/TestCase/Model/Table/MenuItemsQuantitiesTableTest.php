<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuItemsQuantitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuItemsQuantitiesTable Test Case
 */
class MenuItemsQuantitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MenuItemsQuantitiesTable
     */
    public $MenuItemsQuantities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MenuItemsQuantities',
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
        $config = TableRegistry::getTableLocator()->exists('MenuItemsQuantities') ? [] : ['className' => MenuItemsQuantitiesTable::class];
        $this->MenuItemsQuantities = TableRegistry::getTableLocator()->get('MenuItemsQuantities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MenuItemsQuantities);

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
