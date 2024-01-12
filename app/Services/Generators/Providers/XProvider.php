<?php

namespace App\Services\Generators\Providers;

use App\Services\Generators\Providers\AbstractProvider;

class XProvider extends AbstractProvider
{
    const KEY_ID = "transactionIdentification";
    const KEY_AMOUNT = "transactionAmount";
    const KEY_CURRENCY = "Currency";
    const KEY_PHONE = "senderPhone";
    const KEY_STATUS = "transactionStatus";
    const KEY_DATE = "transactionDate";

    protected $key = "X";

    protected function gernerateId(){
        return $this->faker->uuid();
    }
    protected function gernerateAmount(){
        return $this->faker->randomFloat('0', 0, 1000);
    }
    protected function gernerateCurrency(){
        return 'USD';
    }
    protected function gerneratePhone(){
        return $this->faker->phoneNumber;
    }
    protected function gernerateStatus(){
        return $this->faker->randomElement([1, 2, 3]);
    }
    protected function gernerateDate(){
        return $this->faker->dateTime()->format('Y-m-d H:i:s');
    }
}