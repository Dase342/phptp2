<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MenuItemsQuantities Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\QuantitiesTable&\Cake\ORM\Association\BelongsTo $Quantities
 *
 * @method \App\Model\Entity\MenuItemsQuantity get($primaryKey, $options = [])
 * @method \App\Model\Entity\MenuItemsQuantity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MenuItemsQuantity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MenuItemsQuantity|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuItemsQuantity saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuItemsQuantity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MenuItemsQuantity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MenuItemsQuantity findOrCreate($search, callable $callback = null, $options = [])
 */
class MenuItemsQuantitiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('menu_items_quantities');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Quantities', [
            'foreignKey' => 'quantity_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['quantity_id'], 'Quantities'));

        return $rules;
    }
}
