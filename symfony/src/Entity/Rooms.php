<?php // src/Entity/Rooms.php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Rooms {
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $name;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $location;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $city;
    /**
     * @ORM\Column(type="integer")
     */
    protected $cp;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $description;
    /**
     * @ORM\Column(type="integer")
     */
    protected $capacity;
    /**
     * @ORM\Column(type="boolean", default=FALSE)
     */
    protected $isRented;
    /**
     * @ManyToMany(targetEntity="Options", inversedBy="rooms"
     *@JoinTable(name="options_rooms")
     */
    private $options; //instance of options
    /**
     * @OneToOne(targetEntity="Users", mappedBy="id")
     */

    protected $currentRentingUser; //instance of User

    public function __construct() {
    $this->options = new ArrayCollection();
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }
    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCP()
    {
        return $this->cp;
    }

    public function setCP($cp)
    {
        $this->cp = $cp;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    public function getIsRented()
    {
        return $this->isRented;
    }

    public function setIsRented($isRented)
    {
        $this->isRented = $isRented;
    }
    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        return serialize([$this->id, $this->name, $this->description, $this->location, $this->city]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [$this->id, $this->name, $this->description, $this->location, $this->city] = unserialize($serialized, ['allowed_classes' => false]);
    }
}

