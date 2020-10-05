<?php


namespace Tests\Feature\Profile;


use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserConnectsToGameTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_connects_to_game_and_player_id_is_provided()
    {
        $count = User::all()->count();
        self::assertEquals(0, $count);

        $response = $this->get('/api/v1/login');

        $response->assertStatus(200);
        $response->assertJson([
            'id' => 1
        ]);

        $count = User::all()->count();
        self::assertEquals(1, $count);
    }

}
