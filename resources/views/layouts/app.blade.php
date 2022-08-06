<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ config('app.name') ?? 'Accueil - KIAKOO' }}</title>
    <!-- Bootstrap -->
    <link rel="shortcut icon" href="{{ asset('kiakoo/images/favicon/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('kiakoo/css/bootstrap.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('kiakoo/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('kiakoo/css/jquery.bxslider.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('kiakoo/css/bootstrap-slider.min.css') }}">
    <link rel='stylesheet' href='{{ asset('kiakoo/css/jquery-ui.css') }}'>
    <link href="{{ asset('kiakoo/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('kiakoo/css/responsive.css') }}" rel="stylesheet" />

    @livewireStyles

</head>

<body>

    <x-mobile.menu />

    <x-top-bar />

    <x-header />

    {{ $slot }}

    <x-newsletter />

    <x-footer />

    <x-copyright />

    <x-modals.login />
    <x-modals.register />
    <x-modals.password.forgot />

    <x-modals.cart.notify />

    {{-- //TODO: set this condition on button edit address page --}}
    @if (Auth::user())

        @if (is_null(Auth::user()->customer->addresses->last()))
            <x-modals.address.create />
        @else
            <x-modals.address.edit :userId="Auth::id()" />
        @endif

    @endif

    @if (Auth::user())
        <livewire:avatar.edit />
    @endif

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('kiakoo/js/jquery.min-kiakoo.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('kiakoo/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('kiakoo/js/jquery.bxslider.js') }}"></script>
    {{-- <script src="{{ asset('kiakoo/js/incrementing.js') }}"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.bxslider').bxSlider({
                auto: 'true',
                minSlides: 1,
                maxSlides: 4,
                slideWidth: 273,
                slideMargin: 25,
                moveSlides: 2
            });

            $('.bxslider-deco').bxSlider({
                auto: 'true',
                controls: false,
                minSlides: 1,
                maxSlides: 3,
                slideWidth: 273,
                slideMargin: 25,
                moveSlides: 2
            });

            // home slider
            $('.bxslider-home').bxSlider({});

            $('.bxslider-2').bxSlider({
                auto: ''
            });

            $('.bxslider-mobile').bxSlider({
                auto: '',
                pager: false
            });

            // bx slider product home
            $('.bxslider-product-home').bxSlider({
                auto: '',
                pager: false,
                minSlides: 1,
                maxSlides: 5,
                slideWidth: 213,
                slideMargin: 25,
                moveSlides: 1,
                infiniteLoop: false
            });

            // product details:
            $('.bxslider-product').bxSlider({
                controls: false,
                pagerCustom: '#bx-pager, #bx-pager1',
            });

            $("#menu-btn").click(function() {
                $("#menu-div").toggleClass("active");
                $(".menu-div-black").toggleClass("active");
            });

            $(".menu-div-black").click(function() {
                $("#menu-div").toggleClass("active");
                $(this).toggleClass("active");
            });

            $(".dropi-btn").click(function() {
                $(".dropi-btn").removeClass("active");
                $(this).addClass("active");
            });

            $('.paiement-1').change(function() {
                if ($(this).is(":checked")) {
                    $('#paiement-1').addClass('active');
                    $('#paiement-2').removeClass('active');
                } else {
                    $('#paiement-1').removeClass('active');
                }
            });

            $('.paiement-2').change(function() {
                if ($(this).is(":checked")) {
                    $('#paiement-2').addClass('active');
                    $('#paiement-1').removeClass('active');
                } else {
                    $('#paiement-2').removeClass('active');
                }
            });

            // show product dropdown
            $("#btn-1").click(function() {
                $("#div-acor-1").addClass("active");
                $("#div-acor-2").removeClass("active");
                $("#div-acor-3").removeClass("active");
            });

            $("#btn-2").click(function() {
                $("#div-acor-1").removeClass("active");
                $("#div-acor-2").addClass("active");
                $("#div-acor-3").removeClass("active");
            });

            $("#btn-3").click(function() {
                $("#div-acor-1").removeClass("active");
                $("#div-acor-2").removeClass("active");
                $("#div-acor-3").addClass("active");
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            // inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
            $('#tableOne.table-responsive-stack, #tableTwo.table-responsive-stack, #tableThree.table-responsive-stack',)
                .each(function(i) {
                    var id = $(this).attr('id');
                    //alert(id);
                    $(this).find("th").each(function(i) {
                        $('#' + id + ' td:nth-child(' + (i + 1) + ')').prepend(
                            '<span class="table-responsive-stack-thead">' + $(this).text() +
                            ':</span> ');
                        $('#tableOne .table-responsive-stack-thead, #tableTwo .table-responsive-stack-thead, #tableThree.table-responsive-stack-thead')
                            .hide();

                    });

                });

            $('#tableOne.table-responsive-stack, #tableTwo.table-responsive-stack, #tableThree.table-responsive-stack')
                .each(function() {
                    var thCount = $(this).find("th").length;
                    var rowGrow = 100 / thCount + '%';
                    //console.log(rowGrow);
                    $(this).find("th, td").css('flex-basis', rowGrow);
                });

            function flexTable() {
                if ($(window).width() < 768) {
                    $("#tableOne.table-responsive-stack, #tableTwo.table-responsive-stack, #tableThree.table-responsive-stack")
                        .each(function(i) {
                            $(this).find(".table-responsive-stack-thead").show();
                            $(this).find('thead').hide();
                        });

                    // window is less than 768px
                } else {

                    $("#tableOne.table-responsive-stack, #tableTwo.table-responsive-stack, #tableThree.table-responsive-stack")
                        .each(function(i) {
                            $(this).find(".table-responsive-stack-thead").hide();
                            $(this).find('thead').show();
                        });
                }
                // flextable
            }

            flexTable();

            window.onresize = function(event) {
                flexTable();
            };

            // document ready
        });
    </script>

    <script src='{{ asset('kiakoo/js/jquery-ui.min.js') }}'></script>
    <script id="rendered-js">
        //-----JS for Price Range slider-----
        $(function() {
            $("#slider-range, #slider-range-2").slider({
                range: true,
                min: 130,
                max: 500,
                values: [130, 250],
                slide: function(event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });

            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        });
        //# sourceURL=pen.js
    </script>

    <script type="text/javascript">
        /*register*/
        $('.register').click(function(e) {
            $('#loginModal').modal('hide');
            $('body').css('overflow', 'hidden');

            $('#registerModal').modal('show');
            $('.modal').css('overflow', 'auto');
        });

        /*forgot*/
        $('.forgot').click(function(e) {

            $('#loginModal').modal('hide');
            $('#registerModal').modal('hide');

            $('body').css('overflow', 'hidden');
            $('#forgotModal').modal('show');
            $('.modal').css('overflow', 'auto');

        });
        $('.forgot-back').click(function(e) {
            $('#forgotModal').modal('hide');

            $('body').css('overflow', 'hidden');
            $('#loginModal').modal('show');
            $('.modal').css('overflow', 'auto');
        });

        /*login*/
        $('.login').click(function(e) {
            $('#registerModal').modal('hide');
            $('#forgotModal').modal('hide');

            $('body').css('overflow', 'hidden');
            $('#loginModal').modal('show');
            $('.modal').css('overflow', 'auto');
        });

        /*edit address*/
        $('.edit-address').click(function(e) {
            $('body').css('overflow', 'hidden');
            $('#editAddressModal').modal('show');
            $('.modal').css('overflow', 'auto');
        });

        $('.add-address').click(function(e) {
            $('body').css('overflow', 'hidden');
            $('#addAddressModal').modal('show');
            // $('.modal').css('overflow', 'auto');
        });

        /* Close modals with owerflow on body*/
        $('.close').click(function(e) {
            e.preventDefault();
            $('*').modal('hide');
            $('body').css('overflow', 'auto');
        });

        /* click outside modal */
        $(document).click(function(event) {
            //if you click on anything except the modal itself or the "open modal" link, close the modal
            if (!$(event.target).closest(".modal").length) {
                $("body").find(".modal").removeClass("visible");
                $('body').css('overflow', 'auto');
            }
        });

        /* edit avatar: edit-avatar */
        $('.edit-avatar').click(function(e) {
            $('body').css('overflow', 'hidden');
            $('#edit-avatar').modal('show');
            $('.modal').css('overflow', 'auto');
        });
    </script>

    <script>
        $(function() {
            //register
            $("#register_form").on("submit", function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $(document).find("span.error-text").text("");
                        $(document).find("span.registred").text("");
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $("#register_form span." + prefix + "_error").text(val[
                                    0]);
                            });
                        } else if (data.status == 1 || data.status == 3) {
                            $("#register_form span.email_error").text(data.error);
                        } else if (data.status == 2) {
                            $("#register_form")[0].reset();
                            $("#register_form span.registred").text(data.success);
                        }
                    },
                });
            });

            //login
            $("#login_form").on("submit", function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $(document).find("span.error-text").text("");
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $("#login_form span." + prefix + "_error").text(val[0]);
                            });
                        } else if (data.status == 1 || data.status == 2) {
                            $("#login_form span.email_error").text(data.error);
                        } else if (data.status == 3) {
                            $("#login_form span.password_error").text(data.error);
                        } else if (data.status == 4) {
                            $("#login_form")[0].reset();
                            $('#loginModal').modal('hide');
                            $(location).prop('href', data.success)
                        }
                    },
                });
            });

            //logout
            $(".logout-button-custom").click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: "{{ route('logout') }}",
                    type: "POST",
                    success: function(data) {
                        if (data.status == 0) {
                            $(location).prop("href", data.success);
                        } else {
                            console.log("logout error");
                        }
                    },
                });
            });

            //forgot
            $("#forgot_password").click(function(e) {
                e.preventDefault();
            });

            // password email
            $("#password_email").on("submit", function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $(document).find("span.error-text").text("");
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $("#password_email span." + prefix + "_error").text(val[
                                    0]);
                            });
                        } else if (data.status == 1 || data.status == 2) {
                            $("#password_email span.email_error").text(data.error);
                        } else if (data.status == 3) {
                            $("#password_email")[0].reset();
                            $(document).find("span.error-text").text("");
                            $("#password_email span.password-sent").text(data.success);
                        }
                    },
                });
            });

            // edit address
            $("#edit_address_form").on("submit", function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $(document).find("span.error-text").text("");
                        $(document).find("span.registred").text("");
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $("#edit_address_form span." + prefix + "_error").text(
                                    val[0]);
                            });
                        } else if (data.status == 1) {
                            $("#login_form")[0].reset();
                            $('#loginModal').modal('hide');
                            $(location).prop('href', data.success)
                        } else if (data.status == 2) {
                            $("#register_form span.email_error").text(data.error);
                        }
                    },
                });
            });

            // create address
            $("#add_address_form").on("submit", function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $(document).find("span.error-text").text("");
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $("#add_address_form span." + prefix + "_error").text(
                                    val[0]);
                            });
                        } else if (data.status == 1) {
                            $("#add_address_form")[0].reset();
                            $('#add_address_form').modal('hide');
                            $(location).prop('href', data.success);
                        } else if (data.status == 2) {
                            $("#add_address_form span.server_error").text(data.error);
                        }
                    },
                });
            });

        });
    </script>

    <script>
        function previewImages() {

            $("#preview").empty();

            var preview = document.querySelector("#preview");

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {
                // Make sure `file.name` matches our extensions criteria
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                } // else...

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.width = 100;
                    image.title = file.name;
                    image.src = this.result;
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);
            }
        }
        document.querySelector("#file-input").addEventListener("change", previewImages);
    </script>

    <script src="{{ asset('kiakoo/js/grids.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.cols-equal-height').responsiveEqualHeightGrid();
        });
    </script>

    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

            $('#tgl').toggleClass('fa-eye-slash fa-eye');
        }
    </script>

    @livewireScripts

</body>

</html>
