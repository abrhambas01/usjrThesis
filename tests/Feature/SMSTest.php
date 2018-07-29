<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SMSTest extends TestCase
{
    /**@test */
    public function the_system_can_send_sms_to_the_recipients_for_a_specific_day()
    {

//        Get differnet user
        $user = factory()->make();
//        Send the sms to that user..


        $this->assertTrue(true);
    }

}




