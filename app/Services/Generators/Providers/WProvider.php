<?php

namespace App\Services\Generators\Providers;

use App\Services\Generators\Providers\AbstractProvider;

class WProvider extends AbstractProvider
{
    protected $fileName = 'DataProviderW.json';
    
    protected function gernerateId(){
        return $this->faker->unique()->numerify("########");
    }
    protected function gernerateAmount(){
        return $this->faker->randomFloat('2', 0, 1000);
    }
    protected function gernerateCurrency(){
        return 'EGP';
    }
    protected function gerneratePhone(){
        return $this->faker->phoneNumber;
    }
    protected function gernerateStatus(){
        return $this->faker->randomElement(["done", "wait", "nope"]);
    }
    protected function gernerateDate(){
        return $this->faker->dateTime()->format('Y-m-d H:i:s');
    }
}