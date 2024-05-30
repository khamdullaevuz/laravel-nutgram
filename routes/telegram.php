<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Conversations\WriteToAdminConversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\WebApp\WebAppInfo;

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
            KeyboardButton::make(
                text: 'Xabar qoldirish'
            )
        )->addRow(
            KeyboardButton::make(
                text: 'Menu',
                web_app: new WebAppInfo(
                    url: 'https://google.com'
                )
            )
        )
    );
});

$bot->onText('Xabar qoldirish', function (Nutgram $bot) {
    WriteToAdminConversation::begin($bot);
});
