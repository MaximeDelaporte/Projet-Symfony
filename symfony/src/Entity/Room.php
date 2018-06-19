<?php // src/Entity/Room.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Room {

  private $id;
  private $name;
  private $location;
  private $city;
  private $cp;
  private $description;
  private $capacity;
  private $isRented;
  private $options; //instance of options

  public function __construct() {
    $this->options = new ArrayCollection();
  }
}
