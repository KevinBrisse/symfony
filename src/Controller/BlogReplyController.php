<?php

namespace App\Controller;

use App\Entity\BlogReply;
use App\Form\BlogReplyType;
use App\Repository\BlogReplyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog/reply")
 */
class BlogReplyController extends AbstractController
{
    /**
     * @Route("/", name="blog_reply_index", methods={"GET"})
     */
    public function index(BlogReplyRepository $blogReplyRepository): Response
    {
        return $this->render('blog_reply/index.html.twig', [
            'blog_replies' => $blogReplyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="blog_reply_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $blogReply = new BlogReply();
        $form = $this->createForm(BlogReplyType::class, $blogReply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blogReply);
            $entityManager->flush();

            return $this->redirectToRoute('blog_reply_index');
        }

        return $this->render('blog_reply/new.html.twig', [
            'blog_reply' => $blogReply,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blog_reply_show", methods={"GET"})
     */
    public function show(BlogReply $blogReply): Response
    {
        return $this->render('blog_reply/show.html.twig', [
            'blog_reply' => $blogReply,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="blog_reply_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BlogReply $blogReply): Response
    {
        $form = $this->createForm(BlogReplyType::class, $blogReply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_reply_index');
        }

        return $this->render('blog_reply/edit.html.twig', [
            'blog_reply' => $blogReply,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blog_reply_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BlogReply $blogReply): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blogReply->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($blogReply);
            $entityManager->flush();
        }

        return $this->redirectToRoute('blog_reply_index');
    }
}
