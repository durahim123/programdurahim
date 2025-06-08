<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>

<!-- Stylesheets -->
<link href="{{ asset('medicoz') }}/css/bootstrap.css" rel="stylesheet">
<link href="{{ asset('medicoz') }}/css/style.css" rel="stylesheet">
<link href="{{ asset('medicoz') }}/css/responsive.css" rel="stylesheet">

<!--Color Themes-->
<link id="theme-color-file" href="{{ asset('medicoz') }}/css/color-themes/default-theme.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('medicoz') }}/css/color-themes/telemagenta.css">

<!--Color Switcher Mockup-->
<link href="{{ asset('medicoz') }}/css/color-switcher-design.css" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('assets/images/logo-1.jpg') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('assets/images/logo-1.jpg') }}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<style>
</style>
</head>

<body>

<div class="page-wrapper">

    
    <!-- Main Header-->
    <header class="main-header header-style-one" >
        <!-- Header Lower -->
        @include('frontend.layouts.partials.header')

    </header>
    <!--End Main Header -->

    @yield('content')

    <!-- Main Footer -->
    <footer class="main-footer">
        <!--Widgets Section-->
        <div class="widgets-section" style="background-image: url({{ asset('medicoz') }}/images/background/7.jpg);">
            <div class="auto-container">
                <div class="row">
                    <!--Big Column-->
                    <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <!--Footer Column-->
                            <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget about-widget">
                                    <div class="logo">
                                        <a href="{{ URL::to('/') }}" style="color:white;">
                                            <img src="{{ asset('assets/images/logo-1.jpg') }}" alt="" />
                                            <span class="widget-title">Klinik Pratama Dr.Jo</span>
                                        </a>
                                    </div>
                                    <div class="text">
                                        <p>Kami Klinik Pratama dr Jo dan Apotek dr Jo, merupakan usaha bisnis PT multi daya estetika yang sudah berdiri sejak 2013. Didirikan oleh dr Johana Fitriani,M. Farm yang mempunyai visi Menciptakan Masyarakat Indonesia yang Cantik dan Sehat, Perusahaan Maju dan Karyawan Sejahtera</p>
                                    </div>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget">
                                    <h2 class="widget-title">Product</h2>
                                    <ul class="user-links">
                                        <li><a href="#">Akupuntur</a></li>
                                        <li><a href="#">Apotek</a></li>
                                        <li><a href="#">Poli Estetika</a></li>
                                        <li><a href="#">Poli Gigi</a></li>
                                        <li><a href="#">Poli Perawatan</a></li>
                                        <li><a href="#">Poli Umum</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Big Column-->
                    <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <!--Footer Column-->
                                <div class="footer-widget recent-posts">
                                    <h2 class="widget-title">Treatment</h2>
                                     <!--Footer Column-->
                                     <ul class="user-links">
                                        <li><a href="#">Estetika</a></li>
                                        <li><a href="#">Perawatan</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <!--Footer Column-->
                                <div class="footer-widget contact-widget">
                                    <h2 class="widget-title">Contact Information</h2>
                                     <!--Footer Column-->
                                    <div class="widget-content">
                                        <ul class="contact-list">
                                            <li>
                                                <span class="icon flaticon-placeholder"></span>
                                                <div class="text">Perum Duta Bumi II Blok D No. 25
                                                Pejuang, Medan Satria, Bekasi</div>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-call-1"></span>
                                                <a href="tel:+62811-9890-361"><strong>0811-9890-361 / 0895-6228-13931</strong></a>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-email"></span>
                                                <div class="text">
                                                <a href="mailto:klinikdrjo123@mail.com"><strong>klinikdrjo123@mail.com</strong></a></div>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-back-in-time"></span>
                                                <div class="text">Mon - Sat 8.00 - 22.00<br>
                                                <strong>Sunday CLOSED</strong></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <!-- Scroll To Top -->
            <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
            
            <div class="auto-container">
                <div class="inner-container clearfix" style="justify-self:center;">
                    
                    <div class="copyright-text">
                        <p>Copyright © 2024 <a href="#">Klinik dr. Jo </a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Main Footer -->

