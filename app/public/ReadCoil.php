<?php

use ModbusTcpClient\Composer\Read\ReadCoilsBuilder;
use ModbusTcpClient\Network\NonBlockingClient;

class ReadCoil
{
    public $ip;
    public $unitId;
    public $connection;
    public $message;
    public $reponse;

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function setUnitId($unitId)
    {
        $this->unitId = $unitId;
    }

    public function setMessage($msg)
    {
        $this->message = $msg;
    }

    public function setConnection(int $adresse)
    {
        try {
            $this->connection = ReadCoilsBuilder::newReadCoils($this->ip)
                ->coil($adresse,'premiere_coil')
                ->build();
            $this->setMessage('build succes');
        }catch (Exception $e){
            echo 'build error';
        }

    }

    public function getReponse()
    {
        $reponseContainer = (new NonBlockingClient(['readTimeoutSec' => 0.2]))->sendRequests($this->connection);
        $this->reponse = print_r($reponseContainer->getData());
        $this->reponse = print_r($reponseContainer->getErrors());
    }

}