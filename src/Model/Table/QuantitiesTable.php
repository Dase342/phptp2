<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quantities Model
 *
 * @property \App\Model\Table\MenuItemsTable&\Cake\ORM\Association\BelongsTo $MenuItems
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsToMany $Orders
 *
 * @method \App\Model\Entity\Quantity get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quantity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Quantity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quantity|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quantity saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quantity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quantity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quantity findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuantitiesTable extends Table
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

        $this->setTable('quantities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MenuItems', [
            'foreignKey' => 'menu_item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Orders', [
            'foreignKey' => 'quantity_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'orders_quantities'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        return $validator;
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
        $rules->add($rules->existsIn(['menu_item_id'], 'MenuItems'));

        return $rules;
    }
}
