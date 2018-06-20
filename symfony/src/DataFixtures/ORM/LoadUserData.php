<?php //src/DataFixtures/ORM/LoadUserData.php

namespace App\DataFixtures\ORM;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadUserData extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {

        $admin = new Users();
        $admin->setLastname('min');
        $admin->setSurname('ad');
        $admin->setEmail('ad@min.fr');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setLocation('skies');
        $plainPassword = 'Azerty123';
        $admin->setPassword($this->encoder->encodePassword($admin, $plainPassword));

        $manager->persist($admin);

        $manager->flush();
        $this->addReference('category-administrator', $admin, $plainPassword);
    }
}