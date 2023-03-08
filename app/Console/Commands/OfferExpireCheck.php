<?php

namespace App\Console\Commands;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;

class OfferExpireCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offer:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check for expired offers ond remove it ';

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
     * @return int
     */
    public function handle()
    {
//        return Command::SUCCESS;
        $expire_offers = Product::whereNotNull('offer_end_date')->where('offer_is_active',1)->get();
        $today = \Carbon\Carbon::now();
         if ($expire_offers)
         {
             foreach ($expire_offers as $expire)
             {
                 if (Carbon::parse($expire->offer_end_date)->lt($today))
              {
                  $expire->offer_end_date = null;
                  $expire->offer_is_active = 0;
                  $expire->offer_price = null;
                  $expire->save();

              }

             }

         }
    }
}
