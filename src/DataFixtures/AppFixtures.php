<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\EscapeGame;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($p = 0; $p < 5; $p++){

          $user = new User();
          $user->setFirstName('Jean Mi' . $p);
          $user->setLastName('Chou');
          $user->setEmail('jean-mi'. $p.'@mail.com');
          $user->setPassword('azerty');
          $user->setPseudo('JM');
          $manager->persist($user);


          $date_time = new \DateTime("2020-10-31 18:00:00");
          $date_time->setTime(18, 00);

          $duration = new \DateTime();
          $duration->setTime(00, 60);


          $eg = new EscapeGame();
          $eg->setUser($user);
          $eg->setTitle('Perdu dans la forêt' .$p);
          $eg->setNumberMin(2);
          $eg->setNumberMax(8);
          $eg->setPrivate('true');
          $eg->setExcerpt('Ceci est un extrait');
          $eg->setSolution('Ceci est une solution');
          $eg->setDuration($duration);
          $eg->setDateTime($date_time);
          $eg->setCategoryName('Horreur');
          $eg->setResumeText('Ceci est un resume');
          $eg->setIntroductionText('Ceci est une introduction');
          $eg->setInstructionsText('ceci est des instructions');
          $eg->setHappyEndText('Fin joyeuse');
          $eg->setGameOverText('ceci est une game over');


          $manager->persist($eg);

        }
        $manager->flush();
    }
}
