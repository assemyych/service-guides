<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_gets_cities()
    {
        City::factory()->create();
        $response = $this->get('/api/cities');

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'country',
                ],
            ],
        ]);
    }

    /** @test */
    public function it_stores_city()
    {
        $country = Country::factory()->create();
        $response = $this->postJson('/api/city', ['title' => 'Almaty', 'country_id' => $country->id]);

        $city = City::first();

        $response->assertExactJson([
            'data' => [
                'id' => $city->id,
                'title' => 'Almaty',
                'country' => [
                    'id' => $country->id,
                    'title' => $country->title,
                ],
            ],
        ]);
    }

    /** @test */
    public function it_gets_city()
    {
        $city = City::factory()->create();
        $response = $this->getJson('/api/city/'.$city->id);

        $response->assertExactJson([
            'data' => [
                'id' => $city->id,
                'title' => $city->title,
                'country' => [
                    'id' => $city->country->id,
                    'title' => $city->country->title,
                ],
            ],
        ]);
    }

    /** @test */
    public function it_updates_city()
    {
        $city = City::factory()->create();
        $response = $this->putJson('/api/city/'.$city->id, ['title' => 'Almaty', 'country_id' => $city->country->id]);

        $response->assertExactJson([
            'data' => [
                'id' => $city->id,
                'title' => 'Almaty',
                'country' => [
                    'id' => $city->country->id,
                    'title' => $city->country->title,
                ],
            ],
        ]);
    }

    /** @test */
    public function it_deletes_city()
    {
        $city = City::factory()->create();
        $response = $this->deleteJson('/api/city/'.$city->id);

        $response->assertStatus(200);

        $this->assertDatabaseCount('cities', 0);
    }
}
