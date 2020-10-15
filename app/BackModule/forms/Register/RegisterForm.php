<?php

namespace Serialzone\BackModule\Forms;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use Serialzone\Model\UserRegistrationService;

interface IRegisterFormFactory{
    /** @return RegisterForm */
    function create();
}

class RegisterForm extends Control{

    /** @var UserRegistrationService  */
    public $registrationService;


    public function __construct(UserRegistrationService $registrationService)
    {
        //parent::__construct($registrationService);
        $this->registrationService = $registrationService;
    }

    protected function createComponentRegisterForm(){
        $form = new Form();
        $form->addText("username", "Username", NULL, "100")
            ->setRequired();
        $form->addPassword("password", "Password",NULL,"100");
        $form->addEmail("email", "Email");
        $form->addSubmit("submit");
        $form->onSuccess[] = [$this, 'registerFormSucceeded'];
        return $form;
    }

    public function registerFormSucceeded(Form $form, $values){
        try {
            $this->registrationService->registerUser($values['username'], $values['password'], $values['email']);
            $this->getPresenter()->flashMessage("Login success");
            $this->getPresenter()->redirect("Homepage:default");
        } catch(\Exception $exception) {
            $this->getPresenter()->flashMessage("chybne jmeno a heslo");
        }
    }

    public function render(){
        $this->getTemplate()->setFile(__DIR__  .  "/../../forms/Register/Register.latte");
        $this->getTemplate()->render();
    }


}