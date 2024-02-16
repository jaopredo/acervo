<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Student;
use App\Models\Book;

class ReserveCreated extends Notification
{
    use Queueable;

    private $student;
    private $book;
    private $expire_date;

    /**
     * Create a new notification instance.
     */
    public function __construct($reserve)
    {
        $this->student = Student::findOrFail($reserve['student_id']);
        $this->book = Book::findOrFail($reserve['book_id']);
        $this->expire_date = $reserve['expire_date'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'student' => $this->student,
            'book' => $this->book,
            'expire_date' => $this->expire_date
        ];
    }
}
