<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BossCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boss {--frontend}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Like a boss. add --frontend for building frontend';

    protected $passport_table = 'oauth_clients';

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

        $this->alert('Like a boss');

        $this->info('call migrate:fresh');
        $this->call('migrate:fresh');

        $this->info('call module:migrate');
        $this->call('module:migrate');

        $this->info('call module:seed');
        $this->call('module:seed');

        if($this->isPassportExist()) {
            $this->info('call passport:install');
            $this->call('passport:install');

            $this->info('set env');
            $this->setPassportKeys();
        }

        if($this->option('frontend')) {
            $this->info('run building frontend...');
            $this->info(shell_exec('npm run dev'));
        }

        $this->alert('Command complete. Thank you boss. Love you so much.');
    }


    protected function isPassportExist()
    {
        return \Schema::hasTable($this->passport_table);
    }

    protected function setPassportKeys()
    {
        $client = \DB::table($this->passport_table)->first();

        if($client) {
            $this->setEnvValue('MIX_AUTH_CLIENT_ID', $client->id);
            $this->setEnvValue('MIX_AUTH_CLIENT_SECRET_KEY', $client->secret);
        }else{
            $this->error('Passport client not found');
        }

    }

    protected function setEnvValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();
        $str     = file_get_contents($envFile);

        $re = "({$envKey}=)((.*))(\\n)?";

        if (is_bool($envValue)) {
            $envValue = $envValue ? 'true' : 'false';
        }

        if ($c = preg_match_all("/".$re."/m", $str, $matches)) {
            $oldValue = $matches[2][0];
            $str      = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}", $str);
        } else {
            $str .= "\n{$envKey}={$envValue}";
        }

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
}
