<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empleado Entity
 *
 * @property int $id
 * @property int|null $area_id
 * @property int|null $cargo_id
 * @property string|null $empleado
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $deleted
 *
 * @property \App\Model\Entity\Area $area
 * @property \App\Model\Entity\Cargo $cargo
 */
class Empleado extends Entity
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
        'area_id' => true,
        'cargo_id' => true,
        'empleado' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'area' => true,
        'cargo' => true
    ];
}
