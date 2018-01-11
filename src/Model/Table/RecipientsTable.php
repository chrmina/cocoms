<?php
namespace App\Model\Table;

use App\Model\Entity\Recipient;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipients Model
 *
 * @property \Cake\ORM\Association\HasMany $Documents
 */
class RecipientsTable extends Table
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

        $this->table('recipients');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Letters', [
            'foreignKey' => 'recipient_id'
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
            ->allowEmpty('id', 'create');

        $validator
        ->requirePresence('name', 'create')
        ->notEmpty('name');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('representative');

        $validator
            ->allowEmpty('contact');

        $validator
            ->allowEmpty('telephone');

        $validator
            ->allowEmpty('mobile');

        $validator
            ->allowEmpty('fax');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');

        $validator
            ->allowEmpty('remarks');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
