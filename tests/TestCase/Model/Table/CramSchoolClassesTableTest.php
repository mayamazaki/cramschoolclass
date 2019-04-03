<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CramSchoolClassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CramSchoolClassesTable Test Case
 */
class CramSchoolClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CramSchoolClassesTable
     */
    public $CramSchoolClasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cram_school_classes',
        'app.cram_schools',
        'app.logins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CramSchoolClasses') ? [] : ['className' => CramSchoolClassesTable::class];
        $this->CramSchoolClasses = TableRegistry::getTableLocator()->get('CramSchoolClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CramSchoolClasses);

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
