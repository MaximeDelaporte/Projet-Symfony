<<<<<<< refs/remotes/origin/dev
<?php // src/Entity/Rooms.php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 */
class Rooms {
=======
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class Rooms 
{
>>>>>>> create entity rooms, registerOption and register Room
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
<<<<<<< refs/remotes/origin/dev
     * @ORM\Column(type="string", length=50)
     */
    protected $name;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $adress;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $city;
    /**
     * @ORM\Column(type="integer")
     */
    protected $postal_code;
=======
     * @ORM\Column(type="string", length=120)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=5)
     */
    protected $location;

    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=5)
     */
    protected $cp;

>>>>>>> create entity rooms, registerOption and register Room
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $description;
<<<<<<< refs/remotes/origin/dev
    /**
     * @ORM\Column(type="integer")
     */
    protected $capacity;
    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    protected $isRented;
    /**
     * @ORM\ManyToMany(targetEntity="Options")
     * @ORM\JoinTable(name="rooms_options",
     *      joinColumns={@ORM\JoinColumn(name="room_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="option_id", referencedColumnName="id")}
     *      )
     */
    private $options; //instance of options


    public function __construct() {
        $this->options = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
=======

    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     */
    protected $capacity;

    /**
     * @ORM\Column(type="boolean", value=false)
     */
    protected $isRented;

    /**
     * @ORM\Column(type="date")
     */
    protected $rentingDateBegin;

    /**
     * @ORM\Column(type="date")
     */
    protected $rentingDateEnd;

    /**
     * @ORM\Column(type="string")
     */
    protected $options;

    /**
     * @ORM\Column(type="int")
     */
    protected $pastRentingUsers;

    /**
     * @ORM\Column(type="int")
     */
    protected $currentRentingUser;

    
    /**
     * GETTER SETTER name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName($name)
>>>>>>> create entity rooms, registerOption and register Room
    {
        return $this->name;
    }

<<<<<<< refs/remotes/origin/dev
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getAdress()
    {
        return $this->adress;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;
    }
    public function getCity()
=======
    /**
     * GETTER SETTER location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getLocation($location)
    {
        return $this->location;
    }

    /**
     * GETTER SETTER city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity($location)
>>>>>>> create entity rooms, registerOption and register Room
    {
        return $this->city;
    }

<<<<<<< refs/remotes/origin/dev
    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getDescription()
    {
        return $this->description;
    }

=======
    /**
     * GETTER SETTER cp
     */
    public function setCP($cp)
    {
        $this->cp = $cp;
    }

    public function getCP($cp)
    {
        return $this->cp;
    }

    /**
     * GETTER SETTER description
     */
>>>>>>> create entity rooms, registerOption and register Room
    public function setDescription($description)
    {
        $this->description = $description;
    }

<<<<<<< refs/remotes/origin/dev
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

=======
    public function getDescription($description)
    {
        return $this->description;
    }

    /**
     * GETTER SETTER isRented
     */
    public function setIsRented($isRented)
    {
        $this->isRented = $isRented;
    }

    public function getIsRented($isRented)
    {
        return $this->isRented;
    }

    /**
     * GETTER SETTER capacity
     */
>>>>>>> create entity rooms, registerOption and register Room
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

<<<<<<< refs/remotes/origin/dev
    public function getIsRented()
    {
        return $this->isRented;
    }

    public function setIsRented($isRented)
    {
        $this->isRented = $isRented;
    }
    public function getOptions()
    {
        return $this->options;
    }
    public function setOptions($options)
    {
        $this->options = $options;
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
=======
    public function getCapacity($capacity)
    {
        return $this->capacity;
    }

    /**
     * GETTER SETTER rentingDateBegin
     */
    public function setRentingDateBegin($rentingDateBegin)
    {
        $this->rentingDateBegin = $rentingDateBegin;
    }

    public function getRendingdateBegin($rentingDateBegin)
    {
        return $this->rentingDateBegin;
    }

    /**
     * GETTER SETTER rentingDateEnd
     */
    public function setRentingDateEnd($rentingDateEnd)
    {
        $this->rentingDateEnd = $rentingDateEnd;
    }

    public function getRendingdateEnd($rentingDateEnd)
    {
        return $this->rentingDateEnd;
    }

    /**
     * GETTER SETTER option
     */
    public function setOption($option)
    {
        $this->$options = $options;
    }

    public function getOption($option)
    {
        return $this->option;
    }

    /**
     * GETTER SETTER pastRentingUser
     */
    public function setPastRentingUsers($pastRentingUsers)
    {
        $this->pastRentingUsers = $pastRentingUsers;
    }

    public function getPastRentingUsers($pastRentingUsers)
    {
        return $this->pastRentingUsers;
    }
        
    /**
     * GETTER SETTER currentRentingUser
     */
    public function setCurrentRentingUser($currentRentingUser)
    {
        $this->currentRentingUser = $currentRentingUser;
    }

    public function getCurrentRentingUser($currentRentingUser)
    {
        return $this->currentRentingUser;
    }

>>>>>>> create entity rooms, registerOption and register Room
}