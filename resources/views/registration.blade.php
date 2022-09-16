@include('nav')

<h1>Register</h1>

<form action="{{ route('submition') }}" method="post">
    @csrf
    <div>
        Name
    </div>
    <div>
        <input type="text" name="name">
    </div>
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
        Confim Password
    </div>
    <div>
        <input type="password" name="confirm_password">
    </div>
    <div>
        <input type="submit" value="Register"/>
    </div>
</form>