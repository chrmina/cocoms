<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkPackagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkPackagesTable Test Case
 */
class WorkPackagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkPackagesTable
     */
    public $WorkPackages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.work_packages',
        'app.documents',
        'app.senders',
        'app.recipients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WorkPackages') ? [] : ['className' => 'App\Model\Table\WorkPackagesTable'];
        $this->WorkPackages = TableRegistry::get('WorkPackages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkPackages);

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
