<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => $this->faker->word(),
            'code'        => 'INV-'.$this->faker->ean8(),
            'customer_id' => Customer::all()->random()->id,
            'description' => $this->faker->sentence(),
            'date'        => $this->faker->date(),
            'due_date'    => $this->faker->date(),
            'sub_total'   => $this->faker->numberBetween(100, 1000),
            'total'       => $this->faker->numberBetween(1000, 10000),
            'paid'        => $this->faker->boolean(),
            'sent'        => $this->faker->boolean(),
        ];
    }
}