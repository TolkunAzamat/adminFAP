<?php

namespace App\Console\Commands;

use App\User;
use App\Models\Vaccine;
use Carbon\Carbon;
use App\Mail\MyEmail;
use App\Models\Residents;
use App\Models\Vaccine as ModelsVaccine;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendVaccineReminders extends Command
{
    protected $signature = 'email:send-vaccine-reminders';

    protected $description = 'Send vaccine reminders to users';

    public function handle()
    {
        $currentMonth = Carbon::now()->month;

        $users = Residents::whereRaw("TIMESTAMPDIFF(MONTH, date, CURDATE()) IN (2, 3)")->get();

        foreach ($users as $user) {
            $vaccines = Vaccine::whereMonth('datevaccine', $currentMonth)
                              ->where('age', $user->age)
                              ->get();

            foreach ($vaccines as $vaccine) {
                $emailContent = "Здравствуйте, " . $user->name . ". ФАП вызывает вас "
                             . $vaccine->date . " на прививку от " . $vaccine->name;
                // Отправить письмо с содержимым $emailContent
                Mail::to($user->email)->send(new MyEmail($emailContent));
            }
        }

        $this->info('Vaccine reminders sent successfully.');
    }
}
