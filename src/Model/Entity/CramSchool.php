<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CramSchool Entity
 *
 * @property int $id
 * @property int $disp_no
 * @property int $is_valid
 * @property string $name
 * @property string $login_id
 * @property string $password
 * @property string $tel
 * @property string $zip
 * @property string $address
 * @property string $memo
 * @property string $host
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Class[] $classes
 * @property \App\Model\Entity\Student[] $students
 * @property \App\Model\Entity\User[] $users
 */
class CramSchool extends Entity
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
        'disp_no' => true,
        'is_valid' => true,
        'name' => true,
        'login_id' => true,
        'password' => true,
        'tel' => true,
        'zip' => true,
        'address' => true,
        'memo' => true,
        'host' => true,
        'created' => true,
        'modified' => true,
        'classes' => true,
        'students' => true,
        'users' => true
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
