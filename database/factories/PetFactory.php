<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dog_breeds = [
            'Mixed Breed (Criollo)',
            'Labrador Retriever',
            'German Shepherd Dog',
            'French Bulldog',
            'Golden Retriever',
            'Pug',
            'Pinscher',
            'Pit Bull',
            'Beagle',
            'Shih Tzu',
            'Yorkshire Terrier',
            'Chihuahua',
            'Poodle',
            'Schnauzer',
            'Cocker Spaniel',
            'Boston Terrier',
            'Rottweiler',
            'Siberian Husky',
            'Boxer',
            'Doberman Pinscher',
            'Border Collie',
        ];
        $cat_breeds = [
            'Mixed Breed (Criollo)',
            'Turkish Angora',
            'Siamese',
            'Persian',
            'Moggie (Mixed Breed)',
            'Bengal',
            'Himalayan',
            'Maine Coon',
            'Ragdoll',
            'Exotic Shorthair',
            'Calico',
            'Tortoiseshell Cat',
        ];
        $pet_pigs = [
            'Miniature Pig (Mini Pig)',
            'Vietnamese Pot Bellied', // Barrigón vietnamita
            'Juliana Pig',
            'Göttingen Mini Pig',
            'Kunekune',
            'Yucatan Mini Pig',
        ];
        $pet_birds = [
            'Canaries',
            'Finches (especially Zebra Finches)',
            'Budgerigars (Parakeets)', // Periquitos
            'Cockatiels (Nymphs/Carolinas)', // Ninfas o Carolinas
            'Lovebirds (Agapornis)', // Agapornis o "inseparables"
            'Conures (small to medium parrots)', // Cotorras
            'Amazon Parrots', // Loros del Amazonas
            'African Greys', // Loro Gris (Yaco) - (Popular en general, aunque puede ser menos común que los anteriores)
            'Cockatoos',
        ];
        $petnames = [
            'Luna',     // Moon (Extremely popular for females)
            'Max',      // Short for Máximo, common international name
            'Coco',     // Coconut, also a common pet name internationally
            'Bella',    // Beautiful
            'Milo',     // Very popular international name
            'Nala',     // From The Lion King, very popular
            'Rocky',    // International/English
            'Toby',     // International/English
            'Princesa', // Princess
            'Príncipe', // Prince
            'Mateo',    // A common human name used for pets (popular for males)
            'Frida',    // Popular female name
            'Kira',     // Popular female name
            'Lola',     // Popular female name
            'Zeus',     // Mythology
            'Thor',     // Mythology
            'Bebé',     // Baby
            'Corazón',  // Heart
            'Cielo',    // Sky/Heaven
            'Sol',      // Sun
            'Canela',   // Cinnamon
            'Chispa',   // Spark
            'Oso',      // Bear
            'Pelusa',   // Fuzz/Lint
            'Muñeca',   // Doll (for females)
            'Negro',    // Black (often used regardless of actual color, can be affectionate)
            'Negra',
            'Blanca',   // White
            'Bimba',    // Cute/Playful
            'Peluche',  // Plush/Stuffed Animal
            'Capitán',  // Captain
            'Reina',    // Queen
            'Rey',      // King
            'Chiquito', // Little one
            'Linda',    // Pretty
            'Lindo',
            'Duque',    // Duke
            'Maya',
            'Chiqui',    // Diminutive of 'Chiquito'
            'Pecas',    // Freckles
            'Rufo',     // Ruff
            'Sultán',   // Sultan
            'Brownie',
            'Muffin',
            'Chocolate',
            'Galleta',  // Cookie
            'Tinto',    // Black coffee/Red Wine (popular in Colombia)
            'Oliver',
            'Daisy',
            'Sam',
            'Jack',
            'Lucy',
            'Paco',
            'Bruno',
            'Leo',
            'Molly',
            'Copper',
            'Mía',
            'Jade',
            'Rocky',
            'Buddy',
            'Simba',
            'Hera',
            'Dante',
            'Noé',
            'Gala',
            'Gordito',  // Chubby (affectionate)
            'Gordita',
            'Flaco',    // Skinny (affectionate)
            'Flaca',
            'Michi',    // Common term for a cat/kitty
            'Río',      // River
            'Trufa',    // Truffle
            'Niebla',   // Fog
            'Selena',   // Moon (Greek)
            'Pancho',
            'Papi',
            'Mami',
            'Goliat',
            'Fiona',
            'Kala',
            'Pipo',
            'Otto',
            'Kaiser',
            'Danna',
            'Tita',
            'Sasha',
            'Kiko',
            'Mora',
            'Pili',
            'Curro',
            'Teka',
            'Boss',
            'Yoda',
            'Kenai',
            'Lilo',
            'Stich',
            'Golfo',
            'Nemo',
            'Shakira', // Sometimes used for pets, referencing the Colombian star
            'Juan',
            'Sofía',
            'Tigre',    // Tiger
            'Chico',    // Boy/Kid
            'Chica',    // Girl/Kid
            'Bambi',
            'Huesos',   // Bones
            'Choco',
            'Duquesa',
            'Fidel',
            'Lucas',
            'Cleo',
        ];

        $kind = fake()->randomElement(['Dog', 'Cat', 'Bird', 'Pig']);
        switch ($kind) {
            case 'Dog':
                $breed = fake()->randomElement($dog_breeds);
                break;
            case 'Cat':
                $breed = fake()->randomElement($cat_breeds);
                break;
            case 'Bird':
                $breed = fake()->randomElement($pet_birds);
                break;
            case 'Pig':
                $breed = fake()->randomElement($pet_pigs);
                break;
        }
        return [
            'name' => fake()->randomElement($petnames),
            'kind' => $kind,
            'weight' => fake()->numerify('#.#'), // weight in kg
            'age' => fake()->numerify('#'), // age in years
            'breed' => $breed,
            'location' => fake()->city(),
            'description' => fake()->sentence(8)
        ];
    }
}
