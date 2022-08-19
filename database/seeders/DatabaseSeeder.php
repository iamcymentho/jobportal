<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();

        \App\Models\Company::factory(20)->create();

        \App\Models\Job::factory(20)->create();


        $categories = [

            'Technology',
            'Engineering',
            'Medical',
            'Construction',
            'Software Development',
            'Music Practitioner',
            'Accountant',
            'Administrative Assistant/Secretary',
            'Advertising',
            'Chief Financial Officer',
            'Consultant',
            'Human Resources',
            'Insurance Agent',
            'Investment Banker',
            'Lawyer',
            'Book Publishing',
            'Freelance Writer',
            'Public Relations',
            'Web Developer',
            'Writer/Editor',
            'Certified Nursing Assistant',
            'Doctor',
            ' Forensic Psychologist',
            'Hospitalist',
            ' Mental Health Counselor',
            'Nurse',
            ' Orthodontist',
            ' Paramedic',
            ' Pediatrician',
            'Physician Assistant',
            ' Psychiatrist',
            'Psychologist',
            'Social Worker',
            'Veterinarian',
            ' Bank Teller',
            ' Call Center',
            ' Hair Stylist',
            ' Personal Fitness Trainer',
            ' Retail',
            'Sales',
            'Waiter',
            'Front-End Developer',
            ' Back End Developer',
            ' Computer Programmer',
            ' Computer Systems Administrator',
            ' Database Administrator',
            '  Programmer',
            'Software Developer',
            'Web Developer',
            'Veterinarian',
            'Animal Welfare Veterinarian',
            ' Aquatic Veterinarian',
            ' Avian Veterinarian',
            'Bovine Veterinarian',
            'Clinical Pathology Vet Tech',


        ];

        foreach ($categories as  $category) {

            # code...
            Category::create(['name' => $category]);
        }


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
