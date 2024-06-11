<style>
    .container {
        margin: auto;
        padding: 5%;
    }

    a {
        all: unset;
        width: 20px;
        background-color: rgb(50, 50, 200);
        color: white;
        padding: 1%;
        font-size: 20px;
        font-weight: 900;
        cursor: pointer;
    }
</style>
<div class="container">
    <h1>
        Visit link to reset password
    </h1>
    <a href="{{ Route('resetPasswordForm', $token) }}">Reset password</a>
</div>
