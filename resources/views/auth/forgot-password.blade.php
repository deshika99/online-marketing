<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Send Password Reset Link</button>
</form>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
