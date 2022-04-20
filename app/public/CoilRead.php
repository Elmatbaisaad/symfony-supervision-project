<?php
use ModbusTcpClient\Composer\Read\ReadCoilsBuilder;
use ModbusTcpClient\Network\NonBlockingClient;
require __DIR__ . '/../vendor/autoload.php';


$ip='tcp://172.25.0.3:532';
/*$fc3 = ReadCoilsBuilder::newReadCoils('tcp://172.25.0.3:532')
    ->coil(1, "my_coil")
    ->build();*/

$connection = ReadCoilsBuilder::newReadCoils($ip,0)
    ->coil(11,'premiere_coil')

    ->build();


$reponseContainer =(new NonBlockingClient(['readTimeoutSec' => 0.8]))->sendRequests($connection);
print_r($reponseContainer->getData());
print_r($reponseContainer->getErrors());