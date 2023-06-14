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
        // Récupérer tous les objets Service depuis votre source de données
        $services = $servicesRepository->findAll();
        if (!$services) {
            throw $this->createNotFoundException('Aucun service trouvé.');
        }

        return $this->render('service/service.html.twig', [
            'services' => $services,
        ]);
    }
}

