<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recipient Entity.
 *
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $representative
 * @property string $contact
 * @property string $telephone
 * @property string $mobile
 * @property string $fax
 * @property string $email
 * @property string $remarks
 * @property \App\Model\Entity\Document[] $documents
 */
class Recipient extends Entity
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
