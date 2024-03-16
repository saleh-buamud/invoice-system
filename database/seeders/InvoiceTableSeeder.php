<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
       $faker = Factory::create();
       for($i=1 ; $i<=15;$i++){

        $item=[
            [
                'product_name' => 'samsung',
                'unit' => 'kg',
                'quantity' => '1',
                'unit_price' => '100',
                'row_sub_total' => '500',
            ],
                [
                    'product_name' => 'iphone',
                    'unit' => 'kg',
                    'quantity' => '1',
                    'unit_price' => '400',
                    'row_sub_total' => '600',
                ],
                [
                    'product_name' => 'Nokai',
                    'unit' => 'kg',
                    'quantity' => '4',
                    'unit_price' => '400',
                    'row_sub_total' => '900',
                ],
            ];
            $data['name'] = $faker->name('male');
            $data['email'] = $faker->email;
            $data['phone'] = $this->generatNum(rand(10,14));
            $data['address'] = $faker->name;
            $data['invoice_number'] = $this->generatNum(8);
            $data['invoice_date'] = Carbon::now()->subDays(rand(1,20));
           $data['sub_total']='3333';
            $data['discount_type']='fixed';
            $data['discount_value']='333.44';
            $data['vat_value']='353.44';
            $data['shipping']='300';
            $data['total_due']='4444.66';
       }
       $invoice=Invoice::create($data); // insert data into tablra
       $invoice->detalis()->createMany($item);
      
    }
    public function generatNum($strength = 14)
    {
        $permitted_chars='0123456789';
        $input_len=strlen($permitted_chars);
        $random_string='';
        for($i=0;$i<$strength;$i++){
            $random_character=mt_rand(0,$input_len-1);
            $random_string.=$permitted_chars[$random_character];
        }
        return $random_string;
    }
}