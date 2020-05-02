<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Post;

class commentNotification extends Notification
{
    use Queueable;
    protected $status;
    protected $userName;
    protected $postId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status,$postId,$userName)
    {
        $this->status = $status;
        $this->postId = $postId;
        $this->userName = $userName;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'status'=> $this->status,
            'postId'=>$this->postId,
            'postTitle'=> Post::where('id', $this->postId)->firstOrFail()['title'],
            'userName'=>$this->userName
        ];
    }
}
