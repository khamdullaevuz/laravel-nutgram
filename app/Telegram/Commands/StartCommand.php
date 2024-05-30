<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;

class StartCommand extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'Start command';

    public function handle(Nutgram $bot): void
    {
        $firstName = $bot->user()->first_name;
        $bot->sendMessage(
            text: 'Assalomu alaykum ' . $firstName,
            reply_markup: ReplyKeyboardMarkup::make(
                resize_keyboard: true
            )
                ->addRow(
                    KeyboardButton::make(
                        text: 'Xabar qoldirish'
                    )
                )
        );
    }
}
