<?php

namespace Controllers;

use Users;

class SecurityController extends Controller
{
    public function create ($params){
        echo $this->twig->render('account/register.twig', []);
    }
    public function register ($params){
        dump($_POST);
        $user=new Users();
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        $user->setIdent($_POST['ident']);
        $user->setPassword(password_hash($_POST['password'], PASSWORD_ARGON2I));
        $this->em->persist($user);
        $this->em->flush();
        $this->login($params);
    }
    public function login($params)
    {
        //Affiche le formulaire de login
        echo $this->twig->render('account/login.twig', []);
    }

    public function check($params)
    {
        //Vérifie le mot de passe
        //Récupération de l'user séléctionné
        $_SESSION['loged']=true;
        $message="Vous êtes connectés sous le nom";
        $qb = $this->em->createQueryBuilder();
        $qb->select('u')
           ->from('Users', 'u')
           ->where('u.ident = ?1')
           ->setParameter(1, $_POST['ident'])
        ;
        $user=$qb->getQuery()->getOneOrNullResult();
        dump($user);
        if (!$user) {
            $message="Cet utilisateur n'existe pas";
            $_SESSION['loged']=false;
        }
        else if (!password_verify($_POST['password'],$user->getPassword())){
            $message="Mot de passe incorrect";
            $_SESSION['loged']=false;
        }

        dump($_SESSION);

        echo $this->twig->render('account/connected.twig', ['message'=>$message]);
    }
}