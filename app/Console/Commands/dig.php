<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Spatie\Dns\Dns;

class dig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dig-dns {domain} {record=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $dns = new Dns($this->argument('domain'));

        switch (strtoupper($this->argument('record'))) {
            case 'A':
            case 'AAAA':
            case 'NS':
            case 'SOA':
            case 'MX':
            case 'TXT':
            case 'DNSKEY':
            case 'CAA':
                $this->line($dns->getRecords($this->argument('record')));
                break;
            default:
                $this->line($dns->getRecords());
                break;
        }
    }
}
