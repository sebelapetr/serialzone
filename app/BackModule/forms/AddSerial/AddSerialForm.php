<?php

namespace Serialzone\BackModule\Forms;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use Serialzone\Model\AddSerialService;
use Tracy\Debugger;

interface IAddSerialFormFactory{
    /** @return AddSerialForm */
    function create();
}

class AddSerialForm extends Control{

    /** @var AddSerialService */
    public $addSerialService;

    public function __construct(AddSerialService $addSerialService)
    {
        $this->addSerialService = $addSerialService;
    }

    protected function createComponentAddSerialForm(){
        $form = new Form();
        $form->addUpload("name")
            ->setRequired();
        $form->addSubmit("submit");
        $form->onSuccess[] = [$this, 'addSerialFormSucceeded'];
        return $form;
    }
    public function addSerialFormSucceeded(Form $form, $values){
            Debugger::$maxDepth = 100;
            $xml = (file_get_contents($values['name']->__toString()));
            $xml = simplexml_load_string($xml);
            Debugger::barDump($xml);

            $this->addSerialService->addSerial($xml);
            $this->getPresenter()->flashMessage("Serial added success");

            //$this->getPresenter()->redirect("Homepage:default");
    }
    public function render(){
        $this->getTemplate()->setFile(__DIR__  .  "/../../forms/AddSerial/AddSerial.latte");
        $this->getTemplate()->render();
    }

}