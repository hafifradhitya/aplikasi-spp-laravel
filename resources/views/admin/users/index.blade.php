<x-app-layout>
    <x-slot name="header">
        Users Management
    </x-slot>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Users List</h5>
            <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-user')" class="btn btn-primary">
                Add New User
            </button>           
        </div>  
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id_user }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button type="button" 
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'edit-user')"
                                class="btn btn-sm btn-warning edit-user"
                                data-id="{{ $user->id_user }}"
                                data-name="{{ $user->name }}"
                                data-username="{{ $user->username }}"
                                data-email="{{ $user->email }}">
                                Edit
                            </button>  
                            <form action="{{ route('users.destroy', $user->id_user) }}" method="POST" class="d-inline">
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

    <!-- Keep your existing modals here -->
    @include('admin.users.create')
    @include('admin.users.edit')

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#example').DataTable({
                dom: '<"top"lBf>rt<"bottom"ip><"clear">',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
                order: [[0, 'desc']]
            });

            // Edit user click handler
            $(document).on('click', '.edit-user', function() {
                const userId = $(this).data('id');
                const name = $(this).data('name');
                const username = $(this).data('username');
                const email = $(this).data('email');

                $('#edit_name').val(name);
                $('#edit_username').val(username);
                $('#edit_email').val(email);
                $('#edit_password').val('');
                $('#editUserForm').attr('action', `/users/${userId}`);

            });
        });
    </script>
    @endpush

</x-app-layout>
