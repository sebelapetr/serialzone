<?php

namespace Serialzone\Model;

use Nette\Security\Passwords;
use Tracy\Debugger;

class ExportSerialService {

    /** @var Orm */
    private $orm;

    public function __construct(Orm $orm)
    {
        $this->orm = $orm;
    }

    public function exportSerial($xml)
    {
        $serials = $this->orm->serial;
        Debugger::barDump($serials);

    }

}