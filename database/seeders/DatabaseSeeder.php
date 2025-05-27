<?php

namespace Database\Seeders;

use App\Models\Room;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('password'),
        // ]);
    
        Room::factory()->create([
            'name' => 'CWS a',
            'type' => 'besar',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam atque laudantium fuga enim dolores magni reprehenderit cumque quos, laborum deleniti eius perspiciatis, non fugiat, quisquam assumenda iusto commodi nostrum consectetur.',
        ]);
        Room::factory()->create([
            'name' => 'CWS b',
            'type' => 'sedang',
            'desc' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut qui dolorem in nesciunt enim ratione a consectetur quo. Quibusdam, placeat. Dolore reiciendis sapiente, nemo quaerat provident accusantium ratione dignissimos recusandae.',
        ]);
        Room::factory()->create([
            'name' => 'CWS c',
            'type' => 'sedang',
            'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic omnis incidunt cumque nemo doloribus. Provident esse, vitae ratione nesciunt, quam architecto quidem mollitia iusto cupiditate cumque itaque sunt, reprehenderit aliquam.',
        ]);
        Room::factory()->create([
            'name' => 'CWS d',
            'type' => 'kecil',
            'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat praesentium, voluptatem animi optio quas facilis unde sint possimus laboriosam, molestiae, vitae vero cumque? Inventore architecto, optio doloribus officia nemo obcaecati.',
        ]);
        Room::factory()->create([
            'name' => 'CWS e',
            'type' => 'kecil',
            'desc' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit asperiores, esse corrupti a nesciunt cum expedita aperiam, doloribus rem placeat laborum blanditiis repellendus repudiandae, saepe ipsum facilis molestias. Perferendis, obcaecati.',
        ]);
    }
}
