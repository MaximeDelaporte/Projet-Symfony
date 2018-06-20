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
    /**

     * {@inheritdoc}

     * @ORM\ManyToMany(targetEntity="Rooms", mappedBy="rooms")

     */
  protected $rooms; //instance of Room

  public function __construct(){
    $this->rooms = new ArrayCollection();
  }
}
