<?php

namespace Serialzone\BackModule\Presenters;

use Nette\Application\UI\Presenter;
use Serialzone\Model\Orm;

class BasePresenter extends Presenter{

    /** @var Orm  */
    protected $orm;

    public function __construct(Orm $orm)
    {
        parent::__construct();
        $this->orm = $orm;
    }

    public function handleLogOut(){
        $this->getPresenter()->getUser()->logout();
        $this->flashMessage("Logout success");
        $this->getPresenter()->redirect(":Front:Homepage:default");
    }

    public function startup(){
        parent::startup();
        if(!$this->getUser()->isLoggedIn()){
            if(!($this->isLinkCurrent('LogIn:') || $this->isLinkCurrent('Register:'))){
                $this->redirect('Login:');
            }
        }else{
            if($this->isLinkCurrent('LogIn:') || $this->isLinkCurrent('Register:')){
                $this->redirect('HomePage:');
            }
        }
    }
    /*
    public function startup()
    {
        if (!$this->getUser()->isLoggedIn()){
            if($this->isLinkCurrent("Register:")){
                $this->redirect("LogIn:");
            }
            else{
                if(!$this->isLinkCurrent("LogIn:")){
                    $this->redirect("LogIn:");
                }
            }

        }
        else{
            if ($this->getUser()->isLoggedIn()){
                if($this->isLinkCurrent("LogIn:")){
                    $this->redirect("HomePage:");
                }
            }
        }
    })*/
}