<?php
namespace Authenticator\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuthUsers Model
 *
 * @property \Authenticator\Model\Table\AuthLocalesTable|\Cake\ORM\Association\BelongsTo $AuthLocales
 * @property \Authenticator\Model\Table\AuthRolesTable|\Cake\ORM\Association\BelongsTo $AuthRoles
 *
 * @method \Authenticator\Model\Entity\AuthUser get($primaryKey, $options = [])
 * @method \Authenticator\Model\Entity\AuthUser newEntity($data = null, array $options = [])
 * @method \Authenticator\Model\Entity\AuthUser[] newEntities(array $data, array $options = [])
 * @method \Authenticator\Model\Entity\AuthUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Authenticator\Model\Entity\AuthUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Authenticator\Model\Entity\AuthUser[] patchEntities($entities, array $data, array $options = [])
 * @method \Authenticator\Model\Entity\AuthUser findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthUsersTable extends Table
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

        $this->setTable('auth_users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AuthLocales', [
            'foreignKey' => 'locale_id',
            'joinType' => 'INNER',
            'className' => 'Authenticator.AuthLocales'
        ]);
        $this->belongsTo('AuthRoles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
            'className' => 'Authenticator.AuthRoles'
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
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmpty('phone');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['locale_id'], 'AuthLocales'));
        $rules->add($rules->existsIn(['role_id'], 'AuthRoles'));

        return $rules;
    }
}
