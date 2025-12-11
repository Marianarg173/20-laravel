<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        // 1️⃣ Escoger género aleatorio
        $gender = fake()->randomElement(['Male', 'Female']);

        // 2️⃣ Generar nombre según género
        $fullname = $gender === 'Male'
            ? fake()->firstNameMale() . ' ' . fake()->lastName()
            : fake()->firstNameFemale() . ' ' . fake()->lastName();

        // 3️⃣ Generar fecha de nacimiento entre 1974 y 2004
        $birthdate = fake()->dateTimeBetween('1974-01-01', '2004-12-31')->format('Y-m-d');

        // 4️⃣ Generar documento antes de la imagen (porque será el nombre del archivo)
        $document = fake()->numerify('75######');

        // 5️⃣ Crear carpeta /public/photos si no existe
        if (!file_exists(public_path('photos'))) {
            mkdir(public_path('photos'), 0777, true);
        }

        // 6️⃣ Elegir imagen según el género
        $randomNumber = rand(1, 99);
        $imageUrl = $gender === 'Male'
            ? "https://randomuser.me/api/portraits/men/{$randomNumber}.jpg"
            : "https://randomuser.me/api/portraits/women/{$randomNumber}.jpg";

        // 7️⃣ Guardar la imagen con el nombre del documento
        $imageName = $document . '.jpg';
        $imagePath = public_path('photos/' . $imageName);
        file_put_contents($imagePath, file_get_contents($imageUrl));

        // 8️⃣ Retornar los datos del usuario
        return [
            'document'          => $document,
            'fullname'          => $fullname,
            'gender'            => $gender,
            'birthdate'         => $birthdate,
            'photo'             => 'photos/' . $imageName, // ruta donde se guarda la imagen
            'phone'             => fake()->numerify('310######'),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('password'),
            'remember_token'    => Str::random(10)
          
            
        ];
    }
}
