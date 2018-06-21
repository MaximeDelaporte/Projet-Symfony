<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\Role\Role;
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
    * @ORM\Column(type="json")
    */
    private $roles = [];
    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $password;

    public function __construct()
    {
        $this->isActive = true;
        if (empty($this->roles)){
            $this->roles = new Role('ROLE_USER');
        }

    }

    public function eraseCredentials()
    {
        $this->isActive = true;
        $this->roles = 'ROLE_USER';
    }
    public function getSalt()
    {
        return null;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;

        if (empty($roles)){
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setUsername(): void
    {
        $this->username = $this->getSurname(). $this->getLastname();
    }

    public function getUsername(): string
    {
        $this->username = $this->surname . " " . $this->lastname;
        return $this->username;
    }

    public function getEmail(): ?string
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

    public function getLocation(): ?string
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
    }
    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        return serialize([$this->id, $this->surname, $this->email ,$this->lastname, $this->password, $this->roles]);
    }
 
    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [$this->id, $this->surname, $this->lastname ,$this->email ,$this->password, $this->roles] = unserialize($serialized, ['allowed_classes' => false]);
    }


    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}