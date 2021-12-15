<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purpose;
class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purpose = [
            // [
            //     'visa_type'=>'1',
            //     'visa_code'=>'211A',
            //     'purpose'=>'KEGIATAN WISATA, KELUARGA, SOSIAL BUDAYA, PEMERINTAHAN, BISNIS'
            // ],
            // [
            //     'visa_type'=>'1',
            //     'visa_code'=>'211B',
            //     'purpose'=>'KEGIATAN KUNJUNGAN INDUSTRI'
            // ],
            // [
            //     'visa_type'=>'1',
            //     'visa_code'=>'211C',
            //     'purpose'=>'KEGIATAN JURNALISTIK DAN PERFILMAN NON KOMERSIAL'
            // ],
            [
                'visa_type'=>'3',
                'visa_code'=>'313',
                'purpose'=>'TIDAK BEKERJA UNTUK PENANAMAN MODAL ASING 1 TAHUN'
            ],
            [
                'visa_type'=>'3',
                'visa_code'=>'314',
                'purpose'=>'TIDAK BEKERJA UNTUK PENANAMAN MODAL ASING 2 TAHUN'
            ],
            [
                'visa_type'=>'3',
                'visa_code'=>'315',
                'purpose'=>'TIDAK BEKERJA UNTUK MENGIKUTI PELATIHAN DAN PENELITIAN'
            ],
            [
                'visa_type'=>'3',
                'visa_code'=>'316',
                'purpose'=>'TIDAK BEKERJA UNTUK MENGIKUTI PENDIDIKAN'
            ],            
            [
                'visa_type'=>'3',
                'visa_code'=>'317',
                'purpose'=>'TIDAK BEKERJA UNTUK PENYATUAN KELUARGA'
            ],
            [
                'visa_type'=>'3',
                'visa_code'=>'318',
                'purpose'=>'TIDAK BEKERJA UNTUK REPATRIASI'
            ],            
            [
                'visa_type'=>'3',
                'visa_code'=>'319',
                'purpose'=>'TIDAK BEKERJA SEBAGAI WISATAWAN LANJUT USIA MANCANEGARA'
            ],               
        ];

        foreach($purpose as $p =>$value)
        {
            Purpose::create($value);
        }
    }
}
