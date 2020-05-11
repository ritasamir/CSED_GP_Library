<?php

namespace Tests\Feature;
use App\User;
use App\Post;
use App\Field;
use App\Citation;



use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;
 
     /** @test */
    public function only_logged_in_can_post()
    {
        $response = $this->get('/posts')->assertRedirect('/login');
    }

    /** @test */
    public function logged_in_can_post()
    {
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '12355'
        ]));
        $response = $this->get('/posts')->assertOk();
    }

  
////////////////////////////////////////////////////////////////////////////////
    
    /** @test */
    public function post_storing_student()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]));

        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);

        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
   

        $response = $this->post('/posts',[
            'title' => "This is  a post",
            'abstract'=> "This an abstract, This an abstract, This an abstract, 
                 This an abstract, This an abstract, This an abstract, This an abstract ",
            'link' => "www.google.com",
            'fields' =>[
                $f1->id,
                $f2->id,
            ],
            'collaborators' =>array(['sohayla']),
        ]);


        $response->assertOk();
        $response->assertViewIs('posts.unapproved_posts');
        $this->assertDatabaseHas('posts', ['title' => "This is  a post"]);
        $post_db = Post::orderBy('id', 'desc')->first();
        $this->assertEquals('0', $post_db->approved);
    }
    /** @test */
    public function post_storing_teaching_staff()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]));

        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);

        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);

        $response = $this->post('/posts',[
            'title' => "This is  a post",
            'abstract'=> "This an abstract, This an abstract, This an abstract, 
                 This an abstract, This an abstract, This an abstract, This an abstract ",
            'link' => "www.google.com",
            'fields' =>[
                $f1->id,
                $f2->id,
            ],
            'collaborators' =>array(['sohayla']),
 
        ]);


        $response->assertOk();
        $response->assertViewIs('posts.post');
        $this->assertDatabaseHas('posts', ['title' => "This is  a post"]);
        $post_db = Post::orderBy('id', 'desc')->first();
        $citations = Citation::get();
        $this->assertCount(2, $citations);
        $this->assertEquals('1', $post_db->approved);
    }
    /** @test */
    public function post_storing_student_ts_is_required()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]));

        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);

        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $ourFileName = "testFile.png";
        $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
        fclose($ourFileHandle);

        $response = $this->post('/posts',[
            'title' => "This is  a post",
            'abstract'=> "This an abstract, This an abstract, This an abstract, 
                 This an abstract, This an abstract, This an abstract, This an abstract ",
            'link' => "www.google.com",
            'fields' =>[
                $f1->id,
                $f2->id,
            ],
            'collaborators' =>array(['sohayla']),
 
        ]);
        $response->assertRedirect('/posts');
        $this->assertDatabaseMissing('posts', ['title' => "This is  a post"]);
        $citations = Citation::get();
        $this->assertCount(0, $citations);

    }

        /** @test */
        public function post_storing_student_fields_is_required()
        {
            $this->withoutExceptionHandling();
            $this->actingAs(factory(User::class)->create([
                'isTS' => '0',
                'department' => 'csed',
                'phone_number' => '01258036758',
                'graduation_year' => '2020',
                'national_id' => '1253',
            ]));
    
            $f1 = factory(Field::class)->create([
                'fname' => 'nlp'
            ]);
            $f2 = factory(Field::class)->create([
                'fname' => 'cv'
            ]);
    
            $user2 = factory(User::class)->create([
                'name' => 'sohayla',
                'isTS' => '1',
                'department' => 'csed',
                'phone_number' => '01258036758',
                'graduation_year' => '2020',
                'national_id' => '1253',
            ]);
            $ourFileName = "testFile.png";
            $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
            fclose($ourFileHandle);
    
            $response = $this->post('/posts',[
                'title' => "This is  a post",
                'abstract'=> "This an abstract, This an abstract, This an abstract, 
                     This an abstract, This an abstract, This an abstract, This an abstract ",
                'link' => "www.google.com",
                'collaborators' =>array(['sohayla']),
     
            ]);
            $response->assertRedirect('/posts');
            $this->assertDatabaseMissing('posts', ['title' => "This is  a post"]);
            $citations = Citation::get();
            $this->assertCount(0, $citations);
    
        }

  /** @test */
  public function post_storing_title_is_required()
  {
      $this->withoutExceptionHandling();
      $this->actingAs(factory(User::class)->create([
          'isTS' => '0',
          'department' => 'csed',
          'phone_number' => '01258036758',
          'graduation_year' => '2020',
          'national_id' => '1253',
      ]));

      $f1 = factory(Field::class)->create([
          'fname' => 'nlp'
      ]);
      $f2 = factory(Field::class)->create([
          'fname' => 'cv'
      ]);

      $user2 = factory(User::class)->create([
          'name' => 'sohayla',
          'isTS' => '1',
          'department' => 'csed',
          'phone_number' => '01258036758',
          'graduation_year' => '2020',
          'national_id' => '1253',
      ]);
      $ourFileName = "testFile.png";
      $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
      fclose($ourFileHandle);

      $response = $this->post('/posts',[
        'title' =>'',
        'abstract'=> "This an abstract, This an abstract, This an abstract, 
             This an abstract, This an abstract, This an abstract, This an abstract ",
        'fields' =>[
            $f1->id,
            $f2->id,
        ],
        'collaborators' =>array(['sohayla']),
        'link' => "www.google.com",

      ]);
      $response->assertRedirect('/posts');
      $this->assertDatabaseMissing('posts', ['title' => "This is  a post"]);
      $citations = Citation::get();
      $this->assertCount(0, $citations);

  }

  /** @test */
  public function post_storing_url_is_required()
  {
      $this->withoutExceptionHandling();
      $this->actingAs(factory(User::class)->create([
          'isTS' => '0',
          'department' => 'csed',
          'phone_number' => '01258036758',
          'graduation_year' => '2020',
          'national_id' => '1253',
      ]));

      $f1 = factory(Field::class)->create([
          'fname' => 'nlp'
      ]);
      $f2 = factory(Field::class)->create([
          'fname' => 'cv'
      ]);

      $user2 = factory(User::class)->create([
          'name' => 'sohayla',
          'isTS' => '1',
          'department' => 'csed',
          'phone_number' => '01258036758',
          'graduation_year' => '2020',
          'national_id' => '1253',
      ]);
      $ourFileName = "testFile.png";
      $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
      fclose($ourFileHandle);

      $response = $this->post('/posts',[
        'title' => "This is  a post",
        'abstract'=> "This an abstract, This an abstract, This an abstract, 
             This an abstract, This an abstract, This an abstract, This an abstract ",
        'fields' =>[
            $f1->id,
            $f2->id,
        ],
        'collaborators' =>array(['sohayla']),
      ]);
      $response->assertRedirect('/posts');
      $this->assertDatabaseMissing('posts', ['title' => "This is  a post"]);
      $citations = Citation::get();
      $this->assertCount(0, $citations);

  }

    /** @test */
    public function post_storing_abstract_is_required()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]));
  
        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);
  
        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $ourFileName = "testFile.png";
        $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
        fclose($ourFileHandle);
  
        $response = $this->post('/posts',[
          'title' => "This is  a post",
         
          'fields' =>[
              $f1->id,
              $f2->id,
          ],
          'collaborators' =>array(['sohayla']),
          'link' => 'www.google.com',
        ]);
        $response->assertRedirect('/posts');
        $this->assertDatabaseMissing('posts', ['title' => "This is  a post"]);
        $citations = Citation::get();
        $this->assertCount(0, $citations);
  
    }
  
 

}
