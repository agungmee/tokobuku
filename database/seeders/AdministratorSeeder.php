<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrator = new User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "admin@tokobuku.com";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = Hash::make("tokobuku");
        $administrator->avatar = "belum-ada.png";
        $administrator->address = "Jakarta Timur";

        $administrator->save();

        $this->command->info("User Admin Berhasil Dibuat");

    }
}
