<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'name'      => 'Pelanggan 1',
            'address'   => 'Tirtoyoso VI',
            'invoice'   => 'INV-001',
            'weight'    => '1000',
            'service'   => 'Servicenya',
            'price'     => '100001',
            'status'    => 'OKE aja',
        ]);

        Transaction::create([
            'name'      => 'Pelanggan 2',
            'address'   => 'Tirtoyoso 2',
            'invoice'   => 'INV-002',
            'weight'    => '1000',
            'service'   => 'Servicenya',
            'price'     => '100002',
            'status'    => 'Oke lagi',
        ]);
    }
}
