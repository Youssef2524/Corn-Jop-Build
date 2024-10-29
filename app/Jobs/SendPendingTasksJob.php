<?php

namespace App\Jobs;


use App\Models\Task;
use App\Mail\PendingTasksMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPendingTasksJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
    /**
     * Execute the job.
     */
    public function handle()
    {
        $tasks = Task::where('user_id', $this->user->id)
                      ->where('status', 'Pending')
                      ->whereDate('due_date', now()->toDateString())
                      ->get();

        if ($tasks->isNotEmpty()) {
            Mail::to($this->user->email)->send(new PendingTasksMail($tasks));
        }
    }
}
