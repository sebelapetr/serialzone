<?php

namespace Serialzone\Model;

use Nette\Security\Passwords;
use Tracy\Debugger;

class UserRegistrationService{

    /** @var Orm */
    private $orm;

    public function __construct(Orm $orm)
    {
        $this->orm = $orm;
    }

    public function registerUser($name, $password, $email){
        $user = $this->orm->users->getByEmail($email);
        if ($user !== NULL){
            throw new \Exception();
        }
            $user = new User();
            $user->name = $name;
            $user->password = Passwords::hash($password);
            $user->email = $email;
            $this->orm->persistAndFlush($user);
            Debugger::barDump($user);
    }
}