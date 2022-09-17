@include('nav')

<h1>Reset password</h1>

<form action="{{ route('reset_password_submit') }}" method="post"></form>
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <div>
        New Password
    </div>
    <div>
        <input type="password" name="new_password">
    </div>
    <div>
        Coonfirm Password
    </div>
    <div>
        <input type="password" name="confirm_password">
    </div>
    <div>
        <input type="submit" value="Update">
        <br>
        <a href="{{ route('login') }}">Go back to login page</a>
    </div>
</form>