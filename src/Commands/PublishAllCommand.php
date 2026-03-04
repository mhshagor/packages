<?php

namespace Mhshagor\LaravelComponents\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PublishAllCommand extends Command
{
    private const TAG_COMPONENTS = 'components';
    private const TAG_FILE_PICKER = 'file-picker';

    protected $signature = 'mhshagor:publish-all {--force : Overwrite any existing files}';

    protected $description = 'Publish mhshagor components and file-picker assets.';

    public function handle(): int
    {
        $force = (bool) $this->option('force');

        $results = [
            self::TAG_COMPONENTS => $this->publishTag(self::TAG_COMPONENTS, $force),
            self::TAG_FILE_PICKER => $this->publishTag(self::TAG_FILE_PICKER, $force),
        ];

        foreach ($results as $tag => $exitCode) {
            if ($exitCode !== self::SUCCESS) {
                $this->error("Publishing [{$tag}] failed.");
            }
        }

        return in_array(self::FAILURE, $results, true) ? self::FAILURE : self::SUCCESS;
    }

    private function publishTag(string $tag, bool $force): int
    {
        $this->info("Publishing [{$tag}] assets.");

        $exitCode = Artisan::call('vendor:publish', [
            '--tag' => $tag,
            '--force' => $force,
        ]);

        $this->output->write(Artisan::output());
        $this->newLine();

        return $exitCode === 0 ? self::SUCCESS : self::FAILURE;
    }
}
