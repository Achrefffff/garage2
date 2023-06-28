<?php

namespace App\Controller;

use App\Entity\Horaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HoraireRepository;

class HoraireController extends AbstractController
{
    #[Route('/horaire', name: 'app_horaire')]
    public function index(HoraireRepository $horaireRepository): Response
    {
        $horaires = $horaireRepository->findAll();
        

        return $this->render('partials/_footer.html.twig', [
            'horaires' => $horaires,
        ]);
    }
}
