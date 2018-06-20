<?php // src/Entity/Reservations.php

namespace App\Entity;
use App\Entity\Rooms;
use App\Entity\Users;
use App\Entity\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Entity\Reservations")
 * @ORM\HasLifecycleCallbacks()
 */
class Reservations
{
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date_start;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $date_end;

    /**
     * {@inheritdoc}
     * @ORM\OneToOne(targetEntity="Rooms")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    protected $room_id; //instance of Room

    /**
     * {@inheritdoc}
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;
    /**
     * @ORM\ManyToMany(targetEntity="Options")
     * @ORM\JoinTable(name="reservation_options",
     *      joinColumns={@ORM\JoinColumn(name="reservation_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="option_id", referencedColumnName="id")}
     *      )
     */
    private $options; //instance of options

    public function __construct() {
        $this->options = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());
    }
    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();
    }

    public function getDateStart()
    {
        return $this->date_start;
    }

    public function setDateStart($date_start)
    {
        $this->date_start = $date_start;
    }
    public function getDateEnd()
    {
        return $this->date_end;
    }

    public function setDateEnd($date_end)
    {
        $this->date_end = $date_end;
    }

    public function getRoom()
    {
        return $this->room_id;
    }

    public function setRoom($room)
    {
        $this->room_id = $room;
    }

    public function getUser()
    {
        return $this->user_id;
    }

    public function setUser($user)
    {
        $this->user_id = $user;
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