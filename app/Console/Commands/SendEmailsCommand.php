<?php
namespace App\Console\Commands;

use App\Models\Residents;
use Illuminate\Console\Command;
use App\Mail\BirthdayReminderMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Resident; // Замените на вашу модель жителя

class SendEmailsCommand extends Command
{
    protected $signature = 'emails:send';
    protected $description = 'Send reminder emails to residents';

    public function handle()
    {
        // Получите список жителей, кому исполнилось 2 или 4 месяца
        // $residents = Residents::whereRaw("DATEDIFF(NOW(), birth_date) DIV 30 IN (2, 4)")->get();

        // foreach ($residents as $resident) {
        //     // Отправьте письмо с текстом на электронную почту жителя
        //     Mail::to($resident->email)->send(new BirthdayReminderMail($resident));
        // }

        // $this->info('Reminder emails sent successfully.');
        $email = 'recipient@example.com'; // Замените на адрес получателя
        $mailData = [
            'title' => 'ФАП',
            'body' => 'Это ФАП',
        ];
        Mail::to('toshazamat@gmail.com')->send(new BirthdayReminderMail($mailData));


        $this->info('Email sent successfully!');
    }
}
