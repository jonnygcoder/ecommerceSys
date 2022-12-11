<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Sdkconsultoria\WhatsappCloudApi\Waba\SendMessage;

class MessengerController extends Controller
{
    
    /*public function send(Request $request, string $phone)
    {
        SendMessage::message($phone)->attachText($request->message)->send();
    }*/

    /*public function send(String $message, string $phone)
    {
        SendMessage::message($phone)->attachText($message)->send();
    }*/

    public static function sendMessageWsp2()
    {   

        $message = "Mensaje de prueba de desde la API de WSP";
        $phone = "51923888604";
        SendMessage::message($phone)->attachText($message)->send();
    }


    public static function sendMessageWsp(){

        $response = [];
        try {

            // Parámetros
            $link ='https://graph.facebook.com/';
            $version ='v15.0/';
            $phoneId ='109349012021556/';
            $token = 'EAAMZANnayh7wBAHr2sZCFn1P1ZCIjdu9p7qmvdJ7gZBPXytZCrJkwEZBPrWsKTZA23j5klmoMRObs6uLckK9nIm1EIDQ6KoXnRCREF0IJrZASMAGZBFyUoje1jXoZBnyQvG036A9RyvTWnfGisWCMIYz1Q9ZBPZBB40ashvto1osufTmhkqAwdBW5hBWAIIdFdDQjHjBgp7EZC2hxrgZDZD';
            $urlApi = $link.$version.$phoneId.'/messages';
            // Cuerpo
            $payload = [
                'messaging_product' => '',
                'to' => '51923888604',
                'type' => 'template',
                'template' => [
                    'name' => 'ecommerce_utp',
                    'language' => ['code' => 'Spanish'],
                ]
            ];

            
            // Excecute Api WSP
            $dataMsg = Http::withToken($token)->post($urlApi,$payload)->throw()->json();
            dd($dataMsg);
           
            return response()->json([
                'succeess' => true,
                'data' => $dataMsg
            ],200);

        } catch (\Throwable $th) {

            return response()->json([
                'succeess' => true,
                'data' => $th->getMessage()
            ],500);
        }
    }

}
