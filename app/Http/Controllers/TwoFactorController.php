<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class TwoFactorController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $google2fa = new Google2FA();

        // Generar secreto si no existe
        if (!$user->two_factor_secret) {

            $user->two_factor_secret =
                $google2fa->generateSecretKey(32);

            $user->save();
        }

        // URL QR
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            'INF781-Laravel2FA',
            $user->email,
            $user->two_factor_secret
        );

        // Crear QR
        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);

        $qrCode = base64_encode(
            $writer->writeString($qrCodeUrl)
        );

        return view('2fa.index', compact(
            'qrCode',
            'user'
        ));
    }

    public function enable(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $google2fa = new Google2FA();

        $valid = $google2fa->verifyKey(
            Auth::user()->two_factor_secret,
            $request->otp
        );

        if ($valid) {

            $user = Auth::user();

            $user->two_factor_enabled = true;

            $user->save();

            return back()->with(
                'success',
                '2FA habilitado correctamente.'
            );
        }

        return back()->with(
            'error',
            'Código inválido.'
        );
    }
}