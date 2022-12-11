<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Sdkconsultoria\WhatsappCloudApi\Waba\SendMessage;

use function PHPUnit\Framework\throwException;

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
                'success' => true,
                'data' => $dataMsg
            ],200);

        } catch (\Throwable $th) {

            return response()->json([
                'success' => true,
                'data' => $th->getMessage()
            ],500);
        }
    }

    public function verifyWebhook(Request $request){

        try {
           
            $keyTocken = 'jonnygcoderWhTk2022**';
            $query = $request->query();
            //dd($query);
            $mode = $query['hub_mode'];
            $token = $query['hub_verify_token'];
            $challenge = $query['hub_challenge'];

            if($token){
                if($mode === 'subscribe' && $token == $keyTocken){
                    return response()->json([
                        'success' => true,
                    ],200);
                }

            }

            throw new Exception('Respuesta invalida');

        } catch (\Throwable $th) {
            return response()->json([
                'success' => true,
                'data' => $th->getMessage()
            ],500);
        }
    }

}
