<?php

namespace Serialzone\BackModule\Presenters;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Serialzone\BackModule\Forms\ILoginFormFactory;
use Serialzone\Model\Orm;

class LogInPresenter extends BasePresenter{

    /**
     * @var ILoginFormFactory
     */
    public $loginFormFactory;

    public function __construct(Orm $orm, ILoginFormFactory $loginFormFactory)
    {
        parent::__construct($orm);
        $this->loginFormFactory = $loginFormFactory;
    }

    public function renderDefault(){
        $this->getTemplate()->setFile(__DIR__  .  "/../templates/Login/default.latte");
    }

    protected function createComponentLoginForm(){
        return $this->loginFormFactory->create();
    }

}
