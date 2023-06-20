<?php

namespace App\Controller;

use App\Entity\Horaire;
use App\Entity\Voiture;
use App\Repository\HoraireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VoitureRepository;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(
        Request $request,
        HoraireRepository $horaireRepository,
        VoitureRepository $voitureRepository
    ): Response {
        $voitures = $voitureRepository->findAll();
        if (!$voitures) {
            throw $this->createNotFoundException('Veuillez ajouter une voiture depuis le dashboard. Aucun service trouvé.');
        }

        $horaires = $horaireRepository->findAll();
        if (!$horaires) {
            throw $this->createNotFoundException('Veuillez ajouter un horaire depuis le dashboard. Aucun service trouvé.');
        }

        $prixMin = $request->query->get('prix_min');
        $prixMax = $request->query->get('prix_max');
        $kmMin = $request->query->get('km_min');
        $kmMax = $request->query->get('km_max');
        $anneeMin = $request->query->get('annee_min');
        $anneeMax = $request->query->get('annee_max');

        $voituresFiltrees = $voitureRepository->findByFilters($prixMin, $prixMax, $kmMin, $kmMax, $anneeMin, $anneeMax);

        return $this->render('voiture/index.html.twig', [
            'horaires' => $horaires,
            'voitures' => $voituresFiltrees,
        ]);
    }
}
