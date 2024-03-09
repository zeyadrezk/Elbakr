<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteNotRegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-not-registered-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete users when they are not registered';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Deleting users who are not registered...');

        $user = User::where('f_name','=','user')
            ->where('l_name','=','user')
            ->whereColumn('email', '=', 'phone')
            ->forceDelete();

        Log::info('Deleted users: ' . $user);
    }
}
