    
    <a href="#inicio" class="up-arrow">
    <button id="subir" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Subir">&#8679;</button></a>
    
    <footer>
        <a class="styl-logo-jrcomputersystem" href="#">
            <img src="{{ url('/cms/img/logo-JRComputerSystem.png') }}" alt="">
        </a>
        <strong>Copyright © 2021 JR Computer System - Programador Jesús Rojas</strong>
        <span>All rights reserved.</span>
        <b>MyProject</b> CMS Productos v1.0.0.
    </footer>

    @include('layouts.appModalProcessing')

</div> <!-- Fin app -->
</body>
    <!-- jQuery -->
    <script src="{{ asset('cms/plugins/jquery-v3.4.1/jquery.min.js') }}"></script>

    <!-- Bootstrap 5 -->
    <script src="{{ asset('cms/plugins/popper-v1.16.1/umd/popper.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/bootstrap-v5.0.0/js/bootstrap.bundle.min.js') }}"></script>

    <!-- SweetAlert - -->
    <script src="{{ asset('cms/plugins/sweetalert-v2/sweetalert.min.js?v='.time()) }}"></script>

    <!-- CKEditor -->
    <script src="{{ asset('cms/plugins/ckeditor-v4.15.1/ckeditor.js') }}"></script>

    <!-- LightBox - fancybox 3.5.7 -->
    <script src="{{ asset('cms/plugins/lightbox-v3.5.7/jquery.fancybox.min.js') }}"></script>

    <!-- Scripts Laravel App-->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Despachador -->
    <script src="{{ asset('cms/js/despachador.js?v='.time()) }}"></script>
    
    @stack('scripts')
    @stack('scriptsMessage')
    @stack('scriptsDestroyAll_Ordenar_Mostrar')
    
</html>