</div><!-- End Page Wrapper -->
<style>
    #chat-box {
        width: 300px;
        height: 400px;
        position: fixed;
        bottom: 50px;
        right: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        display: none; /* Awalnya disembunyikan */
        flex-direction: column;
        z-index: 1000;
    }

    #chat-header {
        background: #e5207b;
        color: white;
        padding: 10px;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
    }

    #chat-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 10px;
        overflow-y: auto;
    }

    #messages {
        max-height: 150px; /* Batas tinggi maksimal */
        overflow-y: auto; /* Scroll jika konten melebihi batas */
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 4px;
    }

    #categories button, #messages button {
        margin: 5px 0;
        padding: 10px;
        width: 100%;
        border: none;
        border-radius: 5px;
        background: #f0f0f0;
        cursor: pointer;
        text-align: left;
    }

    #chat-input {
        width: calc(100% - 20px);
        margin: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .chat-toggle {
        position: fixed;
        bottom: 20px;
        right: 80px;
        background: #e5207b;
        color: white;
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 24px;
        cursor: pointer;
        z-index: 1000;
    }

    .chat-toggle:hover {
        background: #e5207b;
    }
    .btn-primary {
        background: #e5207b;
        border-color: #e5207b;
    }

</style>
<div id="chat-box">
    <div id="chat-header" onclick="toggleChat()">Admin</div>
    <div id="chat-content">
        <p>Pilih kategori:</p>
        <div id="categories"></div>
        <div id="messages"></div>
        <textarea id="chat-input" placeholder="Tulis pesan..."></textarea>
        <button onclick="sendMessage()" class="btn btn-primary">Kirim</button>
    </div>
</div>

@if (!empty(session('auth_user')))
<button class="chat-toggle" onclick="toggleChat()">💬</button>
@endif


<script>
    let selectedCategory = null;
    let isFirstResponse = true; // Melacak apakah ini balasan pertama
    let hasAdminMessage = false; // Melacak apakah admin sudah diingatkan

    function toggleChat() {
        const chatBox = document.getElementById('chat-box');
        chatBox.style.display = chatBox.style.display === 'none' ? 'block' : 'none';
    }

    function loadCategories() {
        fetch('{{ URL::to("chat/categories") }}')
            .then(response => response.json())
            .then(data => {
                const categoriesDiv = document.getElementById('categories');
                categoriesDiv.innerHTML = '';
                data.forEach(category => {
                    const button = document.createElement('button');
                    button.innerText = category.name;
                    button.onclick = () => {
                        selectedCategory = category.id;
                        document.getElementById('messages').innerHTML += `<p><b>Bot:</b> Anda memilih kategori ${category.name}.</p>`;
                        categoriesDiv.style.display = 'none';
                    };
                    categoriesDiv.appendChild(button);
                });
            });
    }

    function sendMessage() {
        const message = document.getElementById('chat-input').value;
        if (!message) return;

        fetch('{{ URL::to("send-chat") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                category_id: selectedCategory,
                message: message,
            }),
        })
            .then(response => response.json())
            .then(data => {
                const messagesDiv = document.getElementById('messages');

                // Tambahkan pesan pengguna
                messagesDiv.innerHTML += `<p><b>Anda:</b> ${message}</p>`;

                // Tambahkan balasan bot
                if (isFirstResponse) {
                    messagesDiv.innerHTML += `<p><b>Bot:</b> Apa yang bisa kami bantu?</p>`;
                    isFirstResponse = false; // Ubah status setelah balasan pertama
                } else if (!hasAdminMessage) {
                    messagesDiv.innerHTML += `<p><b>Bot:</b> Mohon tunggu sebentar, admin akan membalas chat Anda.</p>`;
                    hasAdminMessage = true; // Tandai bahwa admin sudah diingatkan
                }

                // Kosongkan input
                document.getElementById('chat-input').value = '';

                // Scroll otomatis ke bawah
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            });
    }

    document.addEventListener('DOMContentLoaded', loadCategories);

</script>
<script src="{{ asset('medicoz') }}/js/jquery.js"></script> 
<script src="{{ asset('medicoz') }}/js/popper.min.js"></script>
<script src="{{ asset('medicoz') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('medicoz') }}/js/jquery.fancybox.js"></script>
<script src="{{ asset('medicoz') }}/js/mmenu.polyfills.js"></script>
<script src="{{ asset('medicoz') }}/js/jquery.modal.min.js"></script>
<script src="{{ asset('medicoz') }}/js/mmenu.js"></script>
<script src="{{ asset('medicoz') }}/js/appear.js"></script>
<script src="{{ asset('medicoz') }}/js/owl.js"></script>
<script src="{{ asset('medicoz') }}/js/wow.js"></script>
<script src="{{ asset('medicoz') }}/js/script.js"></script>
<!-- Color Setting -->
<script src="{{ asset('medicoz') }}/js/color-settings.js"></script>
</body>
</html>


