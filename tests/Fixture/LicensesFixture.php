<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LicensesFixture
 *
 */
class LicensesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'ライセンスマスタID', 'autoIncrement' => true, 'precision' => null],
        'disp_no' => ['type' => 'smallinteger', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '表示順', 'precision' => null],
        'is_valid' => ['type' => 'tinyinteger', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '1', 'comment' => '有効無効フラグ（0.無効, 1.有効）', 'precision' => null],
        'license_code' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ライセンスコード', 'precision' => null, 'fixed' => null],
        'exp_s_dt' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ライセンス有効期間（開始日）', 'precision' => null],
        'exp_f_dt' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ライセンス有効期間（終了日）', 'precision' => null],
        'auth_datetime' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '認証日時', 'precision' => null],
        'auth_info1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '認証に絡む情報１（予備）', 'precision' => null, 'fixed' => null],
        'auth_info2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '認証に絡む情報２（予備）', 'precision' => null, 'fixed' => null],
        'auth_info3' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '認証に絡む情報３（予備）', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'disp_no' => 1,
                'is_valid' => 1,
                'license_code' => 'Lorem ipsum dolor sit amet',
                'exp_s_dt' => '2018-10-02',
                'exp_f_dt' => '2018-10-02',
                'auth_datetime' => '2018-10-02 08:38:13',
                'auth_info1' => 'Lorem ipsum dolor sit amet',
                'auth_info2' => 'Lorem ipsum dolor sit amet',
                'auth_info3' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
