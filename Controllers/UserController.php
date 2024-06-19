<?php

namespace Controllers;

use Users;

class UserController extends Controller
{
    public function liste($params)
    {
        //Affiche un tableau des users
        $query = $this->em->createQuery('SELECT u FROM Users u');
        $users = $query->getResult();
        dump($users);

        echo $this->twig->render('users/liste.twig', ['users'=>$users]);
    }

    public function create($params)
    {
        // Permet d'afficher un formulaire de création
        $qb = $this->em->createQueryBuilder();
        $qb->select('v')
           ->from('Villes', 'v')

        ;
        $villes = $qb->getQuery()->getResult();
        echo $this->twig->render('users/utilisateurs.twig', ['villes'=>$villes]);
    }

    public function insert($params)
    {
        //Insert un user dans la BDD
        $ville = $this->em->find('Villes',$_POST['ville_id']);
        dump($_POST);
        $user= new Users();
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);

        $user->setVille($ville);
        dump($user);
        $this->em->persist($user);
        $this->em->flush();

    }
}