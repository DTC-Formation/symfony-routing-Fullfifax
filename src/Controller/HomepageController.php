<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(Request $request): Response
    {

        $nombreA = $request->get(key: 'nombre-a');
        $nombreB = $request->get(key: 'nombre-b');
        $signe = $request->get(key: 'signe');

        if(is_numeric($nombreA) && is_numeric($nombreB)) {
            $total = eval("return $nombreA $signe $nombreB;");
        } else {
            $total = "Impossible de faire le calcul";
        }
        
        return $this->render('homepage/index.html.twig', [
            'total' => $total,
        ]);
    }
}
