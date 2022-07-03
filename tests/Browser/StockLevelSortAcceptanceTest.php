<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StockLevelSortingAcceptanceTest extends DuskTestCase
{
    public function testSortingFunction()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/stocklevel')
                ->assertSee('Filter and Sort')
                ->check('categories[]')
                ->radio('type', 'book.bookName DESC')
                ->press('Search')
                ->assertPathIs('/stocklevel');
        });
    }
}
