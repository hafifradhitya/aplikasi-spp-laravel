<x-app-layout>
    <x-slot name="header">
        Users Management
    </x-slot>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Users List</h5>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                Add New User
            </a>
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
                            <button class="btn btn-sm btn-warning edit-user"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editUserModal"
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

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                dom: '<"top"lBf>rt<"bottom"ip><"clear">',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
                order: [[0, 'desc']]
            });

            // Your existing edit modal JavaScript
            const editButtons = document.querySelectorAll('.edit-user');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.dataset.id;
                    const name = this.dataset.name;
                    const username = this.dataset.username;
                    const email = this.dataset.email;

                    document.getElementById('edit_name').value = name;
                    document.getElementById('edit_username').value = username;
                    document.getElementById('edit_email').value = email;
                    document.getElementById('editUserForm').action = `/users/${userId}`;
                });
            });
        });
    </script>
    @endpush
</x-app-layout>
