<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MenuItem Entity
 *
 * @property int $id
 * @property int $menu_id
 * @property string $menu_item_name
 * @property float $menu_item_price
 * @property string|null $menu_item_description
 * @property string|null $other_details
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 * @property int $files_id
 *
 * @property \App\Model\Entity\Menu $menu
 * @property \App\Model\Entity\Quantity[] $quantities
 */
class MenuItem extends Entity
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
        'menu_id' => true,
        'menu_item_name' => true,
        'menu_item_price' => true,
        'menu_item_description' => true,
        'other_details' => true,
        'created' => true,
        'modified' => true,
        'files_id' => true,
        'menu' => true,
        'quantities' => true
    ];
}
