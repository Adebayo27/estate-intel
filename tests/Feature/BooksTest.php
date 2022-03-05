<?php

namespace Tests\Feature;

use App\Models\Books;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooksTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_books()
    {
        $faker = \Faker\Factory::create();
        $payload = [
            'name' => $faker->name,
            'isbn' => $faker->randomNumber,
            'authors' => $faker->name,
            'country' => $faker->country,
            'number_of_pages' => $faker->randomNumber,
            'publisher' => $faker->name,
            'release_date' => $faker->date,
        ];

        $this->json('post', '/api/v1/books', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                "status_code",
                "status",
                'data' => [
                    'book' => [
                        "name",
                        "isbn",
                        "authors",
                        "number_of_pages",
                        "publisher",
                        "country",
                        "release_date"

                    ]
                ],
            ]);
    }

    public function test_get_all_books()
    {
        $this->json('get', '/api/v1/books')
            ->assertStatus(200)
            ->assertJsonStructure([
                "status_code",
                "status",
                'data' => [
                    [
                        "name",
                        "isbn",
                        "authors",
                        "number_of_pages",
                        "publisher",
                        "country",
                        "release_date"
                    ]
                ],
            ]);
    }

    public function test_get_single_book()
    {
        $faker = \Faker\Factory::create();
        $book = Books::create([
            'name' => $faker->name,
            'isbn' => $faker->randomNumber,
            'authors' => $faker->name,
            'country' => $faker->country,
            'number_of_pages' => $faker->randomNumber,
            'publisher' => $faker->name,
            'release_date' => $faker->date,
        ]);
        $this->json('get', '/api/v1/books/'.$book->id)
            ->assertStatus(200)
            ->assertJsonStructure([
                "status_code",
                "status",
                'data' => [
                    "name",
                    "isbn",
                    "authors",
                    "number_of_pages",
                    "publisher",
                    "country",
                    "release_date"
                ],
            ]);
    }

    public function test_delete_single_book()
    {
        $faker = \Faker\Factory::create();
        $book = Books::create([
            'name' => $faker->name,
            'isbn' => $faker->randomNumber,
            'authors' => $faker->name,
            'country' => $faker->country,
            'number_of_pages' => $faker->randomNumber,
            'publisher' => $faker->name,
            'release_date' => $faker->date,
        ]);

        $this->json('delete', '/api/v1/books/'. $book->id)
            ->assertJsonStructure([
                "status_code",
                "status",
                'data',
            ])
            ->assertStatus(200);
            
    }

    public function test_update_book()
    {
        $faker = \Faker\Factory::create();
        $book = Books::create([
            'name' => $faker->name,
            'isbn' => $faker->randomNumber,
            'authors' => $faker->name,
            'country' => $faker->country,
            'number_of_pages' => $faker->randomNumber,
            'publisher' => $faker->name,
            'release_date' => $faker->date,
        ]);

        $payload = [
            'isbn' => $faker->randomNumber,
        ];

        $this->json('post', '/api/v1/books/'.$book->id, $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                "status_code",
                "status",
                'data' => [
                    'book' => [
                        "name",
                        "isbn",
                        "authors",
                        "number_of_pages",
                        "publisher",
                        "country",
                        "release_date"

                    ]
                ],
            ]);

    }

    public function test_get_external_book()
    {
        $faker = \Faker\Factory::create();
        $this->json('get', '/api/v1/external-books?name=A Game of Thrones')
            ->assertStatus(200)
            ->assertJsonStructure([
                "status_code",
                "status",
                'data' => [
                    [
                        "name",
                        "isbn",
                        "authors",
                        "number_of_pages",
                        "publisher",
                        "country",
                        "release_date"
                    ]
                ]
            ]);
    }

    public function test_search_book()
    {
        $faker = \Faker\Factory::create();
        $this->json('get', '/api/v1/books?name='.$faker->name)
            ->assertStatus(200)
            ->assertJsonStructure([
                "status_code",
                "status",
                'data' 
            ]);
    }
}
