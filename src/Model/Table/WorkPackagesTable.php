<?php
namespace App\Model\Table;

use App\Model\Entity\WorkPackage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkPackages Model
 *
 * @property \Cake\ORM\Association\HasMany $Documents
 */
class WorkPackagesTable extends Table
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

        $this->table('work_packages');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Letters', [
            'foreignKey' => 'work_package_id'
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
        ->requirePresence('number', 'create')
        ->notEmpty('number');

        $validator
        ->requirePresence('name', 'create')
        ->notEmpty('name');

        $validator
            ->allowEmpty('wp_coordinator');

        $validator
            ->allowEmpty('wp_qs');

        return $validator;
    }
}
