@include('nav')

<h1>Login</h1>

<form action=""></form>
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
        <input type="submit" value="Login">
        <br>
        <a href="{{ route('forget_password') }}">Forgot your password?</a>
    </div>
</form>