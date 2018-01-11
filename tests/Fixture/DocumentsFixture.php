<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentsFixture
 *
 */
class DocumentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 36, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'sender_id' => ['type' => 'string', 'length' => 36, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'recipient_id' => ['type' => 'string', 'length' => 36, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'work_package_id' => ['type' => 'string', 'length' => 36, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'filelink' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'docref' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'subject' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'contents' => ['type' => 'text', 'length' => 16777215, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'docdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'issuedate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'receivedate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'confidential' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'references' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'replyreq' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
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
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => '071dd2d1-64a9-4986-9174-8c8de769f278',
            'sender_id' => 'Lorem ipsum dolor sit amet',
            'recipient_id' => 'Lorem ipsum dolor sit amet',
            'work_package_id' => 'Lorem ipsum dolor sit amet',
            'filelink' => 'Lorem ipsum dolor sit amet',
            'docref' => 'Lorem ipsum dolor sit amet',
            'subject' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'contents' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'docdate' => '2016-06-27',
            'issuedate' => '2016-06-27',
            'receivedate' => '2016-06-27',
            'confidential' => 1,
            'references' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'replyreq' => 1
        ],
    ];
}
