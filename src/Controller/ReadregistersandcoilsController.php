<?php
namespace App\Controller;
use App\Repository\Repo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ReadregistersandcoilsController extends AbstractController
{
    public function conversion($nombre)
    {
        return $nombre/100;

    }

    #[Route('/', name: 'getValue')]
    public function index(): Response
    {
        $repo = new Repo();
        return $this->render('readregistersandcoils/index.html.twig',[
            'sonde_oxygen'=>$repo->chercherValeurRegister( 'sonde Oxygene'),
            'oxygen'=>$this->conversion($repo->valeurRegister),
            'sonde_niveau'=>$repo->chercherValeurRegister( 'Sonde de Niveau'),
            'niveau'=>$this->conversion($repo->valeurRegister),
            'sonde_pression'=>$repo->chercherValeurRegister( 'Sonde de Pression'),
            'pression'=>$this->conversion($repo->valeurRegister),
            'filtre_on'=>$repo->chercherValeurBobine('Filtre ON'),
            'f_on'=>$repo->valeurCoil,
            'alarm_off'=>$repo->chercherValeurBobine('Alarm OFF'),
            'a_off'=>$repo->valeurCoil,
            'pump_on'=>$repo->chercherValeurBobine('Pump ON'),
            'p_on'=>$repo->valeurCoil,
            ]);
    }



/** @Route ("/JsonValue", name="JsonValue")*/
    public function jsonValue():Response
    {
        $repo = new Repo();
        return $this->json([
            'sonde_oxygen'=>$repo->chercherValeurRegister( 'sonde Oxygene'),
            'oxygen'=>$this->conversion($repo->valeurRegister),
            'sonde_niveau'=>$repo->chercherValeurRegister( 'Sonde de Niveau'),
            'niveau'=>$this->conversion($repo->valeurRegister),
            'sonde_pression'=>$repo->chercherValeurRegister( 'Sonde de Pression'),
            'pression'=>$this->conversion($repo->valeurRegister),
            'filtre_on'=>$repo->chercherValeurBobine('Filtre ON'),
            'f_on'=>$repo->valeurCoil,
            'alarm_off'=>$repo->chercherValeurBobine('Alarm OFF'),
            'a_off'=>$repo->valeurCoil,
            'pump_on'=>$repo->chercherValeurBobine('Pump ON'),
            'p_on'=>$repo->valeurCoil,
        ]);
    }
}
