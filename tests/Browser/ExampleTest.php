<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testPaymentFunction()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/payment')
                    ->assertSee('Payment')
                    ->type('cname', 'Name')
                    ->type('cardNum', '1234567890123456')
                    ->type('cvv', '345')
                    ->radio('cardType', 'visa')
                    ->type('epdate','12/12')
                    ->press('submit')
                    ->assertPathIs('/payment');

        });
    }
}
