<?php
namespace App\Console\Commands;

use App\Models\Vaccine;
use App\Models\Residents;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailsCommand extends Command
{
    protected $signature = 'emails:send';
    protected $description = 'Send reminder emails to residents';

    public function handle()
    {
        // $nextMonth = Carbon::now()->addMonth()->format('m');
        //  $vaccines = Vaccine::whereMonth('datevaccine', $nextMonth)
        //  ->get();
              $currentMonth = now()->format('m');
        $vaccines = Vaccine::whereMonth('datevaccine', $currentMonth)
         ->get();
        foreach ($vaccines as $vaccine)
            {
        $users = Residents::whereRaw("TIMESTAMPDIFF(YEAR, date, CURDATE()) = ?",
         [$vaccine->age])->get();

        foreach ($users as $user)
         {
        Mail::raw("Здравствуйте, $user->name. ФАП вызывает вас $vaccine->datevaccine
        на прививку  $vaccine->name.", function ($message) use ($user) {
            $message->to($user->email)->subject('Напоминание о прививке');
        });
         }
            }
        $this->info('Email sent successfully!');
    }
}
