<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Letter Entity.
 *
 * @property string $id
 * @property string $sender_id
 * @property \App\Model\Entity\Sender $sender
 * @property string $recipient_id
 * @property \App\Model\Entity\Recipient $recipient
 * @property string $work_package_id
 * @property \App\Model\Entity\WorkPackage $work_package
 * @property string $filelink
 * @property string $docref
 * @property string $subject
 * @property string $contents
 * @property \Cake\I18n\Time $docdate
 * @property \Cake\I18n\Time $issuedate
 * @property \Cake\I18n\Time $receivedate
 * @property bool $confidential
 * @property string $references
 * @property bool $replyreq
 */
class Letter extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
