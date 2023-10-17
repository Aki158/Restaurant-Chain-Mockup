<?php

namespace Helpers;

use Faker\Factory;

use Models\Employees\Employee;
use Models\RestaurantChains\RestaurantChain;
use Models\RestaurantLocations\RestaurantLocation;

class RandomGenerator {
    public static function restaurantChain(): RestaurantChain {
        $faker = Factory::create();

        return new RestaurantChain(
            $faker->company(),
            (int)$faker->year(),
            $faker->realText(),
            $faker->url(),
            $faker->phoneNumber(),
            $faker->randomElement(["IT", "food", "Agriculture"]),
            $faker->name(),
            $faker->boolean(),
            $faker->country(),
            $faker->name(),
            $faker->randomNumber(),
            $faker->randomNumber(4, true),
            self::generateArray("restaurantLocations"),
            $faker->randomElement(["Hamburgers", "curry", "pasta", "grilled fish", "tempura"]),
            $faker->randomNumber(2, false),
            $faker->company()
        );
    }

    public static function restaurantLocation(): RestaurantLocation {
        $faker = Factory::create();
        
        return new RestaurantLocation(
            $faker->name(),
            $faker->address(),
            $faker->city(),
            $faker->randomElement(["Crowded", "Moderate", "Empty"]),
            $faker->postcode(),
            self::generateArray("employees"),
            $faker->boolean(),
            $faker->boolean()
            );
    }

    public static function employee(): Employee {
        $faker = Factory::create();

        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),
            $faker->jobTitle(),
            $faker->randomFloat(),
            $faker->date(),
            array($faker->randomElement(["Good design","Good taste", "Good Customer service"]))
        );
    }

    public static function generateArray(string $input, int $min = 2, int $max = 5): array {
        $faker = Factory::create();
        $arr = [];
        $l = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $l; $i++) {
            if($input == "restaurantChains"){
                $arr[$i] = self::restaurantChain();
            }
            elseif($input === "restaurantLocations"){
                $arr[$i] = self::restaurantLocation();
            }
            else if($input === "employees"){
                $arr[$i] = self::employee();
            }
        }
        return $arr;
    }
}
?>