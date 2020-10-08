<?php

namespace App\Controller;

use App\Entity\EscapeGame;
use App\Form\EscapeGameType;
use App\Repository\EscapeGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/escape/game")
 */
class EscapeGameController extends AbstractController
{
    /**
     * @Route("/", name="escape_game_index", methods={"GET"})
     */
    public function index(EscapeGameRepository $escapeGameRepository): Response
    {
        return $this->render('escape_game/index.html.twig', [
            'escape_games' => $escapeGameRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="escape_game_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $escapeGame = new EscapeGame();
        $form = $this->createForm(EscapeGameType::class, $escapeGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($escapeGame);
            $entityManager->flush();

            return $this->redirectToRoute('escape_game_index');
        }

        return $this->render('escape_game/new.html.twig', [
            'escape_game' => $escapeGame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="escape_game_show", methods={"GET"})
     */
    public function show(EscapeGame $escapeGame): Response
    {
        return $this->render('escape_game/show.html.twig', [
            'escape_game' => $escapeGame,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="escape_game_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EscapeGame $escapeGame): Response
    {
        $form = $this->createForm(EscapeGameType::class, $escapeGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('escape_game_index');
        }

        return $this->render('escape_game/edit.html.twig', [
            'escape_game' => $escapeGame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="escape_game_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EscapeGame $escapeGame): Response
    {
        if ($this->isCsrfTokenValid('delete'.$escapeGame->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($escapeGame);
            $entityManager->flush();
        }

        return $this->redirectToRoute('escape_game_index');
    }
}
