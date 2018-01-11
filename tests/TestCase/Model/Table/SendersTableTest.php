<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SendersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SendersTable Test Case
 */
class SendersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SendersTable
     */
    public $Senders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.senders',
        'app.documents',
        'app.recipients',
        'app.work_packages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Senders') ? [] : ['className' => 'App\Model\Table\SendersTable'];
        $this->Senders = TableRegistry::get('Senders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Senders);

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
