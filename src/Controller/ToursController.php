<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ToursController extends AbstractController
{
    /**
     * @Route("/tours", name="Tours")
     */
    public function tours()
    {
        return $this->render('tours/tours.html.twig');
    }
}

?>