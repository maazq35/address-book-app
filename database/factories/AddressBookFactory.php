<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AddressBook;

class AddressBookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'contact_name' => $this->faker->name,
            'contact_number' => $this->faker->phoneNumber,
            'address_line1' => $this->faker->streetAddress,
            'address_line2' => $this->faker->secondaryAddress,
            'address_line3' => $this->faker->streetSuffix,
            'pincode' => $this->faker->postcode,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'is_default_from' => false,
            'is_default_to' => false,
        ];
    }
}
