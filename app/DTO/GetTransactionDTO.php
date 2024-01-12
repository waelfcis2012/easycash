<?php

namespace App\DTO;

class GetTransactionDTO
{
    public string|null $provider;
    public string|null $status;
    public float|null $min;
    public float|null $max;
    public string|null $currency;

    public function __construct(string $provider = null, string $statusCode = null, float $amounteMin = null, float $amounteMax = null, string $currency = null)
    {
        $this->provider = $this->getProvider($provider);
        $this->status = $this->getStatus($statusCode);
        $this->min = $amounteMin;
        $this->max = $amounteMax;
        $this->currency = $currency;
    }

    private function getProvider(string $provider = null) : string|null {
        switch($provider){
            case "DataProviderW":
                return "W";
            case "DataProviderX":
                return "X";
            case "DataProviderY":
                return "Y";
        }
        return null;
    }

    private function getStatus(string $statusCode = null) : string|null {
        switch($statusCode){
            case "paid":
                return 1;
            case "pending":
                return 0;
            case "reject":
                return -1;
        }
        return null;
    }
}