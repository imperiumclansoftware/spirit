<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use ICS\CelebrityBundle\Entity\Celebrity;
use ICS\CelebrityBundle\Entity\Occupation;
use ICS\MediaBundle\Entity\MediaFile;
use ICS\MediaBundle\Entity\MediaImage;
use ICS\SsiBundle\Entity\Account;
use ICS\SsiBundle\Entity\Log;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Spirit');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('Return to site','fa fa-arrow-left','homepage');
        yield MenuItem::section('Celebrity', 'fa fa-users');
        yield MenuItem::linkToCrud('Celebrity', 'fa fa-user', Celebrity::class);
        yield MenuItem::linkToCrud('Occupation', 'fas fa-hammer', Occupation::class);
        yield MenuItem::section('Security', 'fa fa-shield');
        yield MenuItem::linkToCrud('Users', 'fa fa-users', Account::class);
        yield MenuItem::linkToCrud('Logs', 'fa fa-newspaper', Log::class);
        yield MenuItem::section('Medias', 'fa fa-photo-video');
        yield MenuItem::linkToCrud('Files', 'fa fa-file', MediaFile::class);
        yield MenuItem::linkToCrud('Pictures', 'fa fa-photo', MediaImage::class);
    }
}
