<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact/{id}/{name}', name: 'app_contact', methods: ['GET', 'POST'])]
    public function index(string $id): Response
    {
        dd($id);
        return $this->render('contact/index.html.twig');
    }
}
