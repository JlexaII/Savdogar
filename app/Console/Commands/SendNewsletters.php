<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscriber;
use App\Mail\NewsLetter;

class SendNewsletters extends Command
{
    protected $signature = 'newsletter:send';
    protected $description = 'Send newsletters to subscribers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $subscribers = Subscriber::all();
        $content = 'Это содержание вашей рассылки';

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewsLetter($content));
        }

        $this->info('Newsletter sent successfully!');
    }
}
