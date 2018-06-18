<?php // src/Entity/Option.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Option
{
  private $id;
  private $name;
  private $price;
  private $rooms; //instance of Room

  public function __construct(){
    $this->rooms = new ArrayCollection();
  }
}
