<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CramSchools Model
 *
 * @property \App\Model\Table\ClassesTable|\Cake\ORM\Association\HasMany $Classes
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\HasMany $Students
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\CramSchool get($primaryKey, $options = [])
 * @method \App\Model\Entity\CramSchool newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CramSchool[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CramSchool|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CramSchool|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CramSchool patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CramSchool[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CramSchool findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CramSchoolsTable extends Table
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

        $this->setTable('cram_schools');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Classes', [
            'foreignKey' => 'cram_school_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'cram_school_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'cram_school_id'
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
        // ID
        $validator
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        // 表示順
        $validator
            ->scalar('disp_no')
            ->allowEmpty('disp_no')
            ->add('disp_no', [
                    'naturalNumber' => [
                        'rule' => ['naturalNumber', true],
                        'message' => '表示順は数字で入力してください。'
            ]]);

        // 有効無効フラグ
        $validator
            ->scalar('is_valid')
            ->requirePresence('is_valid', 'create')
            ->notEmpty('is_valid', '有効無効フラグを選択してください。');

        // 塾名称
        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->maxLength('name', 255, '塾名称は255文字以内で入力してください。')
            ->notEmpty('name', '塾名称を入力してください。');

        // ログインID
        $validator
            ->scalar('login_id')
            ->notEmpty('login_id', 'ログインIDを入力してください。')
            ->minLength('login_id', 8, 'ログインIDは、8字以上で入力してください。')
            ->maxLength('login_id', 255, 'ログインIDは、255字以内で入力してください。')
            ->add('login_id', [
                    'alphaNumeric' => [
                        'rule' => function ($value, $context) {
                            return preg_match('/^[a-zA-Z0-9]+$/', $value) ? true : false;
                        },
                        'message' => 'ログインIDは、半角英数字で入力してください。'
            ]])
            ->add('login_id', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'ログインIDは既に登録されています。'
            ]);

        // パスワード
        $validator
            ->scalar('password')
            ->notEmpty('password', 'パスワードを入力してください。')
            ->minLength('password', 8, 'パスワードは、8字以上で入力してください。')
            ->maxLength('password', 255, 'パスワードは、255字以内で入力してください。');

        // 電話番号
        $validator
            ->scalar('tel')
            ->requirePresence('tel', 'create')
            ->notEmpty('tel', '電話番号を入力してください。')
            ->maxLength('tel', 20, '電話番号は20文字以内で入力してください。')
            ->add('tel', 'numeric', [
                'rule' => ['numeric', true],
                'message' => '電話番号が不正です。'
            ]);

        // 郵便番号
        $validator
            ->scalar('zip')
            ->allowEmpty('zip')
            ->add('zip', [
                'zip_format' => [
                    'rule' => function ($value) {
                        return (bool)preg_match('/^([0-9]{7})?$/i', $value);
                    },
                    'message' => '郵便番号が不正です。'
            ]]);

        // 住所
        $validator
            ->scalar('address')
            ->maxLength('address', 255, '住所は255文字以内で入力してください。')
            ->allowEmpty('address');

        // メモ
        $validator
            ->scalar('memo')
            ->maxLength('memo', 3000, 'メモは3000文字以内で入力してください。')
            ->allowEmpty('memo');

        // PC名、IP
        $validator
            ->scalar('host')
            ->maxLength('host', 255)
            ->allowEmpty('host');

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
        return $rules;
    }
}
