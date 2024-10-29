<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendPendingTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sendPendingTasks';
    protected $description = 'Send daily email to users with their pending tasks';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $users = User::all();

    foreach ($users as $user) {
        SendPendingTasksJob::dispatch($user);
    }

    $this->info('Pending tasks emails dispatched successfully!');
}
}
