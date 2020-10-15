<?php

namespace Serialzone\Model;


/**
 * Class Serie
 * @package Serialzone\Model
 * @property int $id {primary}
 * @property string $name
 * @property Serial $serial {m:1 Serial::$serie}
 * @property Episode[] $episodes {1:m Episode::$serie}
 */

use Nextras\Orm\Entity\Entity;

class Serie extends Entity {

}