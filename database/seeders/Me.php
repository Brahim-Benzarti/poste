<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Me extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Brahim Benzarti', 'brahim.al.benzarti@gmail.com', NULL, '$2y$10\$ynkPNehcSVy5WKfrnCTUvuRdhOi9.8drQ3kQlzzAbHzwIzqQV8lGW', NULL, NULL, NULL)");
    }
}
