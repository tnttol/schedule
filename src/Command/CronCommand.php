<?php declare(strict_types=1);

namespace App\Command;

use App\Service\EnvService;
use App\Service\SchedulerService;
use App\Service\TelegramService;
use DateException;
use DateTime;
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
    private array $skipToday = [
        # осенние каникулы
        '2024-10-28',
        '2024-10-29',
        '2024-10-30',
        '2024-10-31',
        '2024-11-01',
        # зимние каникулы
        '2024-12-30',
        '2024-12-31',
        '2025-01-01',
        '2025-01-02',
        '2025-01-03',
        '2025-01-06',
        '2025-01-07',
        '2025-01-08',
        '2025-01-09',
        '2025-01-10',
    ];

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

    private function checkIsSkipToday(): bool
    {
        $today = (new DateTime())->format('Y-m-d');

        return in_array($today, $this->skipToday, true);
    }

    /**
     * @throws DateException
     */
    private function runEvery5Minutes(): void
    {
        if ($this->envService->isDevEnv()) {
            return;
        }

        if ($this->checkIsSkipToday()) {
            return;
        }

        $this->schedulerService->todaySchedule();
        $this->schedulerService->checkStartAndSend();
        $this->schedulerService->checkEndAndSend();
        //$this->schedulerService->nextDaySchedule();
    }
}
