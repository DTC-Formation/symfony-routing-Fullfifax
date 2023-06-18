<?php

namespace App\Controller;

use App\Service\CalculatorService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(Request $request, CalculatorService $calculatorService): Response
    {
        $nombreA = $request->get('nombre-a');
        $nombreB = $request->get('nombre-b');
        $signe = $request->get('signe');

        if ($nombreA !== null && $nombreB !== null && $signe !== null) {
            $total = $calculatorService->calculate($nombreA, $nombreB, $signe);

            return $this->redirectToRoute('app_result', [
                'total' => $total,
            ]);
        }

        return $this->render('homepage/index.html.twig');
    }

    #[Route('/result', name: 'app_result')]
    public function result(Request $request): Response
    {
        $total = $request->query->get('total');

        return $this->render('homepage/result.html.twig', [
            'total' => $total,
        ]);
    }
}
