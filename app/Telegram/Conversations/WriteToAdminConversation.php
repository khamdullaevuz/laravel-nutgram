<?php

namespace App\Telegram\Conversations;

use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class WriteToAdminConversation extends Conversation
{
    public function start(Nutgram $bot)
    {
        $bot->sendMessage(
            text: 'Xabaringizni kiriting',
            reply_markup: ReplyKeyboardRemove::make(
                remove_keyboard: true
            )
        );

        $this->next('write');
    }

    public function write(Nutgram $bot)
    {
        $text = $bot->message()->text;
        $bot->sendMessage(
            text: $text,
            chat_id: config('telegram.admin')
        );

        $bot->sendMessage('Xabaringiz qabul qilindi. Tez orada javob beramiz.');
        $this->end();
    }
}
