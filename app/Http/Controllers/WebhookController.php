<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;

class WebhookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Nutgram $bot)
    {
        try {
            $bot->run();
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
        }
    }
}
