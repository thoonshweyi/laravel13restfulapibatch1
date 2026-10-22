<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->withHeader('Accept','application/json')
                ->getJson("/api/v1/health");

        $response
        ->assertOk() // HTTP status code 200
        ->assertJsonPath('success',true) // success field = true
        ->assertJsonPath('data.service','e-commerce-api') // Is e-commerce-api ?
        ->assertJsonPath('data.version','v1') // is v1
        ->assertJsonStructure([
            'success',
            'message',
            'data'=>[
                'service',
                'version',
                'time'
            ]
        ]);
    }
}

// PHP UNIT Error
// test('the api health endpoint is available',function(){
//     $response = $this->withHeader('Accept','application/json')
//                     ->getJson("/api/v1/health");

//     $response
//         ->assertOk() // HTTP status code 200
//         ->assertJsonPath('success',true) // success field = true
//         ->assertJsonPath('data.service','e-commerce-api') // Is e-commerce-api ?
//         ->assertJsonPath('data.version','v1') // is v1
//         ->assertJsonStructure([
//             'success',
//             'message',
//             'data'=>[
//                 'service',
//                 'version',
//                 'time'
//             ]
//         ]);

// });

// php artisan make:test Api/V1/HealthCheckTest

// php artisan test --filter=HealthCheckTest