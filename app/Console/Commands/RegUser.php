<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;


class RegUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RegUser:user {user*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавление пользователя';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = $this->argument('user');

        $user = new User();
        $user->name = $data[0];
        $user->email = $data[1];
        $user->password = Hash::make($data[2]);
        $user->save();

    }
}
