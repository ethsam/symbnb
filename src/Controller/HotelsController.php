<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;

class HotelsController extends AbstractController
{
    /**
     * @Route("/hotels", name="Hotels page")
     */
    public function hotels(EntityManagerInterface $em)
    {
        $listHotels = $em->getRepository(Products::class)->findAll();

        return $this->render('hotels/hotels.html.twig', [
            "listhotels" => $listHotels
            ]);
    }

}

?>