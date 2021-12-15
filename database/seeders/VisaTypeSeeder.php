<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisaType;
class VisaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visa = [
            [
                'visa_type'=>'VISA KUNJUNGAN'
            ],
            [
                'visa_type'=>'VISA KUNJUNGAN BEBERAPA KALI PERJALANAN'
            ],
            [
                'visa_type'=>'VISA TINGGAL TERBATAS'
            ],
            [
                'visa_type'=>'VISA KUNJUNGAN BEBERAPA KALI PERJALANAN'
            ],
        ];
        foreach($visa as $a=>$value)
        {
            VisaType::create($value);
        }
    }
}
