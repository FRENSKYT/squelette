<?php

namespace Controllers;

class IndexController extends Controller
{
    public function index($params)
    {
        //savoir si un utilisateur existe deja
    	$connectUser="Lorick";
    	$message=$params;
    	var_dump ($params);
        echo $this->twig->render('index.twig', ['connectUser' =>   $connectUser]);
    }
    public function mypage($params){
        $connectUser="plop";
        echo $this->twig->render('myPage.twig', ['connectUser' =>   $connectUser]);
    }
    public function myform($params){
        $connectUser="plop";
        echo $this->twig->render('formulaire.twig', ['connectUser' =>   $connectUser]);
    }
    public function recup($params){
        $connectUser="plop";
        dump($_POST);
        echo $this->twig->render('recup.twig', ['connectUser' =>   $connectUser]);
    }
    public function getVilles($params)
    {
        $query = $this->em->createQuery("SELECT v FROM Villes v WHERE v.id BETWEEN 1 AND 20");
        $villes = $query->getResult();
        dump($villes);
        //echo $this->twig->render('table.twig', ['villes' => $villes])
    }
    public function users($params){
        $connectUser="plop";
        echo $this->twig->render('users/utilisateurs.twig', ['connectUser' =>   $connectUser]);
    }
    public function login($params){
        $connectUser="plop";
        echo $this->twig->render('account/login.twig', ['connectUser' =>   $connectUser]);
    }
    public function register($params){
        $qb = $this->em->createQueryBuilder();
        $qb->select('v')
           ->from('Villes', 'v')

        ;
        $villes = $qb->getQuery()->getResult();
        $connectUser="plop";
        echo $this->twig->render('account/register.twig', ['connectUser' => $connectUser, 'villes'=>$villes]);
    }
    
}