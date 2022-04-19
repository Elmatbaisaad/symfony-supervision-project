<?php

use ModbusTcpClient\Composer\Read\ReadRegistersBuilder;
use ModbusTcpClient\Network\NonBlockingClient;

class ReadRegister
{
    public $ip;
    public $unitID;
    public $fc3;
    public $message;
    public $reponse;

    public function setIp($ip)
    {
        $this->ip = $ip;

    }
    public function setUnitID($unitID)
    {
        $this->unitID = $unitID;

    }

    public function setMessageDeRetour($msg){
        $this->message = $msg;
    }

    public function connection($adresse)
    {
        try {
            $this->fc3 = ReadRegistersBuilder::newReadHoldingRegisters($this->ip,$this->unitID)
                ->int16($adresse,'read_register')
                ->build();
            $this->setMessageDeRetour('build succés');

        }catch (Exception $e){
            $this->setMessageDeRetour('build erreur');
        }
   }

    public function getResponse()
    {
        $reponseContainer = (new NonBlockingClient(['readTimeoutSec' => 0.2]))->sendRequests($this->fc3);
        $this->reponse = print_r($reponseContainer->getData());
        $this->reponse = print_r($reponseContainer->getErrors());
    }

}