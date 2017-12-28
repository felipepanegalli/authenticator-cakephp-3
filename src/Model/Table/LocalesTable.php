<?php
namespace Authenticator\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locales Model
 *
 * @property \Authenticator\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \Authenticator\Model\Entity\Locale get($primaryKey, $options = [])
 * @method \Authenticator\Model\Entity\Locale newEntity($data = null, array $options = [])
 * @method \Authenticator\Model\Entity\Locale[] newEntities(array $data, array $options = [])
 * @method \Authenticator\Model\Entity\Locale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Authenticator\Model\Entity\Locale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Authenticator\Model\Entity\Locale[] patchEntities($entities, array $data, array $options = [])
 * @method \Authenticator\Model\Entity\Locale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocalesTable extends Table
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

        $this->setTable('locales');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'locale_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 10)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
