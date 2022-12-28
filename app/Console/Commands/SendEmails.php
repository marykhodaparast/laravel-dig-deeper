<?php

namespace App\Console\Commands;

use Exception;
use App\Mail\TestEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
//use Symfony\Component\Console\Command\SignalableCommandInterface;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a marketing email to a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    // // public function helper($e)
    // // {
    // //     return $e->getMessage();
    // // }

    // /**
    //  * Execute the console command.
    //  *
    //  * @return mixed
    //  */
    public function handle()
    {

        // $users = $this->withProgressBar(User::all(), function ($user) {
        //     $maildata = [
        //         'name' => $user->name
        //     ];
        //     Mail::to($user->email)->send(new TestEmail($maildata));
        // });
        // $this->newLine();

        //$this->callSilently('migrate');


        $user = User::find($this->argument('user'));
        $maildata = [
            'name' => $user->name
        ];
        try {
            Mail::to($user->email)->send(new TestEmail($maildata));
            $this->info('The command was successful!');
        } catch (Exception $e) {
            $this->error('Something went wrong!' . $e->getMessage());
        }


        /***
         * For an array of user ids...
         *
         */
        // $sw = 0;
        // $error = null;
        // $users = $this->argument('user');

        // foreach ($users as $item) {
        //     $user = User::find($item);
        //     $maildata = [
        //         'name' => $user->name
        //     ];
        //     try {
        //         Mail::to($user->email)->send(new TestEmail($maildata));
        //         $this->info('Mail successfully sent to ' . $user->email);
        //     } catch (Exception $e) {
        //         $sw = 1;
        //         $error = $this->helper($e);
        //     }
        // }
        // if ($sw) {
        //     $this->error('Something went wrong!' . $error);
        // }
    }


}
