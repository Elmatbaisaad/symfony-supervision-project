<?php

namespace App\Controller;
use App\Repository\Repo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ReadregistersandcoilsController extends AbstractController
{

    #[Route('/readregistersandcoils', name: 'app_readregistersandcoils')]
    public function index(): Response
    {
        return $this->render('readregistersandcoils/index.html.twig', [
            'controller_name' => 'ReadregistersandcoilsController',
        ]);
    }

    /** @Route ("/" , name="accueil") */
    public function home()
    {
        $repo = new Repo();
        return $this->render('readregistersandcoils/home.html.twig',[
            'repo'=>$repo]);

    }
}
