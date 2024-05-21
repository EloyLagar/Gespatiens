<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;
use Dompdf\Options;


    class MidStayReportController extends Controller
    {

        function createPDF()
        {
            // dd($_POST);
            try {
                $imagen = public_path('img/headerImg.png');
                $texto = $_POST['texto'];
                $modo = $_POST['modo'];
                $download = $modo === 'si' ? true : false;
                $contenido = '<!DOCTYPE html>
                <html>
                    <head>
                    <style>
                    @page{
                        margin: 3cm 0.5cm 0.5cm 0.5cm;
                    }
                        .header {
                            position: fixed;
                            top: -2.5cm;
                            text-align: center;
                            justify-content: center;
                            justify-items: center;
                        }
                        .imgHeader{
                            text-align: center;
                            width: 100%;
                        }
                        .content{
                            margin-top: 5cm;
                        }
                        table {
                        width: 100%;
                        text-align: center;
                        }
                        .bloque{
                            width: 2cm;
                            height: 1cm;
                            margin: 2cm;
                        }
                    </style>
                    </head>
                    <body>
                        <div class="header">
                            <div class="imgHeader">
                                <img src="' . $imagen . '" alt="Gespatiens" style="width: 100px;"><br>
                            </div>
                        </div>
                        <div class="container">
                            <h1>Bienvenido de nuevo a Gespatiens</h1>
                            <p>Versión <b>1</b></p>
                            <p>' . $texto . '</p>
                            <!-- Resto del contenido -->
                        </div>
                    </body>
                </html>';

                $contenido = sprintf(utf8_decode($contenido), $imagen, 'Gespatiens', 'Gespatiens', '1', $texto);

                // Nombre del pdf
                $filename = 'pueba.pdf';

                // Opciones para prevenir errores con carga de imágenes
                $options = new Options();
                $options->set('isRemoteEnabled', true);

                // Instancia de la clase
                $dompdf = new Dompdf($options);

                // Cargar el contenido HTML
                $dompdf->loadHtml($contenido    );

                // Formato y tamaño del PDF
                $dompdf->setPaper('A4', 'portrait');

                // Renderizar HTML como PDF
                $dompdf->render();

                // Salida para descargar
                $dompdf->stream($filename, ['Attachment' => true]);

            } catch (\Exception $e) {
                \Redirect::to('home');
            } catch (DomException $e) {
                \Redirect::to('home');
            }
            return redirect()->back();
        }


    }
