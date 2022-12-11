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
            $token = 'EAAMZANnayh7wBALWSuN71lmThW0zKu2eXWnpwxrGSZBEuJRikr9uipb2ZCrQ3tkVejURwOZABOtudnGsPqEkGZBen1ZCARXd1EqZCZCWCRGYMXEQnW0cwVdZAQlCz2YEog43E12zZC8AmocMWPDit5ve96ZAd2WgrEZBRZABD7RSMOd8BSGz2o4yuPPb5QiihZAqBVmreexpRP2wWztgZDZD';
            $urlApi = $link.$version.$phoneId.'/messages';
            // Cuerpo envío
            $payload = [
                'messaging_product' => 'whatsapp',
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
