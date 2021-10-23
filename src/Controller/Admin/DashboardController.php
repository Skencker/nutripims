<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\Categories;
use App\Entity\Recette;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Conseils Nutritionnels');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Site', 'far fa-window-maximize', '/');
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', Users::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-file', Categories::class);
        yield MenuItem::linkToCrud('Recettes', 'fas fa-list', Recette::class);
    }
}
