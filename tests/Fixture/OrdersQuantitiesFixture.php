<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersQuantitiesFixture
 */
class OrdersQuantitiesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'order_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'order_id' => ['type' => 'index', 'columns' => ['order_id'], 'length' => []],
            'menu_item_id' => ['type' => 'index', 'columns' => ['quantity_id'], 'length' => []],
            'quantity_id' => ['type' => 'index', 'columns' => ['quantity_id'], 'length' => []],
            'order_id_2' => ['type' => 'index', 'columns' => ['order_id'], 'length' => []],
            'quantity_id_2' => ['type' => 'index', 'columns' => ['quantity_id'], 'length' => []],
        ],
        '_constraints' => [
            'orders_quantities_ibfk_2' => ['type' => 'foreign', 'columns' => ['order_id'], 'references' => ['orders', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'orders_quantities_ibfk_3' => ['type' => 'foreign', 'columns' => ['quantity_id'], 'references' => ['quantities', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'order_id' => 1,
                'quantity_id' => 1
            ],
        ];
        parent::init();
    }
}
