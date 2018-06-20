<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="This email address is already in use")
 */
class Users implements UserInterface, \Serializable
{
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $surname;
    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $lastname;
    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $location;

    /**
     * @Assert\Length(max=4096)
     */
    protected $plainPassword;
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
/**
* @ORM\Column(type="string", length=64)
*/
private $roles;
    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $password;

    public function __construct()
    {
        $this->isActive = true;
        $this->roles = 'ROLE_USER';
    }

    public function eraseCredentials()
    {
        return null;
    }
    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return array($this->roles);
    }
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getUsername()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        return serialize([$this->id, $this->surname, $this->email ,$this->lastname, $this->password]);
    }
 
    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [$this->id, $this->surname, $this->lastname ,$this->email ,$this->password] = unserialize($serialized, ['allowed_classes' => false]);
    }
}