<?php

namespace App\Services\Generators\Providers;

use App\Services\Generators\Providers\AbstractProvider;

class WProvider extends AbstractProvider
{
    protected $key = "W";
    
    protected function gernerateId(): String{
        return $this->faker->unique()->numerify("########");
    }
    protected function gernerateAmount(): Float{
        return $this->faker->randomFloat('2', 0, 1000);
    }
    protected function gernerateCurrency(): String{
        return 'EGP';
    }
    protected function gerneratePhone(): String{
        return $this->faker->phoneNumber;
    }
    protected function gernerateStatus(): String{
        return $this->faker->randomElement(["done", "wait", "nope"]);
    }
    protected function gernerateDate(): String{
        return $this->faker->dateTime()->format('Y-m-d H:i:s');
    }
}