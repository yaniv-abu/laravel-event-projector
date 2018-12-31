<?php

namespace Spatie\EventProjector\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class QueuedProjectorsListener extends Command
{
    protected $signature = 'event-projector:queued-projectors-listener';

    protected $description = 'Listens to the events queue and runs the projectors one by one';

    public function handle() {
        Artisan::call('queue:listen', ['' => 'beanstalkd', 'queue' => 'queued_projectors_tube']);
    }
}
