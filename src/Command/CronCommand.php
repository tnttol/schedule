<?php declare(strict_types=1);

namespace App\Command;

use App\Service\EnvService;
use App\Service\SchedulerService;
use DateException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:cron')]
class CronCommand extends Command
{
    public function __construct(
        private readonly SchedulerService $schedulerService,
        private readonly EnvService $envService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    /**
     * @throws DateException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($this->envService->isDevEnv()) {
            return Command::SUCCESS;
        }

        $this->schedulerService->todaySchedule();
        $this->schedulerService->checkStartAndSend();
        $this->schedulerService->checkEndAndSend();
        $this->schedulerService->tomorrowSchedule();

        return Command::SUCCESS;
    }
}
