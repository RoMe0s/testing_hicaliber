<?php

namespace App\Console\Commands;

use App\Imports\BuildingsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ImportBuildingsFromCSVCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:buildings:csv {file_path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import buildings from CSV to DB';

    public function handle(): void
    {
        $filePath = $this->argument('file_path');

        if (!File::exists($filePath)) {
            $this->error("File [$filePath] does not exists.");
            return;
        }

        $this->output->title('Starting import');
        (new BuildingsImport)->withOutput($this->output)->import($filePath);
        $this->output->success('Import successful');
    }
}
