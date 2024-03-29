<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdersQuantity Entity
 *
 * @property int $order_id
 * @property int $quantity_id
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Quantity $quantity
 */
class OrdersQuantity extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id' => true,
        'order_id' => true,
        'quantity_id' => true,
        'order' => true,
        'quantity' => true
    ];
}
