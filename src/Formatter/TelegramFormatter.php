<?php declare(strict_types=1);

namespace App\Formatter;

use App\Service\EnvService;
use DateTimeImmutable;
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\LineFormatter;
use Monolog\LogRecord;

class TelegramFormatter implements FormatterInterface
{
    const string MESSAGE_FORMAT = "%emoji% *%level_name%* (%channel%) [%date%]\n\n%message%\n\n%context%%extra%";
    const string DATE_FORMAT = 'Y-m-d H:i:s e';

    private array $emojis = [
        'DEFAULT'     => '🐞',
        // 'DEBUG'     => '🐞',
        // 'INFO'      => 'ℹ️',
        'NOTICE'    => '📌',
        'WARNING'   => '⚠️',
        'ERROR'     => '❌',
        'CRITICAL'  => '💀',
        'ALERT'     => '🛎️',
        'EMERGENCY' => '🚨',
    ];

    /**
     * @param bool       $html       Format as HTML or not
     * @param string     $format     The format of the message
     * @param string     $dateFormat The format of the timestamp: one supported by DateTime::format
     * @param array|null $emojiArray Array containing emojis for each record level name
     */
    public function __construct(
        private readonly bool        $html = true,
        private readonly string      $format = self::MESSAGE_FORMAT,
        private string               $dateFormat = self::DATE_FORMAT,
        array                        $emojiArray = null,
        private readonly ?EnvService $envService = null
    ) {
        $emojiArray !== null && $this->emojis = array_replace($this->emojis, $emojiArray);
    }

    public function format(LogRecord $record): string
    {
        if (!($this->emojis[$record['level_name']] ?? false)) {
            return '';
        }

        $message = $this->format;
        $lineFormatter = new LineFormatter();

        $tempMessage = preg_replace(
            '/<([^<]+)>/',
            '&lt;$1&gt;',
            $record['message']
        ); // Replace '<' and '>' with their special codes
        $tempMessage = preg_replace(
            '/^Stack trace:\n((^#\d.*\n?)*)$/m',
            PHP_EOL . '*Stack trace:*' . PHP_EOL . '<code>$1</code>',
            $tempMessage
        ); // Put the stack trace inside <code></code> tags
        $message = str_replace('%message%', $tempMessage, $message);

        if ($record['context']) {
            $context = '*CONTEXT:* ';
            $context .= $lineFormatter->stringify($record['context']);
            $message = str_replace('%context%', $context . PHP_EOL, $message);
        } else {
            $message = str_replace('%context%', '', $message);
        }

        if ($record['extra']) {
            $extra = '*EXTRA:* ';
            $extra .= $lineFormatter->stringify($record['extra']);
            $message = str_replace('%extra%', $extra . PHP_EOL, $message);
        } else {
            $message = str_replace('%extra%', '', $message);
        }

        $emoji = $this->emojis[$record['level_name']] ?? $this->emojis['DEFAULT'] ?? '🐞';

        /** @param DateTimeImmutable $record['datetime'] */
        $message = str_replace(
            ['%emoji%', '%level_name%', '%channel%', '%date%'],
            [$emoji, $record['level_name'], $record['channel'], $record['datetime']->format($this->dateFormat)],
            $message
        );

        if ($this->html === false) {
            $message = strip_tags($message);
        }

        return $message;
    }

    public function formatBatch(array $records): string
    {
        $messages = [];

        foreach ($records as $record) {
            $messages[] = trim($this->format($record));
        }

        $messages = array_filter($messages);
        $messages[] = 'ENV SCHEDULE: ' . $this->envService->getEnv();

        return implode(PHP_EOL . PHP_EOL, $messages);
    }
}
