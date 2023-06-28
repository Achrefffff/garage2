<?php

namespace App\Controller;

use App\Entity\Services;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServicesRepository;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(ServicesRepository $servicesRepository): Response
    {
        
        $services = $servicesRepository->findAll();
        

        return $this->render('service/service.html.twig', [
            'services' => $services,
        ]);
    }
}

