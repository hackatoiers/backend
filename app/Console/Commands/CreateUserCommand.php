<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== Create a new user ===');

        $name = $this->ask('User name');
        $email = $this->ask('User email');

        $password = $this->secret('User password');
        $passwordConfirm = $this->secret('Confirm password');

        if ($password !== $passwordConfirm) {
            $this->error("Passwords do not match.");
            return Command::FAILURE;
        }

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);


        if ($validator->fails()) {
            $this->error("Validation error:");
            foreach ($validator->errors()->all() as $msg) {
                $this->error("- " . $msg);
            }
            return Command::FAILURE;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("Usuário criado com sucesso!");
        $this->line("ID: {$user->id}");
        $this->line("Nome: {$user->name}");
        $this->line("Email: {$user->email}");

        return Command::SUCCESS;
    }
}
