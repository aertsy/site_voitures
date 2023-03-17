<?php



namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Voiture;
use Faker\Factory;
use Faker\Provider\Fakecar;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('Fr-fr');

        for($i=1;$i<=10;$i++){
            $voiture = new Voiture();
            // $marque = $faker->vehicleBrand;
            // $modele = $faker->vehicleModel;
            $image = $faker->imageUrl(1000,350);
            $price = rand(5000, 50000);
            $km = rand(10000, 99000);
            $proprietaires = rand(1,5);
            $cylindree = rand(1000, 3000);
            $puissance = rand(1000, 5000);
            $miseEnCirculation = rand(1950, 2022);
            // $carburant = $faker->vehicleFuelType();
            $description = $faker->paragraph(2);
            $transmission = $faker->text;
            $texte = $faker->text;
            // '<p>'.join('<p></p>',$faker->paragraphs(5)).'</p>';
            // setPrice(mt_rand(5000, 50000))
            // setKm(mt_rand(10000, 99000))
            // setProprietaires(mt_rand(1,5))

            $voiture->setMarque(Fakecar::vehicleBrand())
                    ->setModele(Fakecar::vehicleModel())
                    ->setCarburant(Fakecar::vehicleFuelType())
                    ->setImage($image)
                    ->setPrix($price)
                    ->setKm($km)
                    ->setDescription($description)
                    ->setTexte($texte)
                    ->setCylindree($cylindree)
                    ->setPuissance($puissance)
                    ->setMiseEnCirculation($miseEnCirculation)
                    ->setTransmission($transmission)
                    ->setNbProprietaires($proprietaires);

            $manager->persist($voiture);
        }

        $manager->flush();
    }
}
