<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VLSM Judge</title>
    <link rel="icon" href="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-local-network-computer-science-flaticons-lineal-color-flat-icons.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">    
</head>
<header>
    <?php
        include 'menu.php';
    ?>
</header>
<body>
    <div id = "main">
        <div class="card">
            <div class="card-header" id = "en1">Conceptos básicos para entender VLSM</div>
            <div class="card-body" id = "c3">
                <h5 class="card-title">Dirección IP</h5>
                <p>Una dirección ip es un identificador que se utiliza para reconocer los dispositivos que se conectan através de una red.</p>
                <h5>Máscara de red</h5>
                <p>Una máscara de red es una combinación de bits que se utiliza para separar una dirección IP en dos partes: la red y el host. Su función es indicar a los dispositivos qué parte de la dirección IP corresponde a la red/subred y qué parte al host.</p>
                <h5>Octecto</h5>
                <p>En redes, un octeto es una unidad de 8 bits (0 y 1) que se utiliza para representar una parte de una dirección IP. Los octetos se utilizan para dividir los 32 bits de una dirección IP en cuatro partes, cada una representada por un octeto.</p>
                <h5>Host</h5>
                <p>El host en pocas palabras es cualquier dispositivo que tenga una dirección ip y se conecte a internet. Por ejemplo: Computadores, télefonos, servidores, routers, dispositivos IoT</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id = "en1">Introducción</div>
            <div class="card-body" id = "c31">
                <h5 class="card-title center">VLSM (Máscara de subred de longitud variable)</h5>
                <p id = "p">VLSM (Máscara de longitud variable) es una técnica que nos permite dividir una red en subredes más pequeñas de diferentes tamaños.</p>
                <p id = "p">El VLSM es especialmente útil en redes de tamaño mediano y grande, donde existe una gran variedad de dispositivos y se requiere una asignación eficiente de direcciones IP. También es muy útil en entornos donde las necesidades de conectividad cambian con frecuencia.</p>
                <div class="center">
                    <img id="img2" src="https://i.ibb.co/2tLk5r5/image.png">
                    <p>1.1 Ilustración de una topologia con VLSM.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id = "en1">Pasos para hacer vlsm</div>
            <div class="card-body" id = "c32">
                <h5 class="card-title center">Paso 1: Identificar a que clase pertenece la Ip asignada</h5>
                <div class="center">
                    <table class="table">
                        <tr>
                            <th>Clases</th>
                            <th>Rango</th>
                            <th>Primera utilizable</th>
                            <th>Ultima utilizable</th>
                            <th>Máscara predeterminada</th>
                        </tr>
                        <tr>
                            <td>A</td>
                            <td>0 - 127</td>
                            <td>0.0.0.0</td>
                            <td>127.255.255.255</td>
                            <td>255.0.0.0</td>
                        </tr>
                        <tr>
                            <td>B</td>
                            <td>128 - 191</td>
                            <td>128.0.0.0</td>
                            <td>191.255.255.255</td>
                            <td>255.255.0.0</td>
                        </tr>
                        <tr>
                            <td>C</td>
                            <td>192 - 223</td>
                            <td>192.0.0.0</td>
                            <td>223.255.255.255</td>
                            <td>255.255.255.0</td>
                        </tr>
                        <tr>
                            <td>D</td>
                            <td>224 - 239</td>
                            <td>224.0.0.0</td>
                            <td>239.255.255.255</td>
                            <td>N/A</td>
                        </tr>
                        <tr>
                            <td>E</td>
                            <td>240 - 255</td>
                            <td>240.0.0.0</td>
                            <td>255.255.255.255</td>
                            <td>N/A</td>
                        </tr>
                    </table>
                </div>    
                <h5 class="card-title center">Paso 2: Ordenar la cantidad de host</h5>
                <div class="center">
                    <p>La cantidad de host </p>  
                </div> 
            </div>
        </div>
        <div class="card">
            <div class="card-header" id = "en1">Si aún no te queda claro!!</div>
            <div class="card-body" id = "c5">
                <p>Algunos sitios que me fueron de utilidad para comprender el tema</p>
                <ul>
                    <li>
                        <a href="https://www.cisco.com/c/es_mx/support/docs/ip/routing-information-protocol-rip/13790-8.html">Explicación de las cantidades de hosts y subredes</a>
                    </li>
                    <li>
                        <a href="https://www.adaptixnetworks.com/mascara-de-red/">Máscara de red</a>
                    </li>
                    <li>
                        <a href="https://www.profesionalreview.com/2020/03/07/calcular-la-mascara-de-subred/">Cómo calcular la máscara de subred (Guía definitiva de subnetting)</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>