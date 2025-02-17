<x-app-layout>
    <x-slot name="header">
        Kelas Management
    </x-slot>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kelas List</h5>
            <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-kelas')" class="btn btn-primary">
                Add New Kelas
            </button>            
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelass as $index => $kelas)
                    <tr> 
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                        <td>
                            <button type="button"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'edit-kelas')"
                                class="btn btn-sm btn-warning edit-kelas"
                                data-id="{{ $kelas->id_kelas }}"
                                data-Nama_kelas="{{ $kelas->nama_kelas }}">
                                Edit
                            </button>
                            <form action="{{ route('kelas.destroy', $kelas->id_kelas) }}" method="POST" class="d-inline">
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

    @include('admin.kelas.create')
    @include('admin.kelas.edit')

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

            $(document).on('click', '.edit-kelas', function() {
                const kelasId = $(this).data('id');
                const namaKelas = $(this).data('nama_kelas');
                
                $('#edit_nama_kelas').val(namaKelas);
                $('#editKelasForm').attr('action', `/kelas/${kelasId}`);
            });
        });
    </script>
    @endpush


</x-app-layout>
