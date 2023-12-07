<?php

namespace Database\Seeders;

use App\Models\information;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        
        
        
        $confirm = $this->command->confirm('Yakin Add information ?');
        $string = "failed add profile";
        if($confirm){
            $data = [
                'lokasi' => 'Pusat gempa berada di darat 12 km tenggara lalundu Donggala',
                'deskripsi' => 'Gempa bumi terjadi pada
                hari Selasa, tanggal 29
                Agustus 2023, pukul
                02:55:32 WIB',
                'kedalaman' => '9',
                'magnitute' => '4.3',
                'time' =>  Carbon::now(), 
            ];
            information::insert($data);
            $string = 'Success add profile';
        }
        return $this->command->info($string);

    }
}
