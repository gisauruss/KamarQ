@extends('template.index')

{{-- judul --}}
@section('title', 'Aktifitas user perMinggu')

{{-- css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

{{-- body --}}
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <h2>Grafik Aktivitas User</h2>
            <canvas id="myChart"></canvas>
        </div>
    </section>
</div>
@endsection

{{-- javascript --}}
@section('script')
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    {{-- @if (Session::has('Sukses'))
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                $('.swalDefaultSuccess').click(function() {
                    Toast.fire({
                        icon: 'success',
                        title: '{{ Session::get('Sukses')}}'
                    })

                });
            })
        </script>
    @endif --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels); // Label minggu
        const likeCounts = @json($likeCounts); // Data likes
        const sewaCounts = @json($sewaCounts); // Data sewa kamar

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line', // Jenis chart diubah menjadi Line Chart
            data: {
                labels: labels, // Minggu
                datasets: [
                    {
                        label: 'Likes',
                        data: likeCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna area bawah garis
                        borderColor: 'rgba(54, 162, 235, 1)', // Warna garis
                        fill: false, // Tidak mengisi area di bawah garis
                        tension: 0.4, // Membuat garis lebih halus
                        borderWidth: 2 // Ketebalan garis
                    },
                    {
                        label: 'Pemesanan',
                        data: sewaCounts,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)', // Warna area bawah garis
                        borderColor: 'rgba(255, 99, 132, 1)', // Warna garis
                        fill: false, // Tidak mengisi area di bawah garis
                        tension: 0.4, // Membuat garis lebih halus
                        borderWidth: 2 // Ketebalan garis
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Aktivitas Likes dan Pemesanan per Minggu'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Minggu'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

