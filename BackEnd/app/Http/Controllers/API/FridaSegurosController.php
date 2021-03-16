<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Google_Client; 
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use Google_Service_Exception;

class FridaSegurosController extends Controller
{
    public function uploadCuestionario(Request $request) 
    {
        $slack = $this->slack($request);

        if ($slack == "ok") {
            return response([
                'hubspot'  => $this->hubspot($request),
                'slack'    => $slack,
                'csvDrive' => $this->updateCSV($request)
            ]);
        }
    }

    private function hubspot($request) 
    {

        $hapikey = "39c9907b-f2e1-4a56-ac7d-e74e5cbd7516";
        
        $arr = array(
            'properties' => array(
                array(
                    'property' => 'marca_auto',
                    'value' => $request->marca
                ),
                array(
                    'property' => 'submarca',
                    'value' => $request->submarca
                ),
                array(
                    'property' => 'modelo_auto',
                    'value' => $request->modelo
                ),
                array(
                    'property' => 'tipo_celular',
                    'value' => $request->tipo
                ),
                array(
                    'property' => 'mobilephone',
                    'value' => $request->numeroCelular
                ),
                array(
                    'property' => 'state',
                    'value' => $request->estado
                ),
                array(
                    'property' => 'city',
                    'value' => $request->ciudad
                ),
                array(
                    'property' => 'email',
                    'value' => $request->correo
                ),
                array(
                    'property' => 'date_of_birth',
                    'value' => $request->fechaNacimiento
                ),
                array(
                    'property' => 'zip',
                    'value' => $request->codigoPostal
                ),
                array(
                    'property' => 'military_status',
                    'value' => $request->vivesCasa
                ),
                array(
                    'property' => 'whathub_last_message_synced_date',
                    'value' => $request->submarca
                ),
                array(
                    'property' => 'operador_celular',
                    'value' => $request->operadora
                ),
                array(
                    'property' => 'lifecyclestage',
                    'value' => 'salesqualifiedlead'
                ),
                array(
                    'property' => 'hs_content_membership_notes',
                    'value' => $request->codigoPromocional
                ),
                array(
                    'property' => 'school',
                    'value' => 'OmniPóliza'
                ),
                array(
                    'property' => 'relationship_status',
                    'value' => \Carbon\Carbon::now(new \DateTimeZone('America/Mexico_City'))->format('d-m-Y')
                ),
            )
        );

        $post_json = json_encode($arr);

        $res = $this->sendRequestApiHubSpot('https://api.hubapi.com/contacts/v1/contact/email/' . $request->correo . '/profile?hapikey=' . $hapikey, $post_json);

        if ($res->original['status'] == 404) {
            $res = $this->sendRequestApiHubSpot('https://api.hubapi.com/contacts/v1/contact?hapikey=' . $hapikey, $post_json);
        }

        return $res;
    }

    private function sendRequestApiHubSpot($endpoint, $post_json) 
    {
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);

        @curl_close($ch);

        return response([
            'errors' => $curl_errors,
            'status' => $status_code,
            'response'    => $response
        ]);
    }

    private function slack($request) 
    {

        $url="https://hooks.slack.com/services/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";

        $canal = "#cotizaciones";
        $msg = "
            Se acaba de completar una solicitud de cotización con los siguientes datos: 
            Correo: ".$request->correo."
            Código Postal: ".$request->codigoPostal."
            Estado: ".$request->estado."
            Ciudad: ".$request->ciudad."
            Marca: ".$request->marca."
            Submarca: ".$request->submarca."
            Modelo: ".$request->modelo."
            Fecha de Nacimiento: ".$request->fechaNacimiento."
            Número de Celular: ".$request->numeroCelular."
            Operador Celular: ".$request->operadora."
            Tipo de Celular: ".$request->tipo."
            Tipo de Vivienda: ".$request->vivesCasa."
            Código de Promotor: ".$request->codigoPromocional."
        ";
        $bot = "Frida Seguros Bot";

        if(empty($bot)) $bot = "botonete";
        $datas = ["text"=>$msg,"channel"=> $canal, "username"=>$bot]; // datos a enviar
        $data = "payload=".json_encode($datas); //lo convertimos a formato JSON
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }

    private function updateCSV($request) 
    {

        $list = [
            [
                "Fecha" => \Carbon\Carbon::now(new \DateTimeZone('America/Mexico_City'))->format('d-m-Y'),
                "Hora" => \Carbon\Carbon::now(new \DateTimeZone('America/Mexico_City'))->format('H:i'),
                "Correo" => $request->correo, 
                "Codigo Postal" => $request->codigoPostal,
                "Estado" => $request->estado,
                "Ciudad" => $request->ciudad,
                "Marca" => $request->marca,
                "Submarca" => $request->submarca,
                "Modelo" => $request->modelo,
                "Fecha de Nacimiento" => $request->fechaNacimiento,
                "Numero de Celular" => $request->numeroCelular,
                "Operador Celular" => $request->operadora,
                "Tipo de Celular" => $request->tipo,
                "Tipo de Vivienda" => $request->vivesCasa,
                "Codigo Promocional" => $request->codigoPromocional
            ]
        ];
        
        $fp = fopen("frida-seguros.csv", 'a');
        //Write fields
        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);

        $drive = $this->uploadFileGDrive();

        return $drive;

    }

    private function uploadFileGDrive() {

        $result = "";

        putenv('GOOGLE_APPLICATION_CREDENTIALS=credentials.json');

        $client = new Google_Client();

        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/drive.file']);
        try{
        //instanciamos el servicio
        $service = new Google_Service_Drive($client);

        //ruta al archivo
        $file_path = 'frida-seguros.csv';

        //instacia de archivo
        $file = new Google_Service_Drive_DriveFile();
        //$file->setName("frida-seguros.csv");

        //obtenemos el mime type
        $finfo = finfo_open(FILEINFO_MIME_TYPE); 
        $mime_type=finfo_file($finfo, $file_path);

        //id de la carpeta donde hemos dado el permiso a la cuenta de servicio 
        //$file->setParents(array("1WEWK5_HZo-36Dc5UwJkfgL8R7MTuto67"));
        //$file->setDescription('archivo subido desde php');
        $file->setMimeType($mime_type);

        $result = $service->files->update(
        "1ESQrzOfyUw-z6wrESlGIPSVCdfLfepxA",
        $file,
        array(
            'data' => file_get_contents($file_path),
            'mimeType' => $mime_type,
            'uploadType' => 'media',
        )
        );

        //echo '<a href="https://drive.google.com/open?id='.$result->id.'" target="_blank">'.$result->name.'</a>';

        }catch(Google_Service_Exception $gs){
            $m=json_decode($gs->getMessage());
            //echo $m->error->message;
        } catch(Exception $e) {
            //echo $e->getMessage();
        }

        return $result;
    }
}
