<?php

namespace App\Controller;

use App\Entity\Temoignage;
use App\Form\TemoignageType;
use App\Repository\ServicesRepository;
use App\Repository\HoraireRepository;
use App\Repository\TemoignageRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController

{   private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    #[Route('/', name: 'app_home')]
    public function index(Request $request, ServicesRepository $servicesRepository, HoraireRepository $horaireRepository,TemoignageRepository $temoignageRepository): Response
    {   
        $temoignages=$temoignageRepository->findAll();
        

        $services = $servicesRepository->findAll();
        

       

        // Créer une instance de l'entité Temoignage
        $temoignage = new Temoignage();

        // Créer le formulaire de témoignage
        $form = $this->createForm(TemoignageType::class, $temoignage);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $entityManager = $this->managerRegistry->getManager();
            $entityManager->persist($temoignage);
            $entityManager->flush();
            

            // Rediriger l'utilisateur vers la page d'accueil après soumission réussie
            return $this->redirectToRoute('app_home');
        }

        return $this->render('home/index.html.twig', [
            'services' => $services,
            'horaires' => $horaires,
            'temoignages' => $temoignages,
            'form' => $form->createView(), // Passer la vue du formulaire au template
            

        ]);
    }
}
