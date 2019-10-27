<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HotelsController extends AbstractController
{
    /**
     * @Route("/hotels", name="Hotels page")
     */
    public function hotels()
    {
        return $this->render('hotels/hotels.html.twig');
    }
}

?>