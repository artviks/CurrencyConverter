<?php


namespace App\Services;


use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;

class CurrencyTableService
{
    public function import(): void
    {
        $xmlString = file_get_contents('https://www.bank.lv/vk/ecb.xml');
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $currencies = json_decode($json, true)['Currencies']['Currency'];

        foreach ($currencies as $currency) {
            Currency::updateOrCreate(
                $currency
            );
        }
    }

}
