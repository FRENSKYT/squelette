<?php

namespace Controllers;

use Villes;

class VilleController extends Controller
{
    public function liste($params)
    {
        //Affiche un tableau des users
        $query = $this->em->createQuery('SELECT v FROM Villes v');
        $villes = $query->getResult();
        dump($villes);

        echo $this->twig->render('villes/liste.twig', ['villes'=>$villes]);
    }
    //Affichage d'un enregistrement
    public function read($id) {
        dump($id);
        $ville=$this->em->find("Villes",$id);
        dump($ville->getUsers());
        echo $this->twig->render('villes/read.twig', ['ville'=>$ville]);
    }
}