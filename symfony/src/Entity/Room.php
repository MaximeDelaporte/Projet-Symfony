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
  private $rentingDateBegin;
  private $rentingDateEnd;
  private $options; //instance of options
  private $pastRentingUsers; //instance of User
  private $currentRentingUser; //instance of User

  public function __construct() {
    $this->options = new ArrayCollection();
    $this->pastRentingUsers = new ArrayCollection();
  }
}
