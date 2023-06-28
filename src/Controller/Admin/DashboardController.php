<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Services;
use App\Entity\Contact;
use App\Entity\Voiture;
use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Horaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
class DashboardController extends AbstractDashboardController
{
    private $authorizationChecker;

    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dash.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('V.Parrot Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        if ($this->authorizationChecker->isGranted('ROLE_ADMIN')) {
            yield MenuItem::linkToCrud('Employes', 'fas fa-user', User::class);
        }

        yield MenuItem::linkToCrud('Services', 'fas fa-screwdriver-wrench', Services::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-stopwatch', Horaire::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-message', Contact::class);
        yield MenuItem::linkToCrud('Voitures', 'fas fa-car', Voiture::class);
        yield MenuItem::linkToCrud('Temoignages', 'fas fa-pen-nib', Temoignage::class);
    }
}