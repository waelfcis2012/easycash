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

    protected function gernerateId(): String{
        return $this->faker->uuid();
    }
    protected function gernerateAmount(): Float{
        return $this->faker->randomFloat('0', 0, 1000);
    }
    protected function gernerateCurrency(): String{
        return 'USD';
    }
    protected function gerneratePhone(): String{
        return $this->faker->phoneNumber;
    }
    protected function gernerateStatus(): String {
        return $this->faker->randomElement([1, 2, 3]);
    }
    protected function gernerateDate(): String{
        return $this->faker->dateTime()->format('Y-m-d H:i:s');
    }
}