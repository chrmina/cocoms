<?php
namespace App\Model\Table;

use App\Model\Entity\Letter;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
// Search Plugin
use Search\Manager;

/**
 * Documents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Senders
 * @property \Cake\ORM\Association\BelongsTo $Recipients
 * @property \Cake\ORM\Association\BelongsTo $WorkPackages
 */
class LettersTable extends Table
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

        $this->table('letters');
        $this->displayField('subject');
        $this->primaryKey('id');

        $this->addBehavior('Muffin/Tags.Tag');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'filelink' => [
              'keepFilesOnDelete' => false,
              'path' => 'webroot{DS}files{DS}{model}{DS}',
              'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'file_dir', // defaults to `dir`
                    'size' => 'file_size', // defaults to `size`
                    'type' => 'file_type', // defaults to `type`
              ],
            ],
        ]);

        $this->belongsTo('Senders', [
            'foreignKey' => 'sender_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Recipients', [
            'foreignKey' => 'recipient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('WorkPackages', [
            'foreignKey' => 'work_package_id',
            'joinType' => 'INNER'
        ]);

        // Search behavior
        $this->addBehavior('Search.Search');
        // Setup search filter using search manager
        $this->searchManager()
            ->value('sender_id', [
              'filterEmpty' => true
            ])
            ->value('recipient_id', [
              'filterEmpty' => true
            ])
            ->value('work_package_id', [
              'filterEmpty' => true
            ])
            // Here we will alias the 'q' query param to search the `Articles.title`
            // field and the `Articles.content` field, using a LIKE match, with `%`
            // both before and after.
            ->add('q', 'Search.Like', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['subject', 'contents', 'docref']
            ])
            ->add('foo', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    // Modify $query as required
                }
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
      $validator->provider('upload', \Josegonzalez\Upload\Validation\UploadValidation::class);

      $validator->add('filelink', 'filelinkUnique', [
        'rule' => ['isFileUnique'],
        'message' => 'This file already exists in the database.',
        'provider' => 'upload'
      ]);

      $validator
        ->allowEmpty('filelink');

      $validator
        ->allowEmpty('docref');

      $validator
        ->requirePresence('subject', 'create')
        ->notEmpty('subject');

      $validator
        ->allowEmpty('contents');

      $validator
        ->date('docdate')
        ->allowEmpty('docdate');

      $validator
        ->boolean('confidential')
        ->allowEmpty('confidential');

      $validator
        ->allowEmpty('refs');

      $validator
        ->boolean('replyreq')
        ->allowEmpty('replyreq');

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
        $rules->add($rules->existsIn(['sender_id'], 'Senders'));
        $rules->add($rules->existsIn(['recipient_id'], 'Recipients'));
        $rules->add($rules->existsIn(['work_package_id'], 'WorkPackages'));
        //$rules->add($rules->isUnique(['filelink']));
        return $rules;
    }
}
