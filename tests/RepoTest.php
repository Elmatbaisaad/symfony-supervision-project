<?php

namespace App\Tests;
use App\Repository\Repo;
use PHPUnit\Framework\TestCase;

class RepoTest extends TestCase
{
    /** @test */
    public function returning_the_value_of_register()
    {
        $repo = new Repo();
        $repo->chercherValeurRegister('sonde Oxygene');
        $this->assertEquals($repo->valeurRegister,990);
    }

    /** @test */
    public function returning_the_value_of_coil()
    {
        $repo = new Repo();
        $repo->chercherValeurBobine('Alarm OFF');
        $this->assertEquals($repo->valeurCoil,true);
        $repo->chercherValeurBobine('Filtre ON');
        $this->assertEquals($repo->valeurCoil,false);
    }

    /** @test */
    public function verifying_the_message_alarm()
    {
        $repo = new Repo();
        $repo->chercherValeurBobine('Alarm OFF');
        $this->assertEquals($repo->message,'Le niveau d\'eau est bas');
    }

}