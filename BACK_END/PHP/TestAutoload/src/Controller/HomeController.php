<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function homepage(): Response
    {
        return $this->render('homepage/home.html.twig', []);
    }
    /**
     * @Route("/a-propos/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('homepage/about.html.twig', []);
    }
}