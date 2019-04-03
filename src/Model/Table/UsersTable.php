<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CramSchoolsTable|\Cake\ORM\Association\BelongsTo $CramSchools
 * @property \App\Model\Table\LicensePartnersTable|\Cake\ORM\Association\HasMany $LicensePartners
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\HasMany $Students
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CramSchools', [
            'foreignKey' => 'cram_school_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('LicensePartners', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'user_id'
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

        // ユーザー名
        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->maxLength('name', 255, 'ユーザー名は255文字以内で入力してください。')
            ->notEmpty('name', 'ユーザー名を入力してください。');

        // 音声タイプ
        $validator
            ->scalar('voice_type')
            ->requirePresence('voice_type', 'create')
            ->notEmpty('voice_type', '音声タイプを選択してください。');

        // 生年月日
        $validator
            ->scalar('birthday')
            ->allowEmpty('birthday')
            ->add('birthday', 'date_format', [
                'rule' => ['date', "ymd"],
                'message' => '生年月日の日付形式が不正です。'
            ]);

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

        // 塾
        $validator
            ->scalar('cram_school_id')
            ->requirePresence('cram_school_id', 'create')
            ->notEmpty('cram_school_id', '塾を選択してください。');

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
        $rules->add($rules->existsIn(['cram_school_id'], 'CramSchools'));
        return $rules;
    }
}
