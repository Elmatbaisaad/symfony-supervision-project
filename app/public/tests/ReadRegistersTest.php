<?php

use PHPUnit\Framework\TestCase;
require 'public/ReadRegister.php';
class ReadRegistersTest extends TestCase
{
    protected $conn;

    protected function setUp():void
    {
        $this->conn = new ReadRegister();
        $this->conn->setIp('tcp://172.25.0.3:532');
        $this->conn->setUnitID(0);

    }

    /** @test */
    public function creating_ip_and_unit_id()
    {
        //$this->assertEquals($this->conn->ip,'tcp://127.0.0.1:532');
        $this->assertEquals($this->conn->unitID,0);

    }

    /** @test */
    public function creating_connection()
    {

        $this->conn->connection(2,'my_register');
        $this->assertEquals($this->conn->message,'build succés');
    }

    /** @test */
    public function receiving_the_right_value_of_register()
    {
        $this->conn->connection(2,'my_register');
        $this->conn->getResponse();
        $this->assertArrayHasKey('my_register',$this->conn->reponse_data);
        $this->assertEquals($this->conn->reponse_data['my_register'],216);

    }

}