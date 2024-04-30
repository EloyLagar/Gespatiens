<?php
/**
 * Contorlador del paso a PDF de un reporte
 */

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
                        <img src="%s" alt="%s" style="width: 100px;"><br>
                    </div>
                </div>
                <div class="container">
                    <h1>Bienvenido de nuevo a %s</h1>
                    <p>Versión <b>%s</b></p>
                    <p>%s</p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis at eveniet quos nisi ad eius voluptate. Quia culpa odit ratione? Porro mollitia esse illum. Odio nam laudantium soluta laborum architecto?
                        Soluta modi atque, non vitae debitis cupiditate magnam saepe at explicabo ullam quaerat, sunt harum eligendi optio veniam ipsam molestiae enim vero sequi. Maxime animi culpa labore reprehenderit omnis libero?
                        Ipsum, laboriosam? Unde ipsum illum, quibusdam similique ab porro nobis fugiat quis recusandae tenetur nulla maxime nesciunt hic maiores officia alias possimus enim, libero ipsa sequi. Enim vel obcaecati laborum?
                        Modi eius veniam culpa assumenda. Eius doloribus delectus fuga modi laborum dignissimos similique incidunt veritatis numquam! Error nihil facilis omnis illum aperiam! Fugiat accusantium, odit veritatis culpa provident blanditiis beatae.
                        Voluptatibus ab deleniti animi magnam. Molestiae asperiores rem beatae amet dicta facilis deleniti unde officia praesentium ipsa quasi saepe in soluta aliquam, a autem dolor fugiat, obcaecati ducimus similique inventore!
                        Molestiae mollitia inventore delectus natus error, vel perspiciatis libero voluptatibus at beatae similique pariatur maiores eveniet eaque nam illo omnis eum iure tenetur. Mollitia harum debitis aut, saepe perspiciatis vero.
                        Voluptatum quae doloremque ratione eum, eius quisquam accusamus, placeat, nostrum officiis laboriosam inventore? Itaque beatae recusandae odit atque suscipit perferendis eaque nulla commodi quae. Necessitatibus soluta omnis doloribus vero voluptatem?
                        Perspiciatis nulla sapiente ipsa repudiandae molestiae provident vel unde molestias, nemo inventore quas quos, et maxime! Nesciunt, excepturi similique. Repudiandae voluptates ipsum eveniet officia laudantium et sequi autem officiis non.
                        Totam deleniti a maiores sint dolores explicabo at exercitationem, pariatur sed quos dolorem perferendis est neque, minima molestiae. Ducimus, natus fugiat. Aperiam voluptatibus vitae velit esse quaerat fugit est recusandae!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis at eveniet quos nisi ad eius voluptate. Quia culpa odit ratione? Porro mollitia esse illum. Odio nam laudantium soluta laborum architecto?
                        Soluta modi atque, non vitae debitis cupiditate magnam saepe at explicabo ullam quaerat, sunt harum eligendi optio veniam ipsam molestiae enim vero sequi. Maxime animi culpa labore reprehenderit omnis libero?
                        Ipsum, laboriosam? Unde ipsum illum, quibusdam similique ab porro nobis fugiat quis recusandae tenetur nulla maxime nesciunt hic maiores officia alias possimus enim, libero ipsa sequi. Enim vel obcaecati laborum?
                        Modi eius veniam culpa assumenda. Eius doloribus delectus fuga modi laborum dignissimos similique incidunt veritatis numquam! Error nihil facilis omnis illum aperiam! Fugiat accusantium, odit veritatis culpa provident blanditiis beatae.
                        Voluptatibus ab deleniti animi magnam. Molestiae asperiores rem beatae amet dicta facilis deleniti unde officia praesentium ipsa quasi saepe in soluta aliquam, a autem dolor fugiat, obcaecati ducimus similique inventore!
                        Molestiae mollitia inventore delectus natus error, vel perspiciatis libero voluptatibus at beatae similique pariatur maiores eveniet eaque nam illo omnis eum iure tenetur. Mollitia harum debitis aut, saepe perspiciatis vero.
                        Voluptatum quae doloremque ratione eum, eius quisquam accusamus, placeat, nostrum officiis laboriosam inventore? Itaque beatae recusandae odit atque suscipit perferendis eaque nulla commodi quae. Necessitatibus soluta omnis doloribus vero voluptatem?
                        Perspiciatis nulla sapiente ipsa repudiandae molestiae provident vel unde molestias, nemo inventore quas quos, et maxime! Nesciunt, excepturi similique. Repudiandae voluptates ipsum eveniet officia laudantium et sequi autem officiis non.
                        Totam deleniti a maiores sint dolores explicabo at exercitationem, pariatur sed quos dolorem perferendis est neque, minima molestiae. Ducimus, natus fugiat. Aperiam voluptatibus vitae velit esse quaerat fugit est recusandae!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis at eveniet quos nisi ad eius voluptate. Quia culpa odit ratione? Porro mollitia esse illum. Odio nam laudantium soluta laborum architecto?
                        Soluta modi atque, non vitae debitis cupiditate magnam saepe at explicabo ullam quaerat, sunt harum eligendi optio veniam ipsam molestiae enim vero sequi. Maxime animi culpa labore reprehenderit omnis libero?
                        Ipsum, laboriosam? Unde ipsum illum, quibusdam similique ab porro nobis fugiat quis recusandae tenetur nulla maxime nesciunt hic maiores officia alias possimus enim, libero ipsa sequi. Enim vel obcaecati laborum?
                        Modi eius veniam culpa assumenda. Eius doloribus delectus fuga modi laborum dignissimos similique incidunt veritatis numquam! Error nihil facilis omnis illum aperiam! Fugiat accusantium, odit veritatis culpa provident blanditiis beatae.
                        Voluptatibus ab deleniti animi magnam. Molestiae asperiores rem beatae amet dicta facilis deleniti unde officia praesentium ipsa quasi saepe in soluta aliquam, a autem dolor fugiat, obcaecati ducimus similique inventore!
                        Molestiae mollitia inventore delectus natus error, vel perspiciatis libero voluptatibus at beatae similique pariatur maiores eveniet eaque nam illo omnis eum iure tenetur. Mollitia harum debitis aut, saepe perspiciatis vero.
                        Voluptatum quae doloremque ratione eum, eius quisquam accusamus, placeat, nostrum officiis laboriosam inventore? Itaque beatae recusandae odit atque suscipit perferendis eaque nulla commodi quae. Necessitatibus soluta omnis doloribus vero voluptatem?
                        Perspiciatis nulla sapiente ipsa repudiandae molestiae provident vel unde molestias, nemo inventore quas quos, et maxime! Nesciunt, excepturi similique. Repudiandae voluptates ipsum eveniet officia laudantium et sequi autem officiis non.
                        Totam deleniti a maiores sint dolores explicabo at exercitationem, pariatur sed quos dolorem perferendis est neque, minima molestiae. Ducimus, natus fugiat. Aperiam voluptatibus vitae velit esse quaerat fugit est recusandae!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis at eveniet quos nisi ad eius voluptate. Quia culpa odit ratione? Porro mollitia esse illum. Odio nam laudantium soluta laborum architecto?
                        Soluta modi atque, non vitae debitis cupiditate magnam saepe at explicabo ullam quaerat, sunt harum eligendi optio veniam ipsam molestiae enim vero sequi. Maxime animi culpa labore reprehenderit omnis libero?
                        Ipsum, laboriosam? Unde ipsum illum, quibusdam similique ab porro nobis fugiat quis recusandae tenetur nulla maxime nesciunt hic maiores officia alias possimus enim, libero ipsa sequi. Enim vel obcaecati laborum?
                        Modi eius veniam culpa assumenda. Eius doloribus delectus fuga modi laborum dignissimos similique incidunt veritatis numquam! Error nihil facilis omnis illum aperiam! Fugiat accusantium, odit veritatis culpa provident blanditiis beatae.
                        Voluptatibus ab deleniti animi magnam. Molestiae asperiores rem beatae amet dicta facilis deleniti unde officia praesentium ipsa quasi saepe in soluta aliquam, a autem dolor fugiat, obcaecati ducimus similique inventore!
                        Molestiae mollitia inventore delectus natus error, vel perspiciatis libero voluptatibus at beatae similique pariatur maiores eveniet eaque nam illo omnis eum iure tenetur. Mollitia harum debitis aut, saepe perspiciatis vero.
                        Voluptatum quae doloremque ratione eum, eius quisquam accusamus, placeat, nostrum officiis laboriosam inventore? Itaque beatae recusandae odit atque suscipit perferendis eaque nulla commodi quae. Necessitatibus soluta omnis doloribus vero voluptatem?
                        Perspiciatis nulla sapiente ipsa repudiandae molestiae provident vel unde molestias, nemo inventore quas quos, et maxime! Nesciunt, excepturi similique. Repudiandae voluptates ipsum eveniet officia laudantium et sequi autem officiis non.
                        Totam deleniti a maiores sint dolores explicabo at exercitationem, pariatur sed quos dolorem perferendis est neque, minima molestiae. Ducimus, natus fugiat. Aperiam voluptatibus vitae velit esse quaerat fugit est recusandae!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis at eveniet quos nisi ad eius voluptate. Quia culpa odit ratione? Porro mollitia esse illum. Odio nam laudantium soluta laborum architecto?
                        Soluta modi atque, non vitae debitis cupiditate magnam saepe at explicabo ullam quaerat, sunt harum eligendi optio veniam ipsam molestiae enim vero sequi. Maxime animi culpa labore reprehenderit omnis libero?
                        Ipsum, laboriosam? Unde ipsum illum, quibusdam similique ab porro nobis fugiat quis recusandae tenetur nulla maxime nesciunt hic maiores officia alias possimus enim, libero ipsa sequi. Enim vel obcaecati laborum?
                        Modi eius veniam culpa assumenda. Eius doloribus delectus fuga modi laborum dignissimos similique incidunt veritatis numquam! Error nihil facilis omnis illum aperiam! Fugiat accusantium, odit veritatis culpa provident blanditiis beatae.
                        Voluptatibus ab deleniti animi magnam. Molestiae asperiores rem beatae amet dicta facilis deleniti unde officia praesentium ipsa quasi saepe in soluta aliquam, a autem dolor fugiat, obcaecati ducimus similique inventore!
                        Molestiae mollitia inventore delectus natus error, vel perspiciatis libero voluptatibus at beatae similique pariatur maiores eveniet eaque nam illo omnis eum iure tenetur. Mollitia harum debitis aut, saepe perspiciatis vero.
                        Voluptatum quae doloremque ratione eum, eius quisquam accusamus, placeat, nostrum officiis laboriosam inventore? Itaque beatae recusandae odit atque suscipit perferendis eaque nulla commodi quae. Necessitatibus soluta omnis doloribus vero voluptatem?
                        Perspiciatis nulla sapiente ipsa repudiandae molestiae provident vel unde molestias, nemo inventore quas quos, et maxime! Nesciunt, excepturi similique. Repudiandae voluptates ipsum eveniet officia laudantium et sequi autem officiis non.
                        Totam deleniti a maiores sint dolores explicabo at exercitationem, pariatur sed quos dolorem perferendis est neque, minima molestiae. Ducimus, natus fugiat. Aperiam voluptatibus vitae velit   esse quaerat fugit est recusandae
                    </div>
                </body>
            </html>';
            $imagen = public_path('img/headerImg.png');
            $contenido = sprintf($contenido, $imagen, 'Gespatiens', 'Gespatiens', '1', $texto);

            // Nombre del pdf
            $filename = 'pueba.pdf';

            // Opciones para prevenir errores con carga de imágenes
            $options = new Options();
            $options->set('isRemoteEnabled', true);

            // Instancia de la clase
            $dompdf = new Dompdf($options);

            // Cargar el contenido HTML
            $dompdf->loadHtml($contenido);

            // Formato y tamaño del PDF
            $dompdf->setPaper('A4', 'portrait');

            // Renderizar HTML como PDF
            $dompdf->render();

            // Salida para descargar
            $dompdf->stream($filename, ['Attachment' => false]);

        } catch (\Exception $e) {
            \Redirect::to('home');
        } catch (DomException $e) {
            \Redirect::to('home');
        }
        return redirect()->back();
    }


}
