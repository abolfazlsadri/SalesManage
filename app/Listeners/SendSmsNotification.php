<?php

namespace App\Listeners;

use App\Events\PlaceOrderEvent;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\KavenegarApi;

class SendSmsNotification
{
    public function handle(PlaceOrderEvent $event)
    {
        if ($event->phoneNumber) {
            try {
                $sender = env('KAVENEGAR_SENDER');
                $receptor = $event->phoneNumber;
                $message = "سفارش شما با موفقیت ثبت شد.";

                $api = new KavenegarApi(env('KAVENEGAR_API_KEY'));
                $api->Send($sender, $receptor, $message);
            } catch(ApiException|HttpException $e){
                echo $e->errorMessage();
            } catch(\Exception $ex){
                echo $ex->getMessage();
            }
        }
    }
}
