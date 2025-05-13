@extends('layouts.dashboard')
@section('title', 'Daftar Kasir')
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
        <h2 class="text-lg font-semibold text-fg">Daftar Kasir</h2>
        <p class="text-fg text-sm">Menampilkan semua kasir pada sistem LaundryNotes</p>
    </div>
    <x-button text="Tambah Akun Kasir" type="button" href="{{route('kasir.create')}}" asLink="true" icon="ic:baseline-plus"/>
</div>

<div class="mt-4">
    <table id="pesananTable" class="w-full text-sm">
        <thead>
            <tr class="text-fg font-semibold">
                <th>No</th>
                <th>Nama Kasir</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="[&>tr:nth-child(even)]:bg-skyBlue">
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="flex gap-2">
                        <x-button color="bg-blueDark" type="button" href="{{ route('kasir.edit', $user->id) }}" asLink="true" icon="tabler:edit"/>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('kasir.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button 
                                color="bg-danger btn-delete" 
                                type="button" 
                                icon="tabler:trash"
                                dataId="{{ $user->id }}"
                            />
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-fg">Tidak ada data kasir</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection