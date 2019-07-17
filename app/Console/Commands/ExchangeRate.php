<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'TCMB web sitesinden son dolar ve euro kurunu alır.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$content = file_get_contents("http://www.tcmb.gov.tr/kurlar/today.xml")) {
            $this->error("Houston, we have a problem!");
            exit;
        }
        $xml   = (array) simplexml_load_string($content);
        $date = date("Y-m-d", strtotime("+1 day", strtotime($xml["@attributes"]["Tarih"])));
        if (!$exchange_rate = \App\Models\ExchangeRate::where('date', $date)->first()) {
            $exchange_rate        = new  \App\Models\ExchangeRate();
            $exchange_rate->date = $date;
        }
        foreach ($xml["Currency"] as $val) {
            $val = (array) $val;
            if ($val["@attributes"]["CurrencyCode"] == "USD") {
                $exchange_rate->usd = (float) $val["BanknoteSelling"];
            }
            if ($val["@attributes"]["CurrencyCode"] == "EUR") {
                $exchange_rate->eur = (float) $val["BanknoteSelling"];
            }
            if ($val["@attributes"]["CurrencyCode"] == "GBP") {
                $exchange_rate->gbp = (float) $val["BanknoteSelling"];
            }
        }
        if (empty($exchange_rate->usd) or empty($exchange_rate->eur)) {
            $this->error("Döviz kurlarını alırken bir sorun oluştu.");
        }

        $exchange_rate->save();
        $this->info(date("d.m.Y", strtotime($date)) . " tarihli kurlar başarı ile kaydedilmiştir.");


    }
}
