<?php declare(strict_types=1);

namespace App\Command;

use App\Service\EnvService;
use App\Service\SchedulerService;
use App\Service\TelegramService;
use DateException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Lock\Store\SemaphoreStore;
use Throwable;

#[AsCommand(name: 'app:cron')]
class CronCommand extends Command
{
    public function __construct(
        private readonly SchedulerService $schedulerService,
        private readonly EnvService       $envService,
        private readonly TelegramService  $telegramService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $lock = (new LockFactory(new SemaphoreStore()))
            ->createLock(resource: 'cron-command', ttl: 50)
        ;

        if (!$lock->acquire()) {
            $this->telegramService->sendLog('Cron error', 'Cron is locked error');

            return 0;
        }

        $time = (int) (time() / 60);

        if ($time % 5 === 0) {
            try {
                $this->runEvery5Minutes();
            } catch (Throwable $ex) {
                $this->telegramService->sendLog('Cron 5m error', $ex->getMessage());
            }
        }

        $lock->release();

        return Command::SUCCESS;
    }

    /**
     * @throws DateException
     */
    private function runEvery5Minutes(): void
    {
        if ($this->envService->isDevEnv()) {
            return;
        }

        $this->schedulerService->todaySchedule();
        $this->schedulerService->checkStartAndSend();
        $this->schedulerService->checkEndAndSend();
        //$this->schedulerService->nextDaySchedule();
    }
}
