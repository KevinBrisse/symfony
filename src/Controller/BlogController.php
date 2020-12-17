<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }


    /**
     * @Route("/blog/detail", name="blog_detail")
     */
    public function detail()
    {
        return $this->render('blog/detail.html.twig', [
            'controller_name' => 'DetailController',
        ]);
    }
}
