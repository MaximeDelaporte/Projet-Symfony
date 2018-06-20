<?php // src/Entity/Receip.php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Entity\Receips")
 * @ORM\HasLifecycleCallbacks()
 */
class Receips
{
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
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
     * @ORM\OneToOne(targetEntity="Rooms")
     * @ORM\JoinColumn(name="room", referencedColumnName="id")
     */
    protected $room; //instance of Room

    /**
     * {@inheritdoc}
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
    */
    protected $user;


    public function getId()
    {
        return $this->id;
    }


    public function getCreatedAtValue()
    {
        return $this->creationDate;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->creationDate = new \DateTime();
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