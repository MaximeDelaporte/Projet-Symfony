<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 20/06/2018
 * Time: 14:24
 */

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->getUserData() as [$surname, $lastname, $password, $email, $location, $roles]) {
            $user = new Users();
            $user->setSurname($surname);
            $user->setLastname($lastname);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setLocation($location);
            $user->setRoles($roles);

            $manager->persist($user);
            $this->addReference($surname, $user);
        }

        $manager->flush();
    }

    private function getUserData(): array
    {
        return [
            // $userData = [$surname, $lastname, $plainPassword, $email, $location, $roles];
            ['Admin', 'Admin', '0000', 'admin@admin.admin', 'lyon', ['ROLE_ADMIN']],
            ['Test', 'Test', '0000', 'test@test.com', 'lyon', ['ROLE_USER']],
        ];
    }
}