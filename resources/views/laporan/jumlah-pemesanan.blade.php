@extends('layouts.dashboard')
@section('title', 'Laporan Jumlah Pemesanan')
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
        <h2 class="text-lg font-semibold text-fg">Jumlah Pemesanan</h2>
        <p class="text-fg text-sm">Menampilkan jumlah pemesanan per-bulan pada sistem LaundryNotes</p>
    </div>
    <a href="#" id="btnCetak" class="bg-skyBlueDark text-white p-2 rounded-md flex items-center gap-2">
        <iconify-icon icon="material-symbols:print-outline" width="24" height="24"></iconify-icon>
        <span>Cetak Laporan</span>
    </a>
</div>

<div class="mt-4">
    <table id="pesananTable" class="w-full text-sm">
        <thead>
            <tr class="text-fg font-semibold">
                <th>No</th>
                <th>Tahun</th>
                <th>Jumlah Pesanan</th>
            </tr>
        </thead>
        <tbody class="[&>tr:nth-child(even)]:bg-skyBlue">
            @foreach($pemesanan as $index => $item)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{$item->jumlah_pesanan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Pilih Tahun -->
<div id="modalTahun" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-80">
        <h3 class="text-lg font-semibold mb-4">Pilih Tahun</h3>
        <form id="formTahun" action="{{ route('laporan.cetak-pemesanan') }}" method="GET">
            <select name="tahun" class="border rounded-md px-3 py-2 w-full mb-4" required>
                @php
                    $tahunSekarang = now()->year;
                    $tahunAwal = $pemesanan->min(function($item) {
                        return $item->tahun;
                    }) ?? $tahunSekarang;
                @endphp
                @for($tahun = $tahunSekarang; $tahun >= $tahunAwal; $tahun--)
                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                @endfor
            </select>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="toggleModal(false)" class="px-3 py-1 rounded bg-gray-200">Batal</button>
                <button type="submit" class="px-3 py-1 rounded bg-skyBlueDark text-white">Cetak</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(show = true) {
        document.getElementById('modalTahun').classList.toggle('hidden', !show);
    }
    document.getElementById('btnCetak').addEventListener('click', function(e) {
        e.preventDefault();
        toggleModal(true);
    });
</script>
@endsection