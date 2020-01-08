<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Area Entity
 *
 * @property int $id
 * @property int|null $area_id
 * @property string|null $area
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $deleted
 *
 * @property \App\Model\Entity\Area[] $areas
 * @property \App\Model\Entity\Empleado[] $empleados
 */
class Area extends Entity
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
        'area' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'areas' => true,
        'empleados' => true
    ];
}
