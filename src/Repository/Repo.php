<?php

namespace App\Repository;
class Repo
{
    public $valeurRegister;
    public $valeurCoil;



    public function chercherValeurRegister(string $id)
    {
        $file = __DIR__ . '/config_client.json';
        $donnees = file_get_contents($file);
        $decode = json_decode($donnees);

        $register = new ReadRegister();
        $register->setIp($decode->{'serveur'}->{'ip'});
        $register->setUnitID($decode->{'serveur'}->{'unitId'});
        for ($i=0;$i<count($decode->{'mot'});$i++){
            $register->connection($decode->{'mot'}[$i]->{'adresse'},$decode->{'mot'}[$i]->{'id'});
            $register->getResponse();
            if ($id == $decode->{'mot'}[$i]->{'id'}){
                $this->valeurRegister= $register->reponse_data[$decode->{'mot'}[$i]->{'id'}];
            }

        }
}

    public function chercherValeurBobine(string $id)
    {
        $file = __DIR__ . '/config_client.json';
        $donnees = file_get_contents($file);
        $decode = json_decode($donnees);
        $coil = new ReadCoil();
        $coil->setIp($decode->{'serveur'}->{'ip'});
        for ($i=0;$i<count($decode->{'bit'});$i++){
            $coil->setConnection($decode->{'bit'}[$i]->{'adresse'},$decode->{'bit'}[$i]->{'id'});
            $coil->getReponse();
            if ($id == $decode->{'bit'}[$i]->{'id'}){
                $this->valeurCoil= $coil->reponse_data[$decode->{'bit'}[$i]->{'id'}];
            }


        }


}

}