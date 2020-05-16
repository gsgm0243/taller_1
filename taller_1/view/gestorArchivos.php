<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <title></title>
    </head>
    <body>
       <h2 style="margin-top: 5px;">Gestor de Archivos</h2>
       <form action="../service/file_service.php" method="post" enctype="multipart/form-data">
          <div class="content" style="width: 30%; margin-left: 20px; margin-top: 15px;">
            <div class="form-group">
               <input type="file"  id="file" name="file">
             </div>
             <button type="submit" class="btn btn-primary">Enviar</button>
            </div>   
         </form>

        <?php
        crear_imagen();
        echo "<img src=imagen.png?".date("U")." style=\"margin: 30px 550px 0px; align=center\">";
       
        function  crear_imagen(){
                $im = imagecreate(200, 200) or die("Error en la creacion de imagenes");
                $color_fondo = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));   

                $rojo = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));                 
                $azul = imagecolorallocate($im, rand(0,254), rand(0,255), rand(0,255));              
                imagerectangle ($im,   rand(0,255),  rand(0,255), rand(0,255), rand(0,255), $rojo);
                imagefilledrectangle ($im, rand(0,255),  rand(0,255), rand(0,255), rand(0,255), $azul);

                imagepng($im,"imagen.png");
                imagedestroy($im);
        }

        date_default_timezone_set('America/Bogota');
        
        $today = date('Y-m-d H:i:s A');
        echo "<div style=\"margin: 30px 565px 0px; width:100%;\">$today</div>";
    
        ?>
        <br>
        <input class="btn btn-link" onclick="location.href='gestorPersonas.html'" type="button" value="< Gestor Personas">
   </body>
</html>
