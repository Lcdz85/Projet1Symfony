<?php

namespace App\Controller;

// classe de laquelle on doit hériter pour que notre classe soit un controller
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// classe pour créer une Réponse à envoyer au client
use Symfony\Component\HttpFoundation\Response;
// classe qui nous permet de créer de routes
use Symfony\Component\Routing\Annotation\Route; 
// pour pouvoir obtenir les paramètres de l'url
use Symfony\Component\HttpFoundation\Request;


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

        // avec paramètres:
    #[Route('/exemples/routing/afficher/nom/{prenom}/{nom}')]
    public function afficherNom(Request $request)
    {
        $prenom = $request->get('prenom');
        $nom = $request->get('nom');

        return new Response("Je m'appelle ". $prenom." ". $nom. " et je suis une WAD");
    }

        // contrainte ds les paramètres:
    #[Route('/exemples/routing/afficher/ville/{ville}',requirements:['ville'=>'\w{1,15}'])]
    // ou #[Route('/exemples/routing/afficher/ville/{ville<\w{1,15}>')]
    public function afficheVille(Request $request)
    {
        $ville = $request->get('ville');

        return new Response("Le nom de la ville est ". $ville);
    }

}
