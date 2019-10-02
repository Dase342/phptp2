<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MenuItems Model
 *
 * @property \App\Model\Table\MenusTable&\Cake\ORM\Association\BelongsTo $Menus
 * @property \App\Model\Table\QuantitiesTable&\Cake\ORM\Association\BelongsToMany $Quantities
 *
 * @method \App\Model\Entity\MenuItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\MenuItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MenuItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MenuItemsTable extends Table
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

        $this->setTable('menu_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Quantities', [
            'foreignKey' => 'menu_item_id',
            'targetForeignKey' => 'quantity_id',
            'joinTable' => 'menu_items_quantities'
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
            ->scalar('menu_item_name')
            ->maxLength('menu_item_name', 255)
            ->requirePresence('menu_item_name', 'create')
            ->notEmptyString('menu_item_name');

        $validator
            ->numeric('menu_item_price')
            ->requirePresence('menu_item_price', 'create')
            ->notEmptyString('menu_item_price');

        $validator
            ->scalar('menu_item_description')
            ->maxLength('menu_item_description', 255)
            ->allowEmptyString('menu_item_description');

        $validator
            ->scalar('other_details')
            ->maxLength('other_details', 255)
            ->allowEmptyString('other_details');

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
        $rules->add($rules->existsIn(['menu_id'], 'Menus'));

        return $rules;
    }
}
