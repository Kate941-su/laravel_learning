<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $browser->visit('/login')
                // input email field
                ->type('email', $user->email)
                // input password field (Facotry creates UserModel that default password is 'password')
                ->type('password', 'password')
                // click 'LOG IN' button
                ->press('LOG IN')
                //confirm move to '/tweet'
                ->assertPathIs('/tweet')
                ->assertSee('つぶやきアプリ');
        });
    }
}
