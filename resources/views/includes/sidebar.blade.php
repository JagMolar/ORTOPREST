<nav class="col-md-2  d-sm-block ">
    <!--<nav class="col-md-3 d-none d-md-block bg-light sidebar">-->
   
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <aside id="sidebar">
                <ul id="sidemenu" class="sidebar-nav">
                    <li>
                        <a href="{{route('home')}}">
                            <span class="sidebar-icon">
                                <i class="fa fa-dashboard"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: grey;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            </span>
                            <span class="sidebar-title">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
                            <span class="sidebar-icon">
                                <i class="fa fa-users"></i>
                                <svg xmlns="http://www.w3.org/2000/svg"  style="color: grey;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            </span>
                            <span class="sidebar-title">Productos</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="{{route('product.listadoProducto')}}"><i class="fa fa-caret-right"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg"  style="color: cornflowerblue;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    Listado de Productos</a></li>
                            <li><a href="{{route('product.productSearchPrest')}}"><i class="fa fa-caret-right"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg"  style="color: green;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    Préstamo de Productos</a></li>
                            <li><a href="{{route('product.productSearch')}}"><i class="fa fa-caret-right"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg"  style="color: #ffe924;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    Actualizar Productos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-3">
                            <span class="sidebar-icon">
                                <i class="fa fa-newspaper-o"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: grey;"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </span>
                            <span class="sidebar-title">Beneficiarios</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-3" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="{{route('beneficiary.listadoBeneficiario')}}"><i class="fa fa-caret-right"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color: green;"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    Beneficiarios Activos</a></li>
                            <li><a href="{{route('beneficiary.search')}}"><i class="fa fa-caret-right"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color: cornflowerblue;"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    Actualizar Beneficiario</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('beneficiary.alert')}}">
                            <span class="sidebar-icon">
                                <i class="fa fa-database"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: grey;" width="24" height="24" viewBox="" fill="none" stroke-width="2"  stroke="currentColor" class=""><path d="M18 16v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-5 2v2zm 10c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2z"></svg>
                            </span>
                            <span class="sidebar-title">Alertas</span>
                            <!--Alertas <span class="badge">{{$alertEndCount}}</span>-->
                            @if($alertEndCount <= 0)
                            <span class="badge" >{{$alertEndCount}}</span>
                            @else
                            <span class="counter" style="">{{$alertEndCount}}</span>
                            @endif
                        </a>
                    </li>
                    <!--                    <li>
                                            <a href="#">
                                                <span class="sidebar-icon"><i class="fa fa-terminal"></i></span>
                                                <span class="sidebar-title">Alertas</span>
                                            </a>
                                        </li>-->
                </ul>
            </aside>            
        </div>
    </div>    
</nav>

