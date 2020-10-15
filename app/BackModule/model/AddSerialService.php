<?php

namespace Serialzone\Model;

use Nette\Security\Passwords;
use Tracy\Debugger;

class AddSerialService{

    /** @var Orm */
    private $orm;

    public function __construct(Orm $orm)
    {
        $this->orm = $orm;
    }

    public function addSerial($xml){
        /*$user = $this->orm->serials->getById($email);
        if ($user !== NULL){
            throw new \Exception();
        }*/

        /*
        $serial = new Serial();
        $serial->name = $name;
        $serial->description = $description;
        $this->orm->persistAndFlush($serial);
        */
        foreach ($xml->serial as $serial_row){
            $serial = $this->orm->serials->getBy(["name"=>$serial_row->name]);
            if (!$serial){
                $serial = new Serial();
                $serial->name = $serial_row->name;
                $serial->description = $serial_row->description;
                $this->orm->persist($serial);
            }
            foreach ($serial_row->series->serie as $series_row){
                $serie = $this->orm->series->getBy(["name"=>$serial_row->name, "serial"=>$serial]);
                if (!$serie) {
                    $serie = new Serie();
                    //Debugger::barDump($series_row);
                    $serie->name = $series_row->name;
                    $serie->serial = $serial;
                    $this->orm->persist($serie);
                }
                    foreach ($series_row->episodes->episode as $episode_row){
                        Debugger::barDump($episode_row);
                        $episode = $this->orm->episodes->getBy(["name"=>$episode_row->name, "serie"=>$serie]);
                        if (!$episode){
                            $episode = new Episode();
                            $episode->name = $episode_row->name;
                            $episode->description = $episode_row->description;
                            $episode->serie = $serie;
                            $this->orm->persist($episode);
                        }
                    }

            }
            $this->orm->flush();
        }


    }
}