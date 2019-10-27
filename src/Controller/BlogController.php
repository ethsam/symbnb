<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="Blog")
     */
    public function blog()
    {
        return $this->render('blog/blog.html.twig');
    }
}

?>