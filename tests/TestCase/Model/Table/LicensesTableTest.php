<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LicensesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LicensesTable Test Case
 */
class LicensesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LicensesTable
     */
    public $Licenses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.licenses',
        'app.license_partners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Licenses') ? [] : ['className' => LicensesTable::class];
        $this->Licenses = TableRegistry::getTableLocator()->get('Licenses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Licenses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
