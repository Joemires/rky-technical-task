<?php

namespace Database\Seeders;

use App\Enums\CurrencyEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Software Engineer',
                'description' => 'Develop and maintain software applications',
                'location' => 'Lagos',
                'category' => 'IT',
                'company' => 'TechCo',
                'salary' => '500000',
                'currency' => CurrencyEnum::NGN_Naira,
                'created_at' => '2023-09-01 10:00:00',
            ],
            [
                'title' => 'Marketing Manager',
                'description' => 'Plan and execute marketing campaigns',
                'location' => 'Abuja',
                'category' => 'Marketing',
                'company' => 'AdvertCo',
                'salary' => '400000',
                'currency' => CurrencyEnum::NGN_Naira,
                'created_at' => '2023-09-01 10:00:00',
            ],
            [
                'title' => 'Data Scientist',
                'description' => 'Analyze and interpret complex data',
                'location' => 'Remote',
                'category' => 'Data Science',
                'company' => 'DataCorp',
                'salary' => '600000',
                'currency' => CurrencyEnum::NGN_Naira,
                'created_at' => '2023-09-01 10:00:00',
            ],
            [
                'title' => 'Web Developer',
                'description' => 'Build and maintain websites',
                'location' => 'Lagos',
                'category' => 'IT',
                'company' => 'WebMasters',
                'salary' => '450000',
                'currency' => CurrencyEnum::NGN_Naira,
                'created_at' => '2023-09-01 10:00:00',
            ],
            [
                'title' => 'Sales Representative',
                'description' => 'Generate leads and close sales',
                'location' => 'Port Harcourt',
                'category' => 'Sales',
                'company' => 'SalesGen',
                'salary' => '250000',
                'currency' => CurrencyEnum::NGN_Naira,
                'created_at' => '2023-09-01 10:00:00',
            ],
            [
                'title' => 'PHP Developer',
                'description' => 'Looking for an experienced PHP Developer to join our dynamic team. Must have experience with Laravel and MySQL.',
                'location' => 'Lagos',
                'category' => 'IT',
                'company' => 'Tech Solutions',
                'salary' => '700000',
                'currency' => CurrencyEnum::NGN_Naira,
                'created_at' => '2023-09-01 10:00:00',
            ],
            [
                'title' => 'Frontend Developer',
                'description' => 'We need a creative Frontend Developer skilled in React and Tailwind CSS. Remote work is available.',
                'location' => 'Remote',
                'category' => 'IT',
                'company' => 'Creative Minds',
                'salary' => '60000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-09-05 15:30:00',
            ],
            [
                'title' => 'Marketing Manager',
                'description' => 'Seeking a Marketing Manager with 5+ years of experience in digital marketing and SEO strategies.',
                'location' => 'New York',
                'category' => 'Marketing',
                'company' => 'Brand Hub',
                'salary' => '80000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-08-28 09:45:00',
            ],
            [
                'title' => 'Data Scientist',
                'description' => 'Join our team as a Data Scientist. Must have proficiency in Python, R, and machine learning frameworks.',
                'location' => 'San Francisco',
                'category' => 'Data Science',
                'company' => 'DataWorks',
                'salary' => '120000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-08-20 08:20:00',
            ],
            [
                'title' => 'Sales Executive',
                'description' => 'Looking for a results-driven Sales Executive with excellent communication skills and experience in B2B sales.',
                'location' => 'Chicago',
                'category' => 'Sales',
                'company' => 'Salesify',
                'salary' => '70000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-09-10 11:00:00',
            ],
            [
                'title' => 'Human Resources Specialist',
                'description' => 'HR Specialist needed with experience in recruitment, employee relations, and HR compliance.',
                'location' => 'Boston',
                'category' => 'Human Resources',
                'company' => 'People First',
                'salary' => '65000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-09-12 12:30:00',
            ],
            [
                'title' => 'Product Manager',
                'description' => 'We are looking for a Product Manager to oversee product development from ideation to launch.',
                'location' => 'Austin',
                'category' => 'Product Management',
                'company' => 'Innovatech',
                'salary' => '90000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-09-03 14:10:00',
            ],
            [
                'title' => 'Graphic Designer',
                'description' => 'Creative Graphic Designer needed for a variety of design projects including branding, web, and print.',
                'location' => 'Los Angeles',
                'category' => 'Design',
                'company' => 'Design Studio',
                'salary' => '55000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-09-07 16:00:00',
            ],
            [
                'title' => 'Network Administrator',
                'description' => 'Seeking a Network Administrator to manage and maintain our company’s IT network and infrastructure.',
                'location' => 'Denver',
                'category' => 'IT',
                'company' => 'Secure Networks',
                'salary' => '75000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-09-14 09:15:00',
            ],
            [
                'title' => 'Business Analyst',
                'description' => 'We are hiring a Business Analyst to improve our business processes and enhance operational efficiency.',
                'location' => 'Seattle',
                'category' => 'Business Analysis',
                'company' => 'BizAnalyze',
                'salary' => '85000',
                'currency' => CurrencyEnum::US_Dollar,
                'created_at' => '2023-09-11 13:50:00',
            ],
        ];

        DB::table('job_listings')->insert(values: $jobs);
    }
}
