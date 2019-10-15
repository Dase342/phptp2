<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdersQuantities Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\QuantitiesTable&\Cake\ORM\Association\BelongsTo $Quantities
 *
 * @method \App\Model\Entity\OrdersQuantity get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdersQuantity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrdersQuantity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdersQuantity|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdersQuantity saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdersQuantity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersQuantity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersQuantity findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersQuantitiesTable extends Table
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

        $this->setTable('orders_quantities');

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
