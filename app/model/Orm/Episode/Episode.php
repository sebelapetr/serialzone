<?php

namespace Serialzone\Model;



use Nextras\Orm\Entity\Entity;

/**
 * Class Episode
 * @package Serialzone\Model
 * @property int $id {primary}
 * @property string $name
 * @property string|NULL $description
 * @property Serie $serie {m:1 Serie::$episodes}
 */
class Episode extends Entity{

}