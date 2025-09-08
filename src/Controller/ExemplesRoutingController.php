<?php

namespace App\Controller;

// classe de laquelle on doit hériter pour que notre classe soit un controller
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
// classe pour créer une Réponse à envoyer au client
use Symfony\Component\HttpFoundation\Response;
// classe qui nous permet de créer de routes
use Symfony\Component\Routing\Annotation\Route;


class ExemplesRoutingController extends AbstractController
{
    #[Route('/exemples/routing/accueil')]
    public function afficherMessageAccueil()
    {
        // normalement ici on va renvoyer une VIEW: 
            // return $this->render('chemin de la vue') 
        // mais on va simplement renvoyer du texte:
        return new Response("<h1>J'ai besoin d'un café!!!</h1>");
    }

    #[route('/exemples/routing/weekend')]
    public function afficherMessageWeekend()
    {
        return new response("<h1>Vivement le weekend!!!</h1>");
    }

    #[route('/exemples/routing/bienvenue/{nom}')]   // {nom} est un paramètre 
    public function afficherMessageBienvenue(Request $request)
    {
        $nom = $request->get('nom');
        return new response("Bonjour " . $nom. "<br>Bienvenue sur le site");
    }

    #[route('/exemples/routing/tvac/{prix}')]
    public function afficherTvac(Request $request)
    {
        $prix = $request->get('prix');
        $tva = 0.21;                     
        $prixTvac = $prix * (1 + $tva);

        return new Response("Le prix TVAC est : " . $prixTvac . " €");
    }

    #[Route('/exemples/routing/moyenne/{a}/{b}/{c}')]
    public function afficherMoyenne(Request $request)
    {
        $a = $request->get('a');
        $b = $request->get('b');
        $c = $request->get('c');

        $moyenne = ($a + $b + $c) / 3;

        return new Response("La moyenne est : " . $moyenne);
    }
}
