<?php

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;

class OauthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->delete();

        $clientId = Uuid::uuid4();

        DB::table('oauth_clients')->insert([
            'id' => $clientId,
            'secret' => str_random(6),
            'name' => 'TestClient'
        ]);

        DB::table('oauth_client_endpoints')->delete();

        DB::table('oauth_client_endpoints')->insert([
            'client_id' => $clientId,
            'redirect_uri' => 'http://notemi.dev/oauth2/notnot/access-code' // Anything you need
        ]);        
    }
}