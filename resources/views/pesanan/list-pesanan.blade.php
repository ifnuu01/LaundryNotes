@extends('layouts.dashboard')
@section('title', 'Daftar Pesanan')
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $.fn.dataTable.ext.errMode = 'none';
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
                    "<'flex justify-between items-center mt-4'i<'text-sm' p>>", 
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
        <h2 class="text-lg font-semibold text-fg">Daftar Pesanan Laundry</h2>
        <p class="text-fg text-sm">Menampilkan semua pesanan pada sistem LaundryNotes</p>
    </div>
    <x-button text="Tambah Pesanan" type="button" href="{{route('pesanan.create')}}" asLink="true" icon="ic:baseline-plus"/>
</div>

<div class="mt-4">
    <table id="pesananTable" class="w-full text-sm">
        <thead>
            <tr class="text-fg font-semibold">
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Status</th>
                <th>Tanggal Pesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="[&>tr:nth-child(even)]:bg-skyBlue">
            {{-- {{dd($pesanans)}} --}}
            @forelse ($pesanans as $index => $pesanan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pesanan->nama_pelanggan }}</td>
                    <td>
                        @if ($pesanan->status == 'Proses')
                            <span class="inline-block px-3 py-1 text-sm rounded-full bg-warning text-warningDark">
                                Proses
                            </span>
                        @elseif ($pesanan->status == 'Selesai')
                            <span class="inline-block px-3 py-1 text-sm rounded-full bg-success text-successDark">
                                Selesai
                            </span>
                        @else
                            <span class="inline-block px-3 py-1 text-sm rounded-full bg-danger text-dangerDark">
                                Dibatalkan
                            </span>
                        @endif
                    </td>
                    <td>{{ $pesanan->created_at->format('Y-m-d') }}</td>
                    <td class="flex gap-2">
                        <x-button type="button" href="{{ route('pesanan.show', $pesanan->id) }}" asLink="true" icon="iconoir:eye-solid"/>
                            <x-button color="bg-blueDark" type="button" href="{{ route('pesanan.edit', $pesanan->id) }}" asLink="true" icon="tabler:edit"/>
                            <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button color="bg-danger" type="submit" icon="tabler:trash"/>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-fg ">
                        Tidak ada pesanan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection