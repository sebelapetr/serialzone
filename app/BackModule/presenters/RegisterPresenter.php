<?php

namespace Serialzone\BackModule\Presenters;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Serialzone\BackModule\Forms\IRegisterFormFactory;
use Serialzone\Model\Orm;

class RegisterPresenter extends BasePresenter{

    /**
     * @var IRegisterFormFactory
     */
    public $registerFormFactory;

    public function __construct(Orm $orm, IRegisterFormFactory $registerFormFactory)
    {
        parent::__construct($orm);
        $this->registerFormFactory = $registerFormFactory;
    }

    public function renderDefault(){
        $this->getTemplate()->setFile(__DIR__  .  "/../templates/Register/default.latte");
    }


    protected function createComponentRegisterForm(){
        return $this->registerFormFactory->create();
    }
}
