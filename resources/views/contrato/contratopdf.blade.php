
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrato</title>
</head>
<body>
    <section class="content">

        <div class="container-fluid">
            @include('Custom.mensaje')
            <div class="card card-primary">
                <div class="card-body">
                <div><h2 style="text-align: center;">CONTRATO DE PRESTACION DE SERVICIO FUNERARIO EN EMERGENCIAS</h2></div>
                <p>Conste por el presente documento, un contrato de prestación de servicio funerario en emergencia, en adelante el contrato, sujeto a las siguientes claúsulas</p>
                <h3>PRIMERA PARTES.-</h3>
                <p><b>Funeraria Cotoca San Pedro</b>, representada por la Sra. MAYRA TORREZ SEGOVIA</p>
                <p>mayor de edad, hábil por derecho, con cedula de identidad Nro. 000000 SCZ </p>
                <p>que en adelante se denomninará <b>LA FUNERARIA.</b></p>
        
                <p><b>El solicitante del servicio Funerario</b>, que se denominará <b>TITULAR</b>, responde a los</p>
                <p>siguientes datos :</p><br>
        
                
                <p><b  style="font-size: 18px;">Nombre : </b> {{$contrato->cliente->persona->nombre.' '.$contrato->cliente->persona->apellido_paterno.' '.$contrato->cliente->persona->apellido_materno}}</p>
                <p ><b style="font-size: 18px;">Celular : </b> {{$contrato->cliente->telefono}}</p>
                <p ><b style="font-size: 18px;">Domicilio Particular : </b> {{$contrato->cliente->persona->direccion}}</p><br>
        
                <p><b>En caso de tener los seguros, el titular se compromete a entregar todos los documentos exigidos </b></p>
                <p><b>para realizar el descuento en CRE, COTAS, y la RENTA DIGNIDAD</b></p>
                <br>
        
                <h3>SEGUNDO OBJETOS.-</h3>
                <p>Por medio de este contrato LA FUNERARIA acuerda prestar un servicio funerario en emergencia,</p>
                <p>cuyas caracteristicas son las Siguientes: </p><br>
        
                @foreach ($servicios as $servicio)
                <h5>Servicio: {{$servicio->nombre}}</h5>
                <table>
                    <tr>
                        <th>N</th>
                        <th style="text-align: center; padding: 10px;">Cod_Item </th>
                        <th  style="text-align: center; padding: 10px;">Nombre</th>
                    </tr>
                @foreach ($servicio->items as $item)
                
                   
                    <tr>
                        <td  style="border: 1px solid rgb(29, 22, 34);text-align: center; padding: 10px;">{{$item->id}}</td>
                        <td  style="border: 1px solid rgb(29, 22, 34);text-align: center; padding: 10px;">{{$item->cod_item}}</td>
                        <td  style="border: 1px solid rgb(29, 22, 34);text-align: center; padding: 10px;">{{$item->nombre}}</td>
                    </tr>
                    @endforeach
                </table><br>
                @endforeach
                <br>
                <h3>TERECERO PRECIOS Y CONDICIONES DE PAGO</h3>
                <p>El TITULAR del servicio funerario deberá cancelar la totalidad del contrato antes del traslado al cementerio,</p>
                <p>caso contrario se procederá a cobrar una multa del 50% del monto total a cancelar.</p>
                <br>
                <p><b>PRECIO TOTAL DEL SERVICIO FUNERARIO EN BS.</b> {{$contrato->monto}} bs</p>
                <p><b>TOTAL A CANCELAR : </b>   {{$contrato->monto}} bs</p><br>
        
                <table> 
                    <tr>
                        <td style="border: 1px solid rgb(29, 22, 34);text-align: center; padding: 20px;"><b>TOTAL A CANCELAR</b></td>
                        <td style="border: 1px solid rgb(29, 22, 34);text-align: center; padding: 20px;">{{$contrato->monto}} bs</td>
                        <td style="border: 1px solid rgb(29, 22, 34);text-align: center; padding: 20px;"><b>A CUENTA</b> ______</td>
                        <td style="border: 1px solid rgb(29, 22, 34);text-align: center; padding: 20px;"><b>SALDO Bs.</b></td>
                        <td style="border: 1px solid rgb(29, 22, 34);text-align: center; padding: 20px;">{{$contrato->monto}} bs.</td>
                    </tr>
                </table>
                <br>
                <h3>CUARTA ACEPTACION</h3>
        
                <p>Las partes acuerdan darle al presente contrato categoría de instrumento privado, con el valor que le asigna</p>
                <p>el artículo ART. 454. , 519. , 1297. , del codigo civil, pudiendo elevarse a instrumento publico a simple</p>
                <p>reconocimiento de firmas ante la autoridad competente.</p>
            </div>
        
        
         </div>
                
               
            
        </div>
        </section>
</body>
</html>




















