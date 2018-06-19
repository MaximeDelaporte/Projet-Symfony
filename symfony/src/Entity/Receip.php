<?php // src/Entity/Receip.php

namespace App\Entity;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class Receip {
  private $id;
  private $createdAt;
  private $updatedAt;
  private $value;
  private $room; //instance of Room
  private $user; //instance of User
  private $reservation; //instance of Reservation

  public function setCreatedAtValue(LifecycleEventArgs $event){
      $this->createdAt = new \DateTime();
  }
    public function setUpdatedAtValue(LifecycleEventArgs $event){
        $this->updatedAt = new \DateTime();
    }
}
