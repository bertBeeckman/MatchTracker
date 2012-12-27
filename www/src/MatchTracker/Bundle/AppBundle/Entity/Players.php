<?php

namespace MatchTracker\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Players
 *
 * @ORM\Table(name="players")
 * @ORM\Entity
 */
class Players
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=65, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var \Teams
     *
     * @ORM\ManyToOne(targetEntity="Teams")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="teams_id", referencedColumnName="id")
     * })
     */
    private $teams;



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
     * Set name
     *
     * @param string $name
     * @return Players
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Players
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set teams
     *
     * @param \MatchTracker\Bundle\AppBundle\Entity\Teams $teams
     * @return Players
     */
    public function setTeams(\MatchTracker\Bundle\AppBundle\Entity\Teams $teams = null)
    {
        $this->teams = $teams;
    
        return $this;
    }

    /**
     * Get teams
     *
     * @return \MatchTracker\Bundle\AppBundle\Entity\Teams 
     */
    public function getTeams()
    {
        return $this->teams;
    }
}