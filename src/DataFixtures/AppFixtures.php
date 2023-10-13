<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Loueur;
use App\Entity\Modele;
use App\Entity\Voiture;
use App\Entity\Location;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
//  AppFixtures mis à disposition par symfony
{
    public function load(ObjectManager $manager): void
    // la class ObjectManager insère les données dans la bdd grâce aux method persist et flush
    // persist prend en paramètre, récupère les propriétés, et stock les données
    // flush envoie les données dans la bdd
    // void : valeur vide (qd il n'y a pas de retour 'return')
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create();
        
        $locations = [];

        for ($i = 0; $i < 50; $i++) {
            $location = new Location();
            $location->setDateLocation(new \DateTime());
            $location->setNbJrLocation($faker->numberBetween($min = 1, $max = 30));
            $location->setPrixLocation($faker->numberBetween($min = 150, $max = 1600));
            $manager->persist($location);
            $locations[] = $location;
        }

        $voitures = [];

        for ($i = 0; $i < 100; $i++) {
            $voiture = new Voiture();
            $voiture->setNom($faker->name());
            $voiture->setImage($faker->imageUrl());
            $voiture->setNbKm($faker->numberBetween(0, 2000));
            $voiture->setCreateAt(new \DateTime());
            $manager->persist($voiture);
            $voitures[] = $voiture;
        }


        $loueurs = [];

        for ($i = 0; $i < 50; $i++) {
            $loueur = new Loueur();
            $loueur->setNom($faker->lastName());
            $loueur->setPrenom($faker->firstName());
            $loueur->setAge($faker->numberBetween($min = 18, $max = 76));
            $loueur->setAdresse($faker->address());
            $loueur->setVoiture($voitures[$faker->numberBetween(3, 5)]);
            $manager->persist($loueur);
            $loueurs[] = $loueur;
        }

        $modeles = [];

        for ($i = 0; $i < 100; $i++) {
            $modele = new Modele();
            $modele->setTypeModele($faker->name());
            $modele->setAnneeModele($faker->numberBetween(1999, 2023));
            $modele->setConso($faker->numberBetween(2, 15));
            $modele->addloueur($loueurs[$faker->numberBetween(0, 49)]);
            $modele->addLocation($locations[$faker->numberBetween(0, 49)]);
            $manager->persist($modele);
            $modeles[] = $modele;
        }


        $manager->flush();
    }
}
