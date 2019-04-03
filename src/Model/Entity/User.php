<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property int $disp_no
 * @property int $is_valid
 * @property string $name
 * @property int $voice_type
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $login_id
 * @property string $password
 * @property int $cram_school_id
 * @property string $tel
 * @property string $zip
 * @property string $address
 * @property string $memo
 * @property string $host
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CramSchool $cram_school
 * @property \App\Model\Entity\LicensePartner[] $license_partners
 * @property \App\Model\Entity\Student[] $students
 */
class User extends Entity
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
        'voice_type' => true,
        'birthday' => true,
        'login_id' => true,
        'password' => true,
        'cram_school_id' => true,
        'tel' => true,
        'zip' => true,
        'address' => true,
        'memo' => true,
        'host' => true,
        'created' => true,
        'modified' => true,
        'cram_school' => true,
        'license_partners' => true,
        'students' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /**
     * パスワードのハッシュ化
     *
     */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher())->hash($password);
    }

}
