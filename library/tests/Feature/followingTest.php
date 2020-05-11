<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Post;
use App\Field;
use App\Citation;

class followingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function post_TS_followers()
    {
        $this->withoutExceptionHandling();
        $user1 = factory(User::class)->create([
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $this->actingAs($user1);
        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);
        $this->post('/posts',[
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
        $post_db = Post::orderBy('id', 'desc')->first();
        $followers = $post_db->followers;
        $this->assertCount(2, $followers);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user1->id,
            'post_id' => $post_db->id
        ]);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user2->id,
            'post_id' => $post_db->id
        ]);
    }

    /** @test */
    public function post_approved_followers()
    {
        $this->withoutExceptionHandling();
        $user1 = factory(User::class)->create([
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $this->actingAs($user1);
        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);
        $this->post('/posts',[
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
        $post_db = Post::orderBy('id', 'desc')->first();
        $response = $this->get('/pendingPostsapproving?id='.$post_db->id);
       
        $followers = $post_db->followers;
        $this->assertCount(2, $followers);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user1->id,
            'post_id' => $post_db->id
        ]);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user2->id,
            'post_id' => $post_db->id
        ]);
    }
    /** @test */
    public function add_comment_followers()
    {
       $this->withoutExceptionHandling();
        $user1 = factory(User::class)->create([
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $this->actingAs($user1);
        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $user3 = factory(User::class)->create([
            'name' => 'rita',
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);
        $this->post('/posts',[
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
        $post_db = Post::orderBy('id', 'desc')->first();
        $this->actingAs($user3);
        $this->post('comments/'.$post_db->id.'/create',[
            'body' => "This is  a comment",
        ]);
        
        $followers = $post_db->followers;
        $this->assertCount(3, $followers);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user1->id,
            'post_id' => $post_db->id
        ]);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user2->id,
            'post_id' => $post_db->id
        ]);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user3->id,
            'post_id' => $post_db->id
        ]);
    }

    /** @test */
    public function duplicate_entries()
    {
       $this->withoutExceptionHandling();
        $user1 = factory(User::class)->create([
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $this->actingAs($user1);
        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $user3 = factory(User::class)->create([
            'name' => 'rita',
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);
        $this->post('/posts',[
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
        $post_db = Post::orderBy('id', 'desc')->first();
        $this->actingAs($user3);
        $this->post('comments/'.$post_db->id.'/create',[
            'body' => "This is  a comment 1 ",
        ]);
        $this->post('comments/'.$post_db->id.'/create',[
            'body' => "This is  a comment 2",
        ]);
        
        $followers = $post_db->followers;
        $this->assertCount(3, $followers);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user1->id,
            'post_id' => $post_db->id
        ]);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user2->id,
            'post_id' => $post_db->id
        ]);
        $this->assertDatabaseHas('followers', [
            'user_id' => $user3->id,
            'post_id' => $post_db->id
        ]);
    }
    /** @test */
    public function add_comment_notifications()
    {
       $this->withoutExceptionHandling();
        $user1 = factory(User::class)->create([
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $this->actingAs($user1);
        $user2 = factory(User::class)->create([
            'name' => 'sohayla',
            'isTS' => '1',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $user3 = factory(User::class)->create([
            'name' => 'rita',
            'isTS' => '0',
            'department' => 'csed',
            'phone_number' => '01258036758',
            'graduation_year' => '2020',
            'national_id' => '1253',
        ]);
        $f1 = factory(Field::class)->create([
            'fname' => 'nlp'
        ]);
        $f2 = factory(Field::class)->create([
            'fname' => 'cv'
        ]);
        $this->post('/posts',[
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
        $post_db = Post::orderBy('id', 'desc')->first();
        $this->actingAs($user3);
        $this->post('comments/'.$post_db->id.'/create',[
            'body' => "This is  a comment",
        ]);
        
        $followers = $post_db->followers;
        $this->assertCount(3, $followers);
        $this->assertDatabaseHas('notifications', [
            'notifiable_id' => $user1->id,
        ]);
        $this->assertDatabaseHas('notifications', [
            'notifiable_id' => $user2->id,
        ]);
        $this->assertDatabaseMissing('notifications', [
            'notifiable_id' => $user3->id,
        ]);
    }


    
}
