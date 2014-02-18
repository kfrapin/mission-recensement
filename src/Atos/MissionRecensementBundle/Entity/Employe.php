<?php

namespace Atos\MissionRecensementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Employe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Atos\MissionRecensementBundle\Entity\EmployeRepository")
 */
class Employe extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=10, nullable=true)
     */
    private $matricule;

    /**
     * Default constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

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
     * @return Employe
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
     * Set prenom
     *
     * @param string $prenom
     * @return Employe
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     * @return Employe
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * To string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getNom() . " " . $this->getPrenom(); 
    }
}
