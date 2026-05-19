<x-app-layout>

<div style="padding:40px;">

    <h2>Verificación 2FA</h2>

    @if(session('success'))
        <div style="color:green; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="color:red; margin-bottom:20px;">
            {{ session('error') }}
        </div>
    @endif

    <p>Escanee este código QR con Google Authenticator:</p>

    <br>

    <img
        src="data:image/svg+xml;base64,{{ $qrCode }}"
        width="250">

    <br><br>

    <p><strong>Clave secreta:</strong></p>

    <div style="background:#ddd; padding:10px;">
        {{ $user->two_factor_secret }}
    </div>

    <br>

    @if(!$user->two_factor_enabled)

        <form method="POST"
              action="{{ route('two-factor.enable') }}">

            @csrf

            <label>Código OTP:</label>

            <br><br>

            <input
                type="text"
                name="otp"
                placeholder="Ingrese código de 6 dígitos"
                style="padding:10px; width:300px;">

            <br><br>

            <input
    type="submit"
    value="Activar 2FA"
    style="
        background:#2563eb;
        color:white;
        padding:10px 20px;
        border:none;
        cursor:pointer;
    ">

        </form>

    @else

        <div style="color:green;">
            2FA ya está activado.
        </div>

    @endif

</div>

</x-app-layout>