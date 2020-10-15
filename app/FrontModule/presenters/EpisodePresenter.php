<?php

namespace Serialzone\FrontModule\Presenters;

use Serialzone\Model\Orm;

class EpisodePresenter extends BasePresenter{

    public function __construct(Orm $orm)
    {
        parent::__construct($orm);
    }

    public function renderDefault($episodeId)
    {
        $this->getTemplate()->episodes = $this->orm->episodes->getById($episodeId);
    }
}