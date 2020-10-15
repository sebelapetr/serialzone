<?php

namespace Serialzone\BackModule\Presenters;

class HomePagePresenter extends BasePresenter{

    public function renderDefault(){
        if ($this->getPresenter()->getUser()->isLoggedIn()){
            $this->getTemplate()->setFile(__DIR__ . "/../templates/HomePage/default.latte");
        }
        else{
            $this->getTemplate()->setFile(__DIR__ . "/../templates/HomePage/loggedOut.latte");
        }
    }
}