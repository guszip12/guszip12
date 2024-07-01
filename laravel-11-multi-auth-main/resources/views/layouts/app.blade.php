<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </div>

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sembunyikan menu saat halaman dimuat
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.add('hidden');

            // Tambahkan event listener untuk menutup menu saat klik di luar menu
            document.addEventListener('click', function(event) {
                const isClickInsideMenu = navMenu.contains(event.target);
                const isToggleBtn = event.target.classList.contains('toggle-navigation-btn');

                if (!isClickInsideMenu && !isToggleBtn) {
                    navMenu.classList.add('hidden');
                }
            });
        });

        function showSection(sectionId) {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            const activeSection = document.getElementById(sectionId);
            if (activeSection) {
                activeSection.classList.add('active');
            }

            const links = document.querySelectorAll('.nav-link');
            links.forEach(link => {
                link.classList.remove('active');
            });

            const activeLink = document.querySelector(`.nav-link[onclick*='${sectionId}']`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }
    </script>
</body>

<style>
    /* Your existing CSS */
    .nav-link.active {
        font-weight: bold;
        color: #333;
        background-color: #f8f9fa;
        border-left: 3px solid #007bff;
        padding-left: 10px;
    }
    .main-content {
        padding: 20px;
    }
    .nav-link {
        position: relative;
        padding: 10px 20px;
        display: block;
        color: rgba(0, 0, 0, 0.75);
        transition: color 0.3s;
    }
    .nav-link:hover {
        color: #54e9dc;
        text-decoration: none;
    }
    .nav-link::before {
        content: "";
        position: absolute;
        width: 3px;
        height: 100%;
        background-color: transparent;
        left: 0;
        top: 0;
        transition: background-color 0.3s;
    }
    .nav-link:hover::before {
        background-color: #007bff;
    }
    .active .nav-link {
        color: #fff;
        font-weight: bold;
    }
    .active .nav-link::before {
        background-color: #007bff;
    }
    .content-section {
        display: none;
    }
    .content-section.active {
        display: block;
    }

    /* public/css/custom.css */
    .content-section {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    }

    .custom-img {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%; /* Ensures the image takes up the full width */
        height: auto; /* Maintains aspect ratio */
        object-fit: cover;
    }

    .form-label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        width: 100%; /* Full width for form controls */
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        width: 100%; /* Full width button */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .form-container {
        display: grid;
        grid-template-columns: repeat(10, 1fr); /* 10 columns */
        grid-template-rows: repeat(8, auto); /* 8 rows */
        gap: 20px;
    }

    .image-container {
        grid-column: 1 / span 4; /* Image takes up 4 columns */
        grid-row: 1 / span 8; /* Image takes up all rows */
    }

    .form-wrapper {
        grid-column: 5 / span 6; /* Form takes up remaining 6 columns */
        grid-row: 1 / span 8; /* Form takes up all rows */
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    /* Optional styles to make it responsive */
    @media (max-width: 768px) {
        .form-container {
            grid-template-columns: 1fr; /* Single column layout on smaller screens */
            grid-template-rows: auto; /* Adjust rows to fit content */
        }

        .image-container, .form-wrapper {
            grid-column: 1 / span 1; /* Each takes up full width */
            grid-row: auto; /* Adjust rows to fit content */
        }
    }

        /* kegiatan */
    .activities-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
        justify-content: flex-start; /* Align items to the left */
    }

    .activity-item {
        flex: 1 1 calc(33.333% - 20px); /* Adjust the width of each item */
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s;
        max-width: calc(33.333% - 20px); /* Adjust max width */
    }

    .activity-item:hover {
        transform: translateY(-15px);
    }

    .activity-content {
        padding: 20px;
    }

    .activity-content p {
        margin: 0 0 10px;
    }

    .activity-content a {
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid blue; /* Blue border */
        color: blue; /* Blue text */
        text-decoration: none; /* Remove underline */
        transition: background-color 0.3s, color 0.3s;
        border-radius: 4px; /* Rounded corners */
    }

    .activity-content a:hover {
        background-color: blue; /* Blue background on hover */
        color: white; /* White text on hover */
    }

    .activity-content button {
        margin-top: 10px;
        width: 100%;
        padding: 10px;
        border: 2px solid rgb(179, 42, 42); /* Red border */
        background-color: white; /* White background */
        color: rgb(179, 42, 42);; /* Red text */
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
    }

    .activity-content button:hover {
        background-color: rgb(179, 42, 42);; /* Red background on hover */
        color: white; /* White text on hover */
    }
    
    /* jadual presentasi */
    .content-section {
        margin-top: 30px;
    }
    .table-responsive {
        border-radius: 5px;
        overflow-x: auto;
        background-color: #fff;
        padding: 15px;
    }
    .table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse;
    }
    .table-bordered th, .table-bordered td {
        border: 2px solid #dee2e6;
    }
    .thead-dark th {
        background-color: #343a40;
        color: #fff;
    }
    #np1 {
        background-color: #f0f0f0; /* Ganti dengan warna yang diinginkan */
        padding: 10px; /* Padding untuk memberi ruang di sekitar teks */
        border-radius: 8px; /* Untuk memberi sudut melengkung pada background */
    }
    @media (max-width: 768px) {
        .table thead {
            display: none;
        }
        .table, .table tbody, .table tr, .table td {
            display: block;
            width: 100%;
        }
        .table tr {
            margin-bottom: 15px;
        }
        .table td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }
        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 45%;
            padding-left: 15px;
            font-weight: bold;
            text-align: left;
        }
    }

    #laporan {
        background-color: #f0f0f0; /* Ganti dengan warna yang diinginkan */
        padding: 10px; /* Padding untuk memberi ruang di sekitar teks */
        border-radius: 8px; /* Untuk memberi sudut melengkung pada background */
        max-width: 200px;
    }

    
</style>

</html>
