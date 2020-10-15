<?php

namespace Serialzone\BackModule\Presenters;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Serialzone\BackModule\Forms\IAddSerialFormFactory;
use Serialzone\Model\Orm;

class AddSerialPresenter extends BasePresenter{

    /**
     * @var IAddSerialFormFactory
     */
    public $addSerialFormFactory;

    public function __construct(Orm $orm, IAddSerialFormFactory $addSerialFormFactory)
    {
        parent::__construct($orm);
        $this->addSerialFormFactory = $addSerialFormFactory;
    }

    public function renderDefault(){
        $this->getTemplate()->setFile(__DIR__  .  "/../templates/AddSerial/default.latte");
    }


    protected function createComponentAddSerialForm(){
        return $this->addSerialFormFactory->create();
    }
}
