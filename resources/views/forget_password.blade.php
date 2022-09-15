@include('nav')

<h1>Forget password</h1>

<form action=""></form>
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
        <a href="{{ route('login') }}">Go back to login page</a>
    </div>
</form>