@include('nav')

<h1>Forget password</h1>

<form action="{{ route('forget_password_submit') }}"></form>
    @csrf
    <div>
        Email Adress
    </div>
    <div>
        <input type="email" name="email">
    </div>
    <div>
        Password
    </div>
    <div>
        <input type="password" name="password">
    </div>
    <div>
        <input type="submit" value="Submit">
        <br>
        <a href="{{ route('login') }}">Go back to login page</a>
    </div>
</form>