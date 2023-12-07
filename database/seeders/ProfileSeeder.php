<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirm = $this->command->confirm('Yakin Add profile?');
        $string = "failed add profile";
        if($confirm){
            $data = [
                'name' => 'Usep Gunawan',
                'alamat' => '2330083110000103',
                'hobi' => 'Futsal, badminton, footbal',
                'no_peserta' => '2330083110000103',
                'repository' => 'https://github.com/usepgnwan/SKT_2330083110000103_USEP_GUNAWAN',
                'image'  => '',
            ];
            Profile::insert($data);
            $string = 'Success add profile';
        }
        return $this->command->info($string);

    }
}
