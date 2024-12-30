<x-admin-layout>
    <div class="container">
        <h2>Create New Admin</h2>
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control" required>
                    <option value="super admin">Super Admin</option>
                    <option value="sub admin">Sub Admin</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="application_id" class="form-label">Application ID</label>
                <select name="application_id" class="form-control" required>
                    @foreach ($applications as $application)
                        <option value="{{ $application->application_id }}">{{ $application->application_id }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Admin</button>
        </form>
    </div>


</x-admin-layout>