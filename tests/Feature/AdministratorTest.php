<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdministratorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function an_admin_can_access_the_admin_section()
    {

        $this->withExceptionHandling()
            ->signInAdmin()
            ->get(route('admin.dashboard'))
            ->assertStatus(Response::HTTP_OK);
    }


}
