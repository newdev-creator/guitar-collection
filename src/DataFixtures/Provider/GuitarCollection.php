<?php 

namespace App\DataFixtures\Provider;

class GuitarCollectionProvider extends \Faker\Provider\Base {

    /**
     * returns a random tv show title
     *
     * @return string
     */
    public function guitarName() :string {
        $guitar = [
            'Black beauty',
            'Roxanne',
            'Fender deluxe',
            'Eko',
            'Takamine acoustique',
            
        ];

        // renvoie un nom de tv show au hasard dans le tableau ci dessus grace à mt_rand()
        return $guitar[mt_rand(0, count($guitar) - 1)];
    }
}