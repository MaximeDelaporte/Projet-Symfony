<?php // src/Entity/Receip.php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Entity\Receips")
 */
class Options
{
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
   /**
    * @ORM\creationDate;
    * @ORM\Column(type="datetime")
    */
    protected $creationDate;

    /**
     * @ORM\value;
     * @ORM\Column(type="integer")
     */
    protected $value;

    /**
     * {@inheritdoc}
     * @ORM\ManyToMany(targetEntity="Rooms", mappedBy="rooms")
     */
  protected $room; //instance of Room

    /**
     * {@inheritdoc}
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="users")
    */
    protected $user;

    public function getId()
    {
        return $this->id;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate)
    {
        $this->reationDate = $creationDate;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }


  
}