<?php

namespace Serialzone\Model;

/**
 * Class Serial
 * @package Serialzone\Model
 * @property int $id {primary}
 * @property string $name
 * @property string|NULL $description
 * @property Serie[] $serie {1:m Serie::$serial}
 */
use Nextras\Orm\Entity\Entity;

class Serial extends Entity{}