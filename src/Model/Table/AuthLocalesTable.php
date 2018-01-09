<?php
namespace Authenticator\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuthLocales Model
 *
 * @method \Authenticator\Model\Entity\AuthLocale get($primaryKey, $options = [])
 * @method \Authenticator\Model\Entity\AuthLocale newEntity($data = null, array $options = [])
 * @method \Authenticator\Model\Entity\AuthLocale[] newEntities(array $data, array $options = [])
 * @method \Authenticator\Model\Entity\AuthLocale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Authenticator\Model\Entity\AuthLocale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Authenticator\Model\Entity\AuthLocale[] patchEntities($entities, array $data, array $options = [])
 * @method \Authenticator\Model\Entity\AuthLocale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthLocalesTable extends Table
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

        $this->setTable('auth_locales');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
