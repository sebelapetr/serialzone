<?php

namespace Serialzone\Model;

use Nextras\Orm\Repository\Repository;

class UsersRepository extends Repository{

    /**
     * Returns possible entity class names for current repository.
     * @return string[]
     */
    public static function getEntityClassNames(): array
    {
        return [User::Class];
    }

    public function getByEmail($email){
        return $this->getBy(['email' => $email]);
    }
}