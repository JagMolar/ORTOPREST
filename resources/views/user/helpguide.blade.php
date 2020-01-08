@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 50px">
        <div class="col-md-10">
            @include('includes.message')
            <div class="card pt-6 shadow rounded">
                <div class="card-header" style="color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    ORTOPREST: MANUAL DE USUARIO.
                    <img src="{{asset('../resources/assets/images/logogris-01.png')}}" alt="logo" style="width: 4vh"/>
                </div>

                <div class="card-body"> 
                    <div class="helpguide">
                        <div class="card-header" style="color: #386fa6;font-weight: bold !important">
                            INICIO DE SESIÓN
                        </div>
                       <br/>
                        <p>En la primera pantalla se encuentran las opciones encontramos dos opciones a través de las que podemos pasar a identificarnos,
                            tanto sobre la opción de LOGIN como pulsando sobre el botón de la imagen central
                        </p>
                        <img src="{{asset('../resources/assets/images/login1.png')}}" alt="login-sesion" style="width: 20rem"/>
                        <p>
                            Debemos acceder con nuestros datos a través del formulario que nos presenta. 
                            Para ello, un Administrador del sistema, deberá haber creado al usuario con anterioridad.
                            Si los datos no son correctos, nos avisará del error:
                        </p>
                        <img src="{{asset('../resources/assets/images/loginincorrecto.png')}}" alt="no-login" style="width: 20rem"/>
                        <p>
                            En caso de haber olvidado nuestra contraseña, es posible recuperarla a través de mismo correo electrónico, 
                            pulsando sobre la opción: <em style="color:#386fa6 ">¿Olvidaste tu contraseña?</em>
                            Esto, no lleva a un formulario donde indicaremos el correo que tenemos registrado.
                        </p>
                        <img src="{{asset('../resources/assets/images/restaurar-password1.png')}}" alt="recordar-contrasena" style="width: 20rem"/>
                        <p>En caso de indicar un email incorrecto, el sistema nos avisa: <em style="color: red">No se ha encontrado un usuario con esa dirección de correo</em></p>
                        <p>
                            Si la dirección es correcta, nos envía un correo para poder realizar el cambio (asegurarse que no entra en carpeta de correo no deseado o Spam):
                        </p>
                        <img src="{{asset('../resources/assets/images/restaurar-password2.png')}}" alt="mail-password" style="width: 20rem"/>
                        <p>
                            Este enlace nos redirige de nuevo a nuestra web, donde podremos modificar la contraseña por una nueva.
                        </p>
                        <img src="{{asset('../resources/assets/images/restaurar-password3.png')}}" alt="restaurar-password" style="width: 20rem"/>
                        <p>
                            Hecho el cambio, el sistema nos confirma e inicia sesión.
                        </p>
                        <img src="{{asset('../resources/assets/images/restaurar-password4.png')}}" alt="inicio-sesion" style="width: 20rem"/>
                    </div>
                    <div class="helpguide">
                        <div class="card-header" style="color: #386fa6;font-weight: bold !important">
                            PRIMEROS PASOS
                        </div>
                       <br/>
                        <p>Una vez iniciada la sesión con nuestros datos correctos. Nos presenta una vista inicial con algunas indicaciones generales, 
                            así como los enlaces a los sitios web de visita más habitual. 
                            Esta vista puede ser modificada, según necesidades o indicaciones de los administradores.
                        </p>
                        <img src="{{asset('../resources/assets/images/iniciogeneral.png')}}" alt="inicio-general" style="width: 20rem"/>
                        <p>
                            Podemos distinguir esta pantalla en dos zonas.
                        </p>
                        <p>
                            <strong>El cuerpo central:</strong> Haciendo clic sobre las imágenes, nos redirige en una nueva ventana a la web correspondiente.
                        </p>
                        <img src="{{asset('../resources/assets/images/inicio-cuerpo-general.png')}}" alt="login-sesion" style="width: 20rem"/>
                        <p>
                            <ul>
                                <strong>La barra de navegación superior:</strong>
                                <img src="{{asset('../resources/assets/images/inicio-barra-navegacion.png')}}" alt="login-sesion" style="width: 40rem; margin-bottom: 10px !important"/>
                     
                                <li style="list-style-type: decimal"><a href="{{ url('/') }}" target="blank" style="text-decoration: none"><strong>Logo:</strong></a>
                                    Podemos volver a la pantalla de arranque, para “invisibilizar” en cualquier momento nuestro trabajo actual. 
                                    Haciendo clic sobre LOGIN o botón, regresamos a la vista de inicio.
                                </li>
                                <li style="list-style-type: decimal"><a href="{{ url('/home') }}" target="blank" style="text-decoration: none"><strong>Inicio:</strong></a>
                                    En el resto de las pantallas, nos devuelve a esta vista de inicio.
                                </li>
                                <li style="list-style-type: decimal"><a href="{{route('beneficiary.alert')}}" style="text-decoration: none"><strong>Alertas:</strong></a>
                                    Nos lleva al apartado de alertas, y en el caso de haber alguna activa, nos lo muestra para llamar nuestra atención sobre ella.
                                    <img src="{{asset('../resources/assets/images/alerta-nav.png')}}" alt="login-sesion" style="width: 4rem; padding: 0; margin: 0 !important;"/>
                                </li>
                                <li style="list-style-type: decimal"><strong style="color: #3490dc">Zona de Usuario Activo:</strong>
                                    Contiene un menú desplegable con las funciones iniciales.
                                </li>
                            </ul>
                        </p>
                        <p>
                            En este menú se presentan dos Áreas principales. La primera está restringida a los administradores.
                            El acceso no será posible si no tenemos ese privilegio, mostrando el aviso oportuno.
                        </p>
                        <img src="{{asset('../resources/assets/images/alerta-admin.png')}}" alt="login-sesion" style="width: 30rem; margin-bottom: 10px !important"/>
                        <img src="{{asset('../resources/assets/images/barra-navegacion-menu.png')}}" alt="login-sesion" style="width: 15rem"/>
                    </div>
                    <div class="helpguide">
                        <div class="card-header" style="color: #386fa6;font-weight: bold !important">
                            AREA ADMINISTRADOR
                        </div>
                       <br/>
                        <p>
                            Este apartado tiene accesos restringidos ya que el tipo de datos al que se accede es el más delicado en su uso. <br/>
                            Un administrador puede acceder a:
                        </p>
                        <p>
                            <a href="{{ route('user.listadoUser')}}" style="text-decoration: none"><strong style="color: gray">Listado de Usuarios del Sistema.</strong></a> En este apartado se pueden comprobar los usuarios que mantiene activos el sistema, 
                            pudiendo realizar cualquier modificación sobre ellos
                        </p>
                        <img src="{{asset('../resources/assets/images/listado-usuarios1.png')}}" alt="listado-usuarios1" style="width: 25rem"/><br/>
                        <small>Aunque se puede observar un nuevo menú a la izquierda, sobre ese apartado no se abordará nada en este punto, siendo tratado más adelante.</small>
                        <p>
                            <ul>En el cuerpo del listado, además de ver sus datos generales, podemos acceder a:
                                <li style="list-style-type: decimal"><strong>Buscar un usuario registrado:</strong>
                                    Haciendo clic sobre el gran botón azul, accedemos a un campo de búsqueda, que nos ayudará a filtrar en el listado,
                                    mostrando los datos coincidentes o el error en su caso.
                                </li>
                                <img src="{{asset('../resources/assets/images/busqueda-user.png')}}" alt="busqueda-user" style="width: 20rem"/>
                                <li style="list-style-type: decimal"><strong>Actualizar datos de un usuario registrado:</strong>
                                    Pulsando sobre este enlace, nos lleva a un formulario con los datos del usuario reseñado, pudiendo modificarlo e incluso eliminar si así se estima.
                                </li>
                                <img src="{{asset('../resources/assets/images/update-datos-user.png')}}" alt="update-user" style="width: 20rem"/>
                                <li style="list-style-type: decimal"><strong>Eliminar un usuario registrado:</strong>
                                    Para evitar un borrado accidental, el sistema nos pedirá confirmación. 
                                </li>
                                <img src="{{asset('../resources/assets/images/alert.png')}}" alt="alert-user" style="width: 20rem"/>
                            </ul>   
                        </p>
                        <p>
                            <a href="{{ route('user.newUser')}}" style="text-decoration: none"><strong style="color: gray">Nuevo Usuario.</strong></a> Accede a un formulario donde ingresar los datos del usuario a registrar.
                        </p>
                        <img src="{{asset('../resources/assets/images/registro-user.png')}}" alt="registro-user" style="width: 20rem"/>
                        <p>
                            <a href="{{ route('config')}}" style="text-decoration: none"><strong style="color: gray">Actualización Perfil de Usuario.</strong></a> Este formulario de actualización se diferencia del anterior, 
                            en que muestra los datos del Administrador que está activo en ese momento, agilizando los cambios.
                        </p>
                        <p>
                            <a href="{{route('registro.create')}}" style="text-decoration: none"><strong style="color: gray">Registro Nuevos Productos.</strong></a> Accede al formulario de inscripción de nuevos productos en el catálogo.
                        </p>
                        <img src="{{asset('../resources/assets/images/registro-productos.png')}}" alt="registro-productos" style="width: 20rem"/>
                    </div>
                    <div class="helpguide">
                        <div class="card-header" style="color: #386fa6;font-weight: bold !important">
                            AREA USUARIO
                        </div>
                       <br/>
                        <p>
                            Este apartado es de acceso libre para cualquier tipo de usuario registrado en el sistema. 
                            Nos permitirá interactuar con los registros de beneficiarios y el catálogo de productos vigente.
                        </p>
                        <p>
                            <a href="{{ route('registrobeneficiario.create')}}" style="text-decoration: none"><strong style="color: gray">Área de Gestión Beneficiarios-REGISTRO.</strong></a> Este formulario, permite la inscripción de nuevos beneficiarios en el sistema,
                            independientemente de que puedan solicitar o no algún producto de forma inmediata, agilizando la posterior tramitación del préstamo. 
                            <br/>Los campos obligatorios estarán marcados con un asterisco rojo.
                        </p>
                        <img src="{{asset('../resources/assets/images/registro-beneficiario.png')}}" alt="registro-beneficiario" style="width: 20rem"/>
                        <img src="{{asset('../resources/assets/images/beneficiario-ok.png')}}" alt="beneficiario-ok" style="width: 35rem"/>
                        <p>Si los datos se graban correctamente, el sistema nos lo confirma visualmente, si no, debemos revisar los datos,
                            buscando los errores que nos indique el mismo formulario.</p>
                        <img src="{{asset('../resources/assets/images/validacion-campos.png')}}" alt="validacion-campos" style="width: 20rem"/>
                        <p>
                            <a href="{{route('beneficiary.listadoBeneficiario')}}" style="text-decoration: none"><strong style="color: gray">Listado de Beneficiarios Activos.</strong></a> En este apartado se pueden comprobar los beneficiarios que mantiene activos el sistema, 
                            pudiendo realizar cualquier modificación sobre ellos.
                        </p>
                        <img src="{{asset('../resources/assets/images/listado-beneficiarios.png')}}" alt="listado-beneficiarios" style="width: 25rem"/>
                        <p>
                            <ul>En el cuerpo del listado, además de ver sus datos generales, podemos acceder a:
                                <li style="list-style-type: decimal"><strong>Buscar un beneficiario activo:</strong>
                                    Haciendo clic sobre el gran botón azul, accedemos a un campo de búsqueda, que nos ayudará a filtrar en el listado,
                                    mostrando los datos coincidentes o el error en su caso.
                                </li>
                                <img src="{{asset('../resources/assets/images/busqueda-beneficiario.png')}}" alt="busqueda-beneficiario" style="width: 20rem"/>
                                <li style="list-style-type: decimal"><strong>Actualizar datos de un beneficiario activo:</strong>
                                    Pulsando sobre este enlace, nos lleva a un formulario con los datos del beneficiario reseñado, pudiendo modificarlo e incluso eliminar si así se estima.
                                </li>
                                <img src="{{asset('../resources/assets/images/update-beneficiario.png')}}" alt="update-beneficiario" style="width: 20rem"/>
                                <li style="list-style-type: decimal"><strong>Eliminar un beneficiario activo:</strong>
                                    Para evitar un borrado accidental, el sistema nos pedirá confirmación.. 
                                </li>
                                <img src="{{asset('../resources/assets/images/alert.png')}}" alt="alert-user" style="width: 20rem"/>
                            </ul>   
                        </p>
                        <p>
                            <strong style="color: gray">Cerrar sesión.</strong> Cierra la sesión activa del usuario y nos devuelve a la vista home.
                        </p>
                    </div> 
                    <div class="helpguide">
                        <div class="card-header" style="color: #386fa6;font-weight: bold !important">
                            MENÚ LATERAL DE OPCIONES
                        </div>
                       <br/>
                        <p>
                            En la parte izquierda se encuentra un menú (plegado en la opción tablet-móvil) con las principales opciones de interacción con los beneficiarios. 
                        </p>
                        <img src="{{asset('../resources/assets/images/sidebar.png')}}" alt="sidebar" style="width: 12rem"/>
                        <img src="{{asset('../resources/assets/images/sidebar-responsive.png')}}" alt="sidebar-responsive" style="width: 2rem"/>
                        <p>Haciendo clic sobre Productos o Beneficiarios, podremos encontrar diversos submenús de interacción. </p>
                        <img src="{{asset('../resources/assets/images/sidebar-desplegado.png')}}" alt="sidebar-desplegado" style="height: 25rem"/>
                        <p>
                            <ul>Describimos sus opciones a continuacion:
                                <p>
                                    <a href="{{route('home')}}" style="text-decoration: none"><strong style="color: gray">Inicio.</strong></a> En esta sección, nos devuelve a la vista de inicio, para una búsqueda ágil de web y enlaces.
                                </p>
                                <p>
                                    <strong style="color: gray">Productos.</strong> Permite navegar entre las distintas vistas de utilización de productos.
                                </p>
                                <li style="list-style-type: decimal">
                                    <a href="{{route('product.listadoProducto')}}" style="text-decoration: none"><strong>Listado de Productos:</strong></a>
                                     En este apartado se pueden comprobar los productos que mantiene activos el sistema, 
                                     pudiendo realizar cualquier modificación (como administrador) sobre ellos.
                                </li>
                                <img src="{{asset('../resources/assets/images/listado-productos.png')}}" alt="listado-productos" style="width: 25rem"/>
                                <li style="list-style-type: decimal">
                                    <a href="{{route('product.productSearchPrest')}}" style="text-decoration: none"><strong>Préstamo de Productos:</strong></a>
                                    Esta vista nos permite realizar una búsqueda a través de una pequeña descripción.
                                </li>
                                <img src="{{asset('../resources/assets/images/busqueda-producto.png')}}" alt="busqueda-producto" style="width: 20rem"/>
                                <p>La búsqueda, si es exitosa, muestra las coincidencias.</p>
                                <img src="{{asset('../resources/assets/images/listado-prestamo.png')}}" alt="listado-prestamo" style="width: 25rem"/>
                                <p>Haciendo clic sobre el botón Préstamo, se procede a vincular el producto con el beneficiario, a través de su dni.</p>
                                <img src="{{asset('../resources/assets/images/busqueda-prestamo.png')}}" alt="busqueda-prestamo" style="width: 20rem"/>
                                <p>Si el beneficiario ya disfruta de un préstamo, el sistema avisa, devolviendo a la vista de listado.</p>
                                <img src="{{asset('../resources/assets/images/alerta-prestamo.png')}}" alt="alerta-prestamo" style="width: 35rem"/>
                                <p>En caso de poder adjudicarse, nos muestra el aviso con el nombre y documento del beneficiario, para poder asegurar la inserción, 
                                    y nos devuelve la vista con los Beneficiarios con préstamos activos.
                                </p>
                                <img src="{{asset('../resources/assets/images/prestamo-ok.png')}}" alt="prestamo-ok" style="width: 35rem"/>
                                <li style="list-style-type: decimal">
                                    <a href="{{route('product.productSearch')}}" style="text-decoration: none"><strong>Actualizar Productos:</strong></a>
                                    Pulsando un administrador sobre este enlace, nos permite hacer una sencilla búsqueda en caso necesario, y desde ahí, 
                                    lleva a un formulario con los datos del producto reseñado, pudiendo modificarlo e incluso eliminar si así se estima. 
                                </li>
                                <img src="{{asset('../resources/assets/images/update-productos.png')}}" alt="update-productos" style="width: 20rem"/>
                            </ul>   
                        </p>
                        
                        <p>
                            <ul><p>
                                    <strong style="color: gray">Beneficiarios.</strong> Estos submenús trabajan con los datos de los beneficiarios pudiendo acceder a:
                                </p>
                                <li style="list-style-type: decimal">
                                    <a href="{{route('beneficiary.listadoBeneficiario')}}" style="text-decoration: none"><strong>Beneficiarios activos:</strong></a>
                                   En este apartado se pueden comprobar los usuarios que mantiene activos el sistema, pudiendo realizar cualquier modificación sobre ellos.
                                </li>
                                <img src="{{asset('../resources/assets/images/listado-beneficiarios.png')}}" alt="listado-beneficiarios" style="width: 25rem"/>
                                
                                <li style="list-style-type: decimal">
                                    <a href="{{route('beneficiary.search')}}" style="text-decoration: none"><strong>Actualizar Beneficiario:</strong></a>
                                    Pulsando sobre este enlace, nos lleva a un formulario con los datos del beneficiario reseñado, pudiendo modificarlo e incluso eliminar si así se estima.
                                </li>
                                <img src="{{asset('../resources/assets/images/update-beneficiario.png')}}" alt="update-beneficiario" style="width: 20rem"/>
                                <li style="list-style-type: decimal"><strong style="color: #3490dc">Eliminar un beneficiario activo:</strong>
                                    Haciendo clic sobre él, accedemos a un campo de búsqueda, que nos ayudará a filtrar en el listado, mostrando los datos coincidentes o el error en su caso. 
                                </li>
                                <img src="{{asset('../resources/assets/images/busqueda-beneficiario.png')}}" alt="busqueda-beneficiario" style="width: 20rem"/>
                                <p>En caso de coincidencia, nos lleva a un formulario con los datos del beneficiario reseñado, pudiendo modificarlo e incluso eliminar si así se estima.</p>
                                <img src="{{asset('../resources/assets/images/update-beneficiario.png')}}" alt="update-beneficiario" style="width: 20rem"/>
                                <p>Para evitar un borrado accidental, el sistema nos pedirá confirmación.</p>
                                <img src="{{asset('../resources/assets/images/alert.png')}}" alt="alert-user" style="width: 20rem"/>
                            </ul>   
                        </p>
                        <p>
                            <a href="{{route('beneficiary.alert')}}" style="text-decoration: none"><strong style="color: gray">Alertas.</strong></a> Contiene un listado general los préstamos activos, en vistas de 10 registros por página.
                        </p>
                        <p>También nos permite, a través del campo ID Producto, reconocer el producto en sí.</p>
                        <img src="{{asset('../resources/assets/images/detalle-ok.png')}}" alt="detalle-ok" style="width: 30rem"/>
                        <br>
                        <img src="{{asset('../resources/assets/images/listado-alerta.png')}}" alt="listado-alerta" style="width: 25rem"/>
                        <p>Si alguno está en periodo de devolución, se emite una alerta en rojo, nos da la opción de anular el préstamo al beneficiario y anotar la devolución en el sistema.</p>
                        <p>Para evitar un borrado accidental, el sistema nos pedirá confirmación.</p>
                        <img src="{{asset('../resources/assets/images/alert.png')}}" alt="alert-user" style="width: 20rem"/>
                        <p>En el sidebar, también apreciaremos la alerta en periodo de devolución.</p>
                        <img src="{{asset('../resources/assets/images/alerta1.png')}}" alt="alerta1" style="width: 10rem"/>
                    </div> 
                        <br>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection