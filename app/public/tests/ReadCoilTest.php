<?php

use PHPUnit\Framework\TestCase;
require 'public/ReadCoil.php';
class ReadCoilTest extends TestCase
{
    protected $coil;

    protected function setUp():void
    {
        $this->coil = new ReadCoil();
        $this->coil->setIp('tcp://172.25.0.3:532');
        $this->coil->setUnitId(0);

    }
    /** @test */
    public function initialisation()
    {

        $this->assertEquals($this->coil->ip,'tcp://172.25.0.3:532');
        $this->assertEquals($this->coil->unitId,0);

    }

    /** @test */
    public function creating_connection()
    {

        $this->coil->setConnection(11,'my_coil');
        $this->assertEquals($this->coil->message,'build succes');
    }

    /** @test */
    public function receiving_the_right_value_of_coil()
    {

        $this->coil->setConnection(9,'my_coil');
        $this->coil->getReponse();
        //$this->assertEquals($this->coil->reponse,true);
        $this->assertIsArray($this->coil->reponse_data,'pas array');
        $this->assertEquals($this->coil->reponse_data['my_coil'],true);



    }

}