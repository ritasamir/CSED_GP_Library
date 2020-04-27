<?php

namespace Tests\Feature;
use App\User;
use App\Post;
use App\Field;
use App\Citation;



use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
 
     /** @test */
    public function only_logged_in_can_comment()
    {
        $this->withoutExceptionHandling();
        $post = factory(Post::class)->create();
        $response = $this->get('comments/'.$post->id.'/create')->assertRedirect('/login');
    }

    /** @test */
    public function logged_in_can_comment()
    {
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
        ]));
        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $post = factory(Post::class)->create([
            'user_id' => $user2->id,
        ]);

        $response = $this->get('comments/'.$post->id.'/create');
        $response->assertOk();
    }

  
////////////////////////////////////////////////////////////////////////////////
    
    /** @test */
    public function add_comment()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '15223',
        ]));

        $post = factory(Post::class)->create();
        $response = $this->post('comments/'.$post->id.'/create',[
            'body' => "This is  a post",
        ]);

       $response->assertOk();
        $response->assertViewIs('posts.comments');
        $this->assertDatabaseHas('comments', ['body' => "This is  a post"]);
    }


        /** @test */
        public function body_is_required()
        {
            $this->withoutExceptionHandling();
    
            $this->actingAs(factory(User::class)->create([
                'isTS' => '0',
                'department' => 'csed',
                'phone_number' => '01258036758',
                'graduation_year' => '2020',
                'national_id' => '15223',
            ]));
    
            $post = factory(Post::class)->create();
            $response = $this->post('comments/'.$post->id.'/create',[
            ]);
            $response->assertRedirect('comments/'.$post->id.'/create');
            $this->assertDatabaseMissing('comments', ['body' => "This is  a post"]);
        }
}