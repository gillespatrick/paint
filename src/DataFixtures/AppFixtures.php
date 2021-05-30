<?php

namespace App\DataFixtures;

use App\Entity\Blogpost;
use App\Entity\Category;
use App\Entity\Paint;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this-> encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('us_US');


        // Create User
        $user = new User();

        $user -> setEmail('user@test.com')
              -> setFirstname($faker -> firstName())
              -> setLastname($faker -> lastName())
              -> setPhone($faker -> phoneNumber())
              -> setAbout($faker -> text())
              -> setInstagram('Instagram')
              -> setRoles(['ROLE_PAINT']);

              $password = $this-> encoder -> encodePassword($user,'passord');
              $user -> setPassword($password);


        
         $manager->persist($user);


        // Create Blogpost
         for ($i=0; $i < 10; $i++){
             $blogpost = new Blogpost();

             $blogpost -> setTitle($faker -> word(3,true))
                       -> setCreateAt($faker -> dateTimeBetween('-6 month','now'))
                       -> setContent($faker -> text(350))
                       -> setSlug($faker -> slug(3))
                       -> setUser($user);

                       $manager->persist($blogpost);
         }

        //Create Categories
        for ($j = 0; $j < 5; $j++){
            $cat = new Category();

            $cat -> setName($faker -> word())
                 -> setDescription($faker -> words(10, true))
                 -> setSlug($faker -> slug());

                 $manager -> persist($cat);


                  //Create paint
        for($k = 0; $k < 2; $k++){

            $p = new Paint();

            $p -> setName($faker -> words(3,true))
               ->setHeigth($faker -> randomfloat(2,20,60))
               -> setWidth($faker -> randomFloat(2,20,60))
               ->setOnSale($faker -> randomElement([true,false]))
               -> setMakingDate($faker -> dateTimeBetween('-6 month','now'))
               ->setCreateAt($faker -> dateTimeBetween('-6 month','now'))
               -> setDescription($faker -> text())
               -> setPortfolio($faker -> randomElement([true,false])) 
               -> setSlug($faker -> slug())
               -> setFile('img/logo.png')
               -> addCategory($cat)
               -> setPrice($faker -> randomFloat(2,100,9999))
               -> setUser($user);

               $manager -> persist($p);
            }
        }

       

        $manager->flush();
    }
}
