<x-app-layout>
    <x-slot name="header">
        Kompetensi Management
    </x-slot>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kompetensi List</h5>
            <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-kompetensi')" class="btn btn-primary">
                Add New Kompetensi
            </button>            
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kompetensi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kompetensis as $index => $kompetensi)
                    <tr> 
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kompetensi->kompetensi_kelas }}</td>
                        <td>
                            <button type="button"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'edit-kompetensi')"
                                class="btn btn-sm btn-warning edit-kompetensi"
                                data-id="{{ $kompetensi->id_kompetensi }}"
                                data-kompetensi_kelas="{{ $kompetensi->kompetensi_kelas }}">
                                Edit
                            </button>
                            <form action="{{ route('kompetensi.destroy', $kompetensi->id_kompetensi) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.kompetensi.create')
    @include('admin.kompetensi.edit')

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "processing": true,
                "serverSide": false,
                dom: '<"top"lBf>rt<"bottom"ip><"clear">',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
                order: [[0, 'asc']],
                columnDefs: [
                    {
                        targets: 2,
                        orderable: false
                    }
                ]
            });

            $(document).on('click', '.edit-kompetensi', function() {
                const kompetensiId = $(this).data('id');
                const kompetensiKelas = $(this).data('kompetensi_kelas');
                
                $('#edit_kompetensi_kelas').val(kompetensiKelas);
                $('#editKompetensiForm').attr('action', `/kompetensi/${kompetensiId}`);
            });
        });
    </script>
    @endpush


</x-app-layout>