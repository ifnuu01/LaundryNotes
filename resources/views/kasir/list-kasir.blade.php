@extends('layouts.dashboard')
@section('title', 'List Kasir')
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
        <h2 class="text-lg font-semibold text-fg">List Kasir</h2>
        <p class="text-fg text-sm">Menampilkan semua kasri pada sistem LaundryNotes</p>
    </div>
    <button class="bg-skyBlueDark text-white p-2 rounded-md flex items-center gap-2">
        <iconify-icon icon="ic:baseline-plus" width="20" height="20"></iconify-icon>
        <span>Tambah</span>
    </button>
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
            <tr>
                <td>1</td>
                <td>Konco Konco</td>
                <td>email@email.com</td>
                <td class="flex gap-2">
                    <button class="bg-skyBlueDark text-white px-2 py-1  rounded-md"><iconify-icon icon="iconoir:eye-solid" width="20" height="20"></iconify-icon></button>
                    <button class="bg-blueDark text-white px-2 py-1  rounded-md"><iconify-icon icon="tabler:edit" width="20" height="20"></iconify-icon></button>
                    <button class="bg-danger text-white px-2 py-1  rounded-md"><iconify-icon icon="tabler:trash" width="20" height="20"></iconify-icon></button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mary Jane</td>
                <td>email@email.com</td>
                <td class="flex gap-2">
                    <button class="bg-skyBlueDark text-white px-2 py-1  rounded-md"><iconify-icon icon="iconoir:eye-solid" width="20" height="20"></iconify-icon></button>
                    <button class="bg-blueDark text-white px-2 py-1  rounded-md"><iconify-icon icon="tabler:edit" width="20" height="20"></iconify-icon></button>
                    <button class="bg-danger text-white px-2 py-1  rounded-md"><iconify-icon icon="tabler:trash" width="20" height="20"></iconify-icon></button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Peter Parker</td>
                <td>email@email.com</td>
                <td class="flex gap-2">
                    <button class="bg-skyBlueDark text-white px-2 py-1  rounded-md"><iconify-icon icon="iconoir:eye-solid" width="20" height="20"></iconify-icon></button>
                    <button class="bg-blueDark text-white px-2 py-1  rounded-md"><iconify-icon icon="tabler:edit" width="20" height="20"></iconify-icon></button>
                    <button class="bg-danger text-white px-2 py-1  rounded-md"><iconify-icon icon="tabler:trash" width="20" height="20"></iconify-icon></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection