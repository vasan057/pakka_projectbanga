<?php

use Illuminate\Database\Seeder;
use App\Model\OrderSequence;
class OrderSequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = date('y');
        $sequence = OrderSequence::insert([
            'order_sequence' => $year.'100001',
            'next_order_sequence' => $year.'100001',
            'offer_sequence' => $year.'000001',
            'next_offer_sequence' => $year.'000001',
            'offerorder_sequence' => $year.'200001',
            'next_offerorder_sequence' => $year.'200001'
        ]);
    }
}
