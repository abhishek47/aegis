<?php

namespace Backpack\Settings\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * The settings to add.
     */
    protected $settings = [
        [
            'key'         => 'contact_email',
            'name'        => 'Contact form email address',
            'description' => 'The email address that all emails from the contact form will go to.',
            'value'       => 'info@aegisacademy.co.in',
            'field'       => '{"name":"value","label":"Value","type":"email"}',
            'active'      => 1,
        ],
        [
            'key'         => 'wiki_of_week',
            'name'        => 'Wiki Of the Week',
            'description' => 'Wiki Page of the week',
            'value'       => 1,
            'field'       => '{"name":"wiki_of_week","label":"Wiki Of Week","type":"integer"}',
            'active'      => 1,
        ],
        
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = DB::table('settings')->insert($setting);

            if (!$result) {
                $this->command->info("Insert failed at record $index.");

                return;
            }
        }

        $this->command->info('Inserted '.count($this->settings).' records.');
    }
}
