<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quantity Entity
 *
 * @property int $id
 * @property int $menu_item_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\MenuItem $menu_item
 * @property \App\Model\Entity\Order[] $orders
 */
class Quantity extends Entity
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
        'menu_item_id' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'menu_item' => true,
        'orders' => true
    ];
}
