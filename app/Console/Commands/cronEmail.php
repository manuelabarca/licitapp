<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
class cronEmail extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails';

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
\Mail::send('emails.user.nuevousuario', $data=[], function($message)
{
    $message->from('contacto@licitapp.cl', 'Licitapp');

    $message->to('magustico@gmail.com')->cc('labarca.manu@gmail.com');

});
    }
}
