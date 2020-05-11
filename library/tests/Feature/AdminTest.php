<?php

namespace Tests\Feature;
use App\User;
use Session;



use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    ////////////////////////////////////GET TESTS///////////////////////////////////////////
     /** @test */
    public function visitors_cant_visit_urls(){
        /*
        /admin
        /users/pending
        /users/pending/verify
        /users/pending/unverify
         */
        $this->withoutExceptionHandling();

        $response = $this->get('admin')->assertRedirect('/home');
        $response = $this->get('users/pending')->assertRedirect('/home');
    }

    /** @test */
    public function users_type_default_cant_visit_urls()
    {
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => 1,
        ]));
        $response = $this->get('admin')->assertRedirect('/home');
        $response = $this->get('users/pending')->assertRedirect('/home');
    }

    /** @test */
    public function unverified_cant_login(){

       //$this->withoutExceptionHandling();
        Event::fake();
        $user = factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);

        $response = $this->post('/login', [
            'email'=>$user->email,
            'password'=>$user->password,
        ]);
        $response->assertStatus(302);
    }

    /** @test */
    public function correct_number_of_pending_users_shown(){
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => 1,
            'type' =>'admin',
        ]));
        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);

        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);


        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);
        $response = $this->get('users/pending');

        $response->assertOk();
        $response->assertViewIs('admin.pending');
        $users = User::where('verified',0)->where('confirmation_code',null)->get();
        $this->assertCount(3, $users);
        
    }

       /** @test */
       public function correct_number_of_pending_users_shown_2(){
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => 1,
            'type' =>'admin',
        ]));
        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);

        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);


        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '1',
        ]);
        $response = $this->get('users/pending');

        $response->assertOk();
        $response->assertViewIs('admin.pending');
        $users = User::where('verified',0)->where('confirmation_code',null)->get();
        $this->assertCount(2, $users);
        
    }

       /** @test */
       public function correct_number_of_pending_users_shown_3(){
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => 1,
            'type' =>'admin',
        ]));
        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);

        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);


        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
            'confirmation_code' =>'SGHJHIUHkjhhjknk56',
        ]);
        $response = $this->get('users/pending');

        $response->assertOk();
        $response->assertViewIs('admin.pending');
        $users = User::where('verified',0)->where('confirmation_code',null)->get();
        $this->assertCount(2, $users);
        
    }

       /** @test */
       public function correct_number_of_pending_users_shown_4(){
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => 1,
            'type' =>'admin',
        ]));
        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '1',
        ]);

        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '1',
        ]);


        factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
            'confirmation_code' =>'SGHJHIUHkjhhjknk56',
        ]);
        $response = $this->get('users/pending');

        $response->assertOk();
        $response->assertViewIs('admin.pending_users_empty');
        $users = User::where('verified',0)->where('confirmation_code',null)->get();
        $this->assertCount(0, $users);
        
    }
  
////////////////////////////////////////////////////////////////////////////////
    /** @test */
    public function verify_user_check_confirmation_code_correct(){
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => 1,
            'type' =>'admin',
        ]));
        $user = factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);

       
        $response =$this->post('/users/pending/verify', ['id'=>$user->id]);
        $response->assertStatus(302);
         $users = User::where('verified',0)->where('confirmation_code',null)->get();
         $this->assertCount(0, $users);
        $user_db = User::where('id',$user->id)->firstOrfail();
        $this->assertNotEquals($user_db->confirmation_code, null);
    }

    /** @test */
    public function verify_user_email_check_database_and_redirection(){
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => 1,
            'type' =>'admin',
        ]));
        $confirmation_code = Str::random(60);

        $user = factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
            'confirmation_code'=> $confirmation_code, 
        ]);

       
        $response =$this->get('/register/verify/'.$user->id.'/'.$user->confirmation_code);
        $response->assertRedirect('/login');;
        $user_db = User::where('id',$user->id)->firstOrfail();
        $this->assertEquals($user_db->confirmation_code, null);
        $this->assertEquals($user_db->verified, 1);

    }


    /** @test */
    public function unverify_check_database_removed_correctlly(){
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => 1,
            'type' =>'admin',
        ]));
        $user = factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
            'verified' => '0',
        ]);

       
        $response =$this->post('/users/pending/unverify', ['id'=>$user->id]);
        $response->assertStatus(302);
       
        $this->assertDatabaseMissing('users', ['id'=>$user->id]);
    }
    
}