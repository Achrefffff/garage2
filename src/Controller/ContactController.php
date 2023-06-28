<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\HoraireRepository;
use App\Repository\VoitureRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    #[Route('/contact', name: 'contact_form', methods: ['GET', 'POST'])]
    public function contact(
        Request $request,
        HoraireRepository $horaireRepository,
        VoitureRepository $voitureRepository
    ): Response {
        $voitures = $voitureRepository->findAll();
        

        $horaires = $horaireRepository->findAll();
        
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer l'ID de la voiture à partir du champ caché
            $voitureId = $request->request->get('voiture_id');

            // Associer l'ID de la voiture au message
            $voiture = $voitureRepository->find($voitureId);
            if (!$voiture) {
                throw $this->createNotFoundException('La voiture spécifiée n\'existe pas.');
            }

            $contact->setVoiture($voiture);

            $entityManager = $this->managerRegistry->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            // Redirection après soumission réussie du formulaire
            return $this->redirectToRoute('contact_success');
        }

        return $this->render('contact/formContact.html.twig', [
            'form' => $form->createView(),
            'horaires' => $horaires,
            'voitures' => $voitures,
        ]);
    }

    #[Route('/success', name: 'contact_success')]
    public function success(): Response
    {
        return $this->render('contact/success.html.twig');
    }
}
