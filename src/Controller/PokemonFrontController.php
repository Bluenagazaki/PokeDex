<?php

namespace App\Controller;

use App\Entity\Element;
use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/pokemon")
 */
class PokemonFrontController extends AbstractController
{
    /**
     * @Route("/", name="pokemon_front_index")
     */
    public function index(PokemonRepository $pokemonRepository): Response
    {
        return $this->render('pokemon_front/index.html.twig', [
            'pokemon' => $pokemonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/element/{id}", name="pokemon_front_indexByElement")
     */
    public function indexByElement(Element $element): Response
    {
        return $this->render('pokemon_front/index.html.twig', [
            'pokemon' => $element->getPokemons(),
        ]);
    }

    /**
     * @Route("/{id}", name="pokemon_front_show", methods={"GET"})
     */
    public function show(Pokemon $pokemon = null): Response
    {
        if (is_null($pokemon)) {
            return $this->render('error/404.html.twig');
        }
        return $this->render('pokemon_front/show.html.twig', [
            'pokemon' => $pokemon,
        ]);
    }
}
