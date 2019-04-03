<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CramSchoolsFixture
 *
 */
class CramSchoolsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '塾ID', 'autoIncrement' => true, 'precision' => null],
        'disp_no' => ['type' => 'smallinteger', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '表示順', 'precision' => null],
        'is_valid' => ['type' => 'tinyinteger', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '1', 'comment' => '有効無効フラグ（0.無効, 1.有効）', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '塾名称', 'precision' => null, 'fixed' => null],
        'login_id' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ログインID', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'パスワード', 'precision' => null, 'fixed' => null],
        'tel' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '電話番号', 'precision' => null, 'fixed' => null],
        'zip' => ['type' => 'string', 'fixed' => true, 'length' => 7, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '郵便番号', 'precision' => null],
        'address' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '住所', 'precision' => null, 'fixed' => null],
        'memo' => ['type' => 'string', 'length' => 3000, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'メモ', 'precision' => null, 'fixed' => null],
        'host' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'PC名、IP', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '登録日時', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '更新日時', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'login_id' => ['type' => 'unique', 'columns' => ['login_id'], 'length' => []],
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
                'name' => 'Lorem ipsum dolor sit amet',
                'login_id' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'tel' => 'Lorem ipsum dolor ',
                'zip' => 'Lorem',
                'address' => 'Lorem ipsum dolor sit amet',
                'memo' => 'Lorem ipsum dolor sit amet',
                'host' => 'Lorem ipsum dolor sit amet',
                'created' => '2018-10-02 08:38:32',
                'modified' => '2018-10-02 08:38:32'
            ],
        ];
        parent::init();
    }
}
