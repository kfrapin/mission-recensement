<?php

namespace Atos\MissionRecensementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Atos\MissionRecensementBundle\Entity\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="raisonSociale", type="string", length=100)
     */
    private $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="siren", type="string", length=9, nullable=true)
     */
    private $siren;

    /**
     * @var string
     *
     * @ORM\Column(name="nic", type="string", length=5, nullable=true)
     */
    private $nic;


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
     * Set raisonSociale
     *
     * @param string $raisonSociale
     * @return Client
     */
    public function setRaisonSociale($raisonSociale)
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    /**
     * Get raisonSociale
     *
     * @return string 
     */
    public function getRaisonSociale()
    {
        return $this->raisonSociale;
    }

    /**
     * Set siren
     *
     * @param string $siren
     * @return Client
     */
    public function setSiren($siren)
    {
        $this->siren = $siren;

        return $this;
    }

    /**
     * Get siren
     *
     * @return string 
     */
    public function getSiren()
    {
        return $this->siren;
    }

    /**
     * Set nic
     *
     * @param string $nic
     * @return Client
     */
    public function setNic($nic)
    {
        $this->nic = $nic;

        return $this;
    }

    /**
     * Get nic
     *
     * @return string 
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * To string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getRaisonSociale(); 
    }
}
