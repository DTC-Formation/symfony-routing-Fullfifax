<?php

namespace App\Controller;

use App\Service\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{
    #[Route('/result', name: 'app_result')]
    public function index(Request $request, CalculatorService $calculatorService): Response
    {
        
        $nombreA = $request->get(key: 'nombre-a');
        $nombreB = $request->get(key: 'nombre-b');
        $signe = $request->get(key: 'signe');

        $total = $calculatorService->calculate($nombreA, $nombreB, $signe);

        return $this->render('result/index.html.twig', [
            'total' => $total,
        ]);
    }
}
