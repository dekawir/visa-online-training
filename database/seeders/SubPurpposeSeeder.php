<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubPurpose;
class SubPurpposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub = [
            [
                'visa_code'=>'211A',
                'sub_purpose'=>'BERGABUNG DENGAN ALAT ANGKUT'
            ],
            [
                'visa_code'=>'211A',
                'sub_purpose'=>'SOSIAL'
            ],
            [
                'visa_code'=>'211A',
                'sub_purpose'=>'PEMBELIAN BARANG'
            ],
            [
                'visa_code'=>'211A',
                'sub_purpose'=>'PEKERJAAN DARURAT DAN MENDESAK'
            ],
            [
                'visa_code'=>'211A',
                'sub_purpose'=>'PEMBICARAAN BISNIS'
            ],

        ];

        foreach($sub as $s=>$value)
        {
            SubPurpose::create($value);
        }
    }
}
