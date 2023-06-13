<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{
    #[Route('/result', name: 'app_result')]
    public function index(Request $request): Response
    {
        
        $nombreA = $request->get(key: 'nombre-a');
        $nombreB = $request->get(key: 'nombre-b');
        $signe = $request->get(key: 'signe');
        $operateurs = ['+', '-', '*', '/'];

        $total = is_numeric($nombreA) && is_numeric($nombreB) && in_array($signe, $operateurs)
            ? ($signe === '+' ? $nombreA + $nombreB
                : ($signe === '-' ? $nombreA - $nombreB
                    : ($signe === '*' ? $nombreA * $nombreB
                        : ($signe === '/' && $nombreB != 0 ? $nombreA / $nombreB
                            : "Impossible de faire le calcul"))))
            : "Impossible de faire le calcul";


        return $this->render('result/index.html.twig', [
            'total' => $total,
        ]);
    }
}
