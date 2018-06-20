<?php // src/Entity/Option.php

namespace App\Entity;

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
<<<<<<< Updated upstream:symfony/src/Entity/Options.php
     * @ManyToMany(targetEntity="Rooms", mappedBy="rooms"
=======
<<<<<<< Updated upstream:src/Entity/Options.php
     * {@inheritdoc}
=======
     * @ORM\ManyToMany(targetEntity="Rooms", mappedBy="rooms")
>>>>>>> Stashed changes:symfony/src/Entity/Options.php
>>>>>>> Stashed changes:src/Entity/Options.php
     */
  protected $rooms; //instance of Room

  public function __construct(){
    $this->rooms = new ArrayCollection();
  }
}
