<?php
// src/Users.php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class Users
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\nom]
    #[ORM\Column(type: 'string')]
    private string $nom;
    #[ORM\prenom]
    #[ORM\Column(type: 'string')]
    private string $prenom;
    #[ORM\ManyToOne(targetEntity: Villes::class, inversedBy:'users')]
    #[ORM\JoinColumn(name: 'ville_id', referencedColumnName: 'id')]
    private Villes|null $ville=null;
    #[ORM\ident]
    #[ORM\Column(type: 'string',unique: true)]
    private string $ident;
    #[ORM\password]
    #[ORM\Column(type: 'string')]
    private string $password;
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Users
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Users
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set ville.
     *
     * @param \Villes|null $ville
     *
     * @return Users
     */
    public function setVille(\Villes $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville.
     *
     * @return \Villes|null
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set ident.
     *
     * @param string $ident
     *
     * @return Users
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;

        return $this;
    }

    /**
     * Get ident.
     *
     * @return string
     */
    public function getIdent()
    {
        return $this->ident;
    }
}
