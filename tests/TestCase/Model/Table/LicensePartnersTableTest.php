<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LicensePartnersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LicensePartnersTable Test Case
 */
class LicensePartnersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LicensePartnersTable
     */
    public $LicensePartners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.license_partners',
        'app.licenses',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LicensePartners') ? [] : ['className' => LicensePartnersTable::class];
        $this->LicensePartners = TableRegistry::getTableLocator()->get('LicensePartners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LicensePartners);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
