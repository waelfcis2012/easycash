<?php

namespace App\Services\Generators\Providers;

use App\Services\Generators\Providers\AbstractProvider;

class YProvider extends AbstractProvider
{
    protected $key = "Y";

    protected function gernerateId(){
        return $this->faker->regexify('[a-z0-9]{4}-[a-z0-9]{4}');
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
        return $this->faker->randomElement([100, 200, 300]);
    }
    protected function gernerateDate(){
        return $this->faker->dateTime()->format('Y-m-d H:i:s');
    }

}