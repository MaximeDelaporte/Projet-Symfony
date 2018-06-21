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
     * @var string
     *
     * @ORM\Column(type="string", unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $location;

    /**
     * @Assert\Length(max=4096)
     * @Assert\NotBlank
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

    public function getRoles(): array
    {
        return array($this->roles);
    }
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
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

        return $this;
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