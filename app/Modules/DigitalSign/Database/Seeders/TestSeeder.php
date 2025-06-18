<?php

namespace App\Modules\DigitalSign\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\DigitalSign\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = [
            [
                'key'           => 'key-1',
                'desc'          => 'Descriptions for Key-1',
                'created_by'    => 1,
            ],
            [
                'key'           => 'key-2',
                'desc'          => 'Descriptions for Key-2',
                'created_by'    => 1,
            ],
        ];

        foreach ($dt as $r)
        {
            Test::create($r);
        }
    }
}
