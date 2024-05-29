<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Conversations\WriteToAdminConversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

$bot->onCommand('start', function (Nutgram $bot) {
    $firstName = $bot->user()->first_name;
    $bot->sendMessage(
        text: 'Assalomu alaykum ' . $firstName,
        reply_markup: ReplyKeyboardMarkup::make(
            resize_keyboard: true
        )
        ->addRow(
            KeyboardButton::make('Xabar qoldirish')
        )
    );
});

$bot->onText('Xabar qoldirish', function (Nutgram $bot) {
    WriteToAdminConversation::begin($bot);
});
