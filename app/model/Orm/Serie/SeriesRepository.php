<?php

namespace Serialzone\Model;

use Nextras\Orm\Repository\Repository;

class SeriesRepository extends Repository{

    /**
     * Returns possible entity class names for current repository.
     * @return string[]
     */
    public static function getEntityClassNames(): array
    {
        return [Serie::class];
    }
}