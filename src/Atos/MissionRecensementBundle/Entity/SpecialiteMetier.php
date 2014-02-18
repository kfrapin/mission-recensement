<?php

namespace Atos\MissionRecensementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SpecialiteMetier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Atos\MissionRecensementBundle\Entity\SpecialiteMetierRepository")
 */
class SpecialiteMetier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return SpecialiteMetier
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * To string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getNom(); 
    }
}
