<?php

namespace Atos\MissionRecensementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mission
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Atos\MissionRecensementBundle\Entity\MissionRepository")
 */
class Mission
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
     * @var string
     *
     * @ORM\Column(name="descriptionProcessus", type="string", length=255, nullable=true)
     */
    private $descriptionProcessus;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionTechnique", type="string", length=255, nullable=true)
     */
    private $descriptionTechnique;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionFonction", type="string", length=255, nullable=true)
     */
    private $descriptionFonction;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateFin", type="date", nullable=true)
     */
    private $dateFin;


    /**
     * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\Employe")
     */
    private $employe;

    /**
     * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\Client")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\Metier")
     */
    private $metier;

    /**
     * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\TypePrestation")
     */
    private $typePrestation;

    /**
     * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\Niveau")
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\Type")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\Domaine")
     */
    private $domaine;

    /**
     * @ORM\ManyToOne(targetEntity="Atos\MissionRecensementBundle\Entity\Domaine")
     */
    private $sousDomaine;

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
     * Set descriptionProcessus
     *
     * @param string $descriptionProcessus
     * @return Mission
     */
    public function setDescriptionProcessus($descriptionProcessus)
    {
        $this->descriptionProcessus = $descriptionProcessus;

        return $this;
    }

    /**
     * Get descriptionProcessus
     *
     * @return string 
     */
    public function getDescriptionProcessus()
    {
        return $this->descriptionProcessus;
    }

    /**
     * Set descriptionTechnique
     *
     * @param string $descriptionTechnique
     * @return Mission
     */
    public function setDescriptionTechnique($descriptionTechnique)
    {
        $this->descriptionTechnique = $descriptionTechnique;

        return $this;
    }

    /**
     * Get descriptionTechnique
     *
     * @return string 
     */
    public function getDescriptionTechnique()
    {
        return $this->descriptionTechnique;
    }

    /**
     * Set descriptionFonction
     *
     * @param string $descriptionFonction
     * @return Mission
     */
    public function setDescriptionFonction($descriptionFonction)
    {
        $this->descriptionFonction = $descriptionFonction;

        return $this;
    }

    /**
     * Get descriptionFonction
     *
     * @return string 
     */
    public function getDescriptionFonction()
    {
        return $this->descriptionFonction;
    }

    /**
     * Set dateDebut
     *
     * @param \Date $dateDebut
     * @return Mission
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \Date 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \Date $dateFin
     * @return Mission
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \Date 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set employe
     *
     * @param \Atos\MissionRecensementBundle\Entity\Employe $employe
     * @return Mission
     */
    public function setEmploye(\Atos\MissionRecensementBundle\Entity\Employe $employe = null)
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * Get employe
     *
     * @return \Atos\MissionRecensementBundle\Entity\Employe 
     */
    public function getEmploye()
    {
        return $this->employe;
    }

    /**
     * Set client
     *
     * @param \Atos\MissionRecensementBundle\Entity\Client $client
     * @return Mission
     */
    public function setClient(\Atos\MissionRecensementBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Atos\MissionRecensementBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set metier
     *
     * @param \Atos\MissionRecensementBundle\Entity\Metier $metier
     * @return Mission
     */
    public function setMetier(\Atos\MissionRecensementBundle\Entity\Metier $metier = null)
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * Get metier
     *
     * @return \Atos\MissionRecensementBundle\Entity\Metier 
     */
    public function getMetier()
    {
        return $this->metier;
    }

    /**
     * Set typePrestation
     *
     * @param \Atos\MissionRecensementBundle\Entity\TypePrestation $typePrestation
     * @return Mission
     */
    public function setTypePrestation(\Atos\MissionRecensementBundle\Entity\TypePrestation $typePrestation = null)
    {
        $this->typePrestation = $typePrestation;

        return $this;
    }

    /**
     * Get typePrestation
     *
     * @return \Atos\MissionRecensementBundle\Entity\TypePrestation 
     */
    public function getTypePrestation()
    {
        return $this->typePrestation;
    }

    /**
     * Set niveau
     *
     * @param \Atos\MissionRecensementBundle\Entity\Niveau $niveau
     * @return Mission
     */
    public function setNiveau(\Atos\MissionRecensementBundle\Entity\Niveau $niveau = null)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \Atos\MissionRecensementBundle\Entity\Niveau 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set type
     *
     * @param \Atos\MissionRecensementBundle\Entity\Type $type
     * @return Mission
     */
    public function setType(\Atos\MissionRecensementBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Atos\MissionRecensementBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Mission
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
     * Get date interval.
     *
     * @return DateInterval
     */
    public function getDateInterval()
    {
        $start = $this->getDateDebut();
        $end = $this->getDateFin();
        if($end) 
        {
            return $start->diff($end);
        }
        return null;
    }

    /**
     * Get duree annees.
     *
     * @return integer
     */
    public function getDureeAnnees()
    {
        $interval = $this->getDateInterval();
        if($interval) 
        {
            return $interval->y;
        }
    }

    /**
     * Get duree mois.
     *
     * @return integer
     */
    public function getDureeMois()
    {
        $interval = $this->getDateInterval();
        if($interval) 
        {
            return $interval->m;
        }
    }

    /**
     * Set domaine
     *
     * @param \Atos\MissionRecensementBundle\Entity\Domaine $domaine
     * @return Mission
     */
    public function setDomaine(\Atos\MissionRecensementBundle\Entity\Domaine $domaine = null)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return \Atos\MissionRecensementBundle\Entity\Domaine 
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set sousDomaine
     *
     * @param \Atos\MissionRecensementBundle\Entity\Domaine $sousDomaine
     * @return Mission
     */
    public function setSousDomaine(\Atos\MissionRecensementBundle\Entity\Domaine $sousDomaine = null)
    {
        $this->sousDomaine = $sousDomaine;

        return $this;
    }

    /**
     * Get sousDomaine
     *
     * @return \Atos\MissionRecensementBundle\Entity\Domaine 
     */
    public function getSousDomaine()
    {
        return $this->sousDomaine;
    }
}
