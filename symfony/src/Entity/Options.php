<?php // src/Entity/Option.php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
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
     * @ORM\Column(type="string", length=40)
     */
  protected $name;
    /**
     * @ORM\Column(type="integer")
     */
  protected $price;

  public function __construct(){
    $this->rooms = new ArrayCollection();
  }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function __toString() {
        return $this->name;
    }
    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        return serialize([$this->id, $this->name, $this->price]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [$this->id, $this->name, $this->price] = unserialize($serialized, ['allowed_classes' => false]);
    }
}
