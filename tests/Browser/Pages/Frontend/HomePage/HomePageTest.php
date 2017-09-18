<?php

namespace Tests\Browser\Pages\Frontend\HomePage;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Model\Room;
use App\Model\Hotel;
use App\Model\Place;
use App\Model\User;
use App\Model\Guest;
use App\Model\Reservation;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class HomePageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test route Homepage.
     *
     * @return void
     */
    public function testRouteHomePage()
    {
        $this->makeData(10);
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertTitle('Home page')
                    ->assertVisible('#reservation-form')
                    ->assertSee('Outstanding Places')
                    ->assertSee('Representative Hotels')
                    ->assertSee('Why should you choose us?')
                    ->assertPathIs('/');
        });
    }

    /**
     * Test show top places if not data or data of places < 7.
     *
     * @return void
     */
    public function testShowTopPlaceIfNotData()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertTitle('Home page')
                    ->assertSee('Outstanding Places')
                    ->assertSee('Sorry! The system is updating')
                    ->assertMissing('#top-3-places .container .row .col-sm-4')
                    ->assertMissing('#top-4-places .container .row .col-sm-3')
                    ->assertPathIs('/');
        }); 
    }

    /**
     * Test show top place if has data.
     *
     * @return void
     */
    public function testShowTopPlaceIfHasData()
    {   
        $this->makeData(10);
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertTitle('Home page')
                    ->assertSee('Outstanding Places')
                    ->assertVisible('#top-3-places .container .row .col-sm-4')
                    ->assertVisible('#top-4-places .container .row .col-sm-3')
                    ->assertPathIs('/');
            $count = count($browser->elements('#top-3-places .container .row .col-sm-4')) + count($browser->elements('#top-4-places .container .row .col-sm-3'));
            $this->assertTrue($count == 7);
        }); 
    }

    /**
     * Test show top hotel if not has data or data of hotel < 6.
     *
     * @return void
     */
    public function testShowTopHotelIfNotData()
    {   
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertTitle('Home page')
                    ->assertSee('Representative Hotels')
                    ->assertSee('Sorry! The system is updating')
                    ->assertMissing('#top-hotels .container .row .col-sm-4')
                    ->assertPathIs('/');
        }); 
    }

    /**
     * Test show top place if has data.
     *
     * @return void
     */
    public function testShowTopHotelIfHasData()
    {   
        $this->makeData(10);
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertTitle('Home page')
                    ->assertSee('Representative Hotels')
                    ->assertVisible('#top-hotels .container .row .col-sm-4')
                    ->assertPathIs('/');
            $count = count($browser->elements('#top-hotels .container .row .col-sm-4'));
            $this->assertTrue($count == 6);
        }); 
    }

    /**
     * Make data for test.
     *
     * @return void
     */
    public function makeData($row)
    {
        factory(Place::class, $row)->create();
        factory(User::class, $row)->create();
        factory(Guest::class, $row)->create();
        $placeIds = Place::all('id')->pluck('id')->toArray();
        $faker = Faker::create();
        for ($i = 0; $i < $row; $i++) {
            factory(Hotel::class, 1)->create([
                'place_id' => $faker->randomElement($placeIds)
            ]);
        }
        $hotelIds = Hotel::all('id')->pluck('id')->toArray();
        for ($i = 0; $i < $row; $i++) {
            factory(Room::class, 1)->create([
                'hotel_id' => $faker->randomElement($hotelIds),
            ]);
        }
        $roomIds = Room::all('id')->pluck('id')->toArray();
        for ($i = 0; $i < $row; $i++) {
            factory(Reservation::class, 1)->create([
                'room_id' => $faker->randomElement($roomIds),
            ]);
        }
    }
}
