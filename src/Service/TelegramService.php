<?php declare(strict_types=1);

namespace App\Service;

use Exception;

final readonly class TelegramService
{
    public function __construct(
        private EnvService $envService,
        private string     $token,
        private string     $channelId,
        private string     $logChannelId
    ) {
    }

    private static function escapeMarkdown(string $string): string
    {
        return trim($string);
        //return str_replace(['[', '*', '`', '_'], ['\[', '\*', '\`', '\_'], trim($string));
    }

    private function sendCurl(array $params): bool
    {
        try {
            $ch = curl_init(sprintf(
                'https://api.telegram.org/bot%s/%s',
                $this->token,
                isset($params['photo']) ? 'sendPhoto' : 'sendMessage'
            ));
            curl_setopt_array($ch, [
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $params
            ]);
            $resp = curl_exec($ch);
            $r = $resp ? json_decode($resp, true) : null;
            curl_close($ch);
        } catch (Exception) {
            return false;
        }

        if (!isset($r['ok'])) {
            throw new Exception((string) $resp);
        }

        return true;
    }

    public function sendMessage(string $header, string $message, mixed $photo = null): bool
    {
        $text = '<b>' . $this->escapeMarkdown($header) . '</b>'
            . PHP_EOL . $this->escapeMarkdown($message)
        ;

        $params = [
            'text' => $text,
            'parse_mode' => 'html',
            'disable_web_page_preview' => true,
            'chat_id' => $this->channelId
        ];

        if ($photo) {
            $params['photo'] = $photo;
            $params['caption'] = $text;
        }

        return $this->sendCurl($params);
    }

    public function sendLog(string $header, string $log, array $data = [], mixed $photo = null): bool
    {
        $text = '<b>' . $this->escapeMarkdown($header) . '</b>'
            . PHP_EOL . $this->escapeMarkdown($log)
            . ($data ? PHP_EOL . $this->escapeMarkdown(json_encode($data)) : '')
            . PHP_EOL . 'ENV SCHEDULE: ' . $this->envService->getEnv()
        ;

        $params = [
            'text' => $text,
            'parse_mode' => 'html',
            'disable_web_page_preview' => true,
            'chat_id' => $this->logChannelId
        ];

        if ($photo) {
            $params['photo'] = $photo;
            $params['caption'] = $text;
        }

        return $this->sendCurl($params);
    }
}
