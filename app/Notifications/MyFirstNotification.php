<?php

namespace App\Notifications;

use App\Exam;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\classes;

class MyFirstNotification extends Notification
{
    use Queueable;

    protected $exam,$user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Classes $classes)
    {
//        $this->exam = $exam;
//        $this->user = $user;
        $this->classes= $classes;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }


    public function toDatabase($notifiable)
    {
        return [
            'classes'=>$this->classes
        ];
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
//            'user_id' => $this->user->id,
//            'user_name' => $this->user->name,
//            'exam' => $this->exam->name,
        ];
    }
}
