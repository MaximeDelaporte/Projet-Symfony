<?php // src/Entity/Receip.php

namespace App\Entity;
use App\Entity\Rooms;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Entity\Receips")
 */
class Receips
{
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
    
   /**
    * @ORM\Column(type="datetime")
    */
    protected $creationDate;

    /**
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
        $this->creationDate = $creationDate;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getRoom()
    {
        return $this->room;
    }

    public function setRoom($room)
    {
        $this->room = $room;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        return serialize([
            $this->id, 
            $this->creationDate, 
            $this->value, 
            $this->room,
            $this->user
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [
            $this->id, 
            $this->creationDate, 
            $this->value, 
            $this->room,
            $this->user
        ];
    }



  
}