<?php
namespace Authenticator\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuthUser Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int $locale_id
 * @property int $role_id
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Authenticator\Model\Entity\AuthLocale $auth_locale
 * @property \Authenticator\Model\Entity\AuthRole $auth_role
 */
class AuthUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'name' => true,
        'email' => true,
        'phone' => true,
        'locale_id' => true,
        'role_id' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'auth_locale' => true,
        'auth_role' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
