@extends('layouts.dashboard')
@section('title', 'Laporan Kinerja Kasir')
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pesananTable').DataTable({
                language: {
                    searchPlaceholder: "Cari data...",
                    search: "",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_  dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    zeroRecords: "Tidak ada data yang cocok",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },
                },
                dom:
                    "<'flex justify-between items-center mb-4'f<'text-sm' l>>" +
                    "<'overflow-x-auto't>" +
                    "<'flex justify-between items-center mt-4'i<'text-sm' p>>"   
            });

            const searchInput = document.querySelector('#pesananTable_filter input');
            if (searchInput) {
                searchInput.classList.add(
                    'border', 'border-fg', 'rounded-md', 'px-3', 'py-1.5',
                    'text-sm', 'placeholder-fg', 'focus:outline-none',
                    'focus:ring-2', 'focus:ring-skyBlueDark', 'focus:border-transparent'
                );
            }
        });
    </script>
@endpush


@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Kinerja Kasir</h2>
        <p class="text-fg text-sm">Menampilkan kinerja kasir pada sistem LaundryNotes</p>
    </div>
    <a href="{{route('laporan.cetak-kinerja-kasir')}}" class="bg-skyBlueDark text-white p-2 rounded-md flex items-center gap-2">
        <iconify-icon icon="material-symbols:print-outline" width="24" height="24"></iconify-icon>
        <span>Cetak Laporan</span>
    </a>
</div>

<div class="mt-4">
    <table id="pesananTable" class="w-full text-sm">
        <thead>
            <tr class="text-fg font-semibold">
                <th>No</th>
                <th>Nama Kasir</th>
                <th>Jumlah Pesanan Ditangani</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody class="[&>tr:nth-child(even)]:bg-skyBlue">
            @foreach($kinerjaKasir as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_kasir }}</td>
                <td>{{ $item->jumlah_pesanan }}</td>
                <td>Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            {{-- <tr>
                <td>2</td>
                <td>Ucup</td>
                <td>120</td>
                <td>Rp 20.000.000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ucup</td>
                <td>120</td>
                <td>Rp 20.000.000</td>
            </tr> --}}
        </tbody>
    </table>
</div>
@endsection