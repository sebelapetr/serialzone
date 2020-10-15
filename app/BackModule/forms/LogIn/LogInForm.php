<?php

namespace Serialzone\BackModule\Forms;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;

interface ILoginFormFactory{
    /** @return LoginForm */
    function create();
}

class LoginForm extends Control{

    protected function createComponentLoginForm(){
        $form = new Form();
        $form->addEmail("email", "Email")
            ->setRequired();
        $form->addPassword("password", "Password",NULL,"100");
        $form->addSubmit("submit");
        $form->onSuccess[] = [$this, 'loginFormSucceeded'];
        return $form;
    }

    public function loginFormSucceeded(Form $form, $values){
        try {
            $this->getPresenter()->getUser()->login($values["email"], $values["password"]);
            $this->flashMessage("Login success");
            $this->getPresenter()->redirect("HomePage:default");
        } catch (AuthenticationException $exception){
            $this->flashMessage("Chybne jmeno a heslo");

        }
        catch(\LogicException $exception) {
            $this->getPresenter()->flashMessage("chybne jmeno a heslo");
        }
    }

    public function render(){
        $this->getTemplate()->setFile(__DIR__  .  "/../../forms/LogIn/LogIn.latte");
        $this->getTemplate()->render();
    }


}