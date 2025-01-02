<form action="{{ route('password_update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <label for="password">New Password</label>
    <input type="password" id="password" name="password" required>
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>
    <button type="submit">Reset Password</button>
</form>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
