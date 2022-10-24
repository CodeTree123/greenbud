<?php

namespace Database\Seeders;

use App\Models\team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class teamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        team::create([  
            'image'  => "Najmul.jpg", 
            'name'  => "Sayed Najmul Hossain",
            'qualification'  => "B.Com (Hon's)",
            'designation'  => "Chairman"
        ]); 
        team::create([
            'image'  => "Rajib.jpg",
            'name'  =>"Engr. Md. Rajib Ahmed",
            'qualification'  => "B.Sc. Eng. (Civil & Environmental, SUST), MBA, FIEB",
            'designation'  => "Managing Director and CEO"
        ]);  
        team::create([
            'image'  => "Engr.-Syed-Tasnem-Mahmood_Director.jpg",
            'name'  =>"Engr. Syed Tasnem Mahmood",
            'qualification'  => " B.Sc. Eng. (Civil & Environmental, SUST), MIEB",
            'designation'  => "Director"
        ]);
        team::create([
            'image'  => "Dr. Khokon Debnath.jpg",
            'name'  =>"Dr. Khokon Debnath",
            'qualification'  => "",
            'designation'  => "Advisor"
        ]);
        team::create([
            'image'  => "Krishibid Md. Anwar Hossain.jpg",
            'name'  =>" Krishibid Md. Anwar Hossain",
            'qualification'  => "",
            'designation'  => "Advisor"
        ]);
        team::create([
            'image'  => "Syeed-Jesan-Mahmood-Head-of-Marketing-min-scaled.jpg",
            'name'  =>"Syeed Jesan Mahmood",
            'qualification'  => "",
            'designation'  => "Head Of Marketing & Brand Development"
        ]);
        team::create([
            'image'  => "Biplab.jpg",
            'name'  =>"Md. Biplab Hossain",
            'qualification'  => "",
            'designation'  => " Sr. Executive (Accounts & Admin)"
        ]);
        team::create([
            'image'  => "Zubair.JPG",
            'name'  =>" Engr. Syed Zubair Bin Hasan",
            'qualification'  => "B.Sc. (Textile Engineering)",
            'designation'  => "Asst. Manager, Operations"
        ]);
         
        team::create([
            'image'  => "Abdul_ALi.JPG",
            'name'  =>"  Abdul Ali",
            'qualification'  => "",
            'designation'  => "Supervisor, Service dept."
        ]);
        team::create([
            'image'  => "Farhad.jpg",
            'name'  =>"Farhad Hossain Milon",
            'qualification'  => "Diploma-in-Electrical Engineering",
            'designation'  => "Junior Engineer"
        ]);
        team::create([
            'image'  => "Nazmul.jpg",
            'name'  =>"Nazmul Hawlader Razu",
            'qualification'  => "Diploma-in-Environmental Engineering",
            'designation'  => "Junior Engineer"
        ]);
        team::create([
            'image'  => "Shuvo.jpg",
            'name'  =>"Md Shuvo Mollah",
            'qualification'  => "Diploma-in-Electrical Engineering",
            'designation'  => "Junior Engineer"
        ]);
        team::create([
            'image'  => "Masud (2).jpg",
            'name'  =>"Md. Masud Rana",
            'qualification'  => "",
            'designation'  => "Senior Technician"
        ]);
        team::create([
            'image'  => "Nayeem.JPG",
            'name'  =>"Md. Nayeem Hossain",
            'qualification'  => "",
            'designation'  => "Senior Technician"
        ]);
        team::create([
            'image'  => "Amir.jpg",
            'name'  =>"Amir Hossain",
            'qualification'  => "",
            'designation'  => " Senior Technician"
        ]);
        team::create([
            'image'  => "Rakib.jpg",
            'name'  =>"Riaz Hossain ",
            'qualification'  => "",
            'designation'  => "Technician cum Support Staff "
        ]);
        team::create([
            'image'  => "Md. Rakibul Islam.jpg",
            'name'  =>" Md. Rakibul Islam",
            'qualification'  => "",
            'designation'  => " Driver"
        ]);
    }
}
