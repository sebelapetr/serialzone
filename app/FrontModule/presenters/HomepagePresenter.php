<?php

namespace Serialzone\FrontModule\Presenters;

use Serialzone\Model\Orm;

class HomepagePresenter extends BasePresenter{

    public function __construct(Orm $orm)
    {
        parent::__construct($orm);
    }

    public function renderDefault(){
        $this->getTemplate()->setFile(__DIR__ . "/../templates/Homepage/default.latte");
        $this->getTemplate()->serials = $this->orm->serials->findAll();
        $this->getTemplate()->series = $this->orm->series->findAll();
    }
}

