<?php

namespace Atos\MissionRecensementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domaine
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Atos\MissionRecensementBundle\Entity\DomaineRepository")
 */
class Domaine
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
    * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\Domaine", cascade={"persist"})
     */
    private $domaineParent;

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
     * @return Domaine
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->domaineParent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set domaineParent
     *
     * @param \Atos\MissionRecensementBundle\Entity\Domaine $domaineParent
     * @return Domaine
     */
    public function setDomaineParent(\Atos\MissionRecensementBundle\Entity\Domaine $domaineParent = null)
    {
        $this->domaineParent = $domaineParent;

        return $this;
    }

    /**
     * Get domaineParent
     *
     * @return \Atos\MissionRecensementBundle\Entity\Domaine 
     */
    public function getDomaineParent()
    {
        return $this->domaineParent;
    }
}
