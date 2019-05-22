<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Application;

class ApplicationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $app = [
            [
                'name' => 'TV Congo', 
                'description' => "Site d'informations sur les dernères actualités Congolaises, Africaines, Internationales ...", 
                'url' => 'tvcongo.com'
            ],
            [
                'name' => 'MPC Congo',
                'description' => 'Association Mouvement Panafricain et Citoyen',
                'url' => 'mpc-congo.com'
            ],
            [
                'name' => 'Hess KN', 
                'description' => 'Portfolio Hess-KN',
                'url' => 'hess-kn.com'
            ],
        ];

        foreach ($app as $value) {
            $_app = new Application();
            $_app->setName($value['name']);
            $_app->setDescription($value['description']);
            $_app->setUrl($value['url']);

            $manager->persist($_app);
        }

        $manager->flush();
    }
}
