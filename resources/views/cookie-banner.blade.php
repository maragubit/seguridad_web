<!-- resources/views/cookie-banner.blade.php -->
<div id="cookie-banner" style="position: fixed; bottom: 0; left: 0; right: 0; background: rgba(0, 0, 0, 0.7); color: white; padding: 10px; text-align: center; display: none;">
    <p>
        Este sitio web utiliza cookies para mejorar tu experiencia. 
        <a href="{{ route('cookies-policy') }}" style="color: #00bcd4;">Más información</a>.
    </p>
    <button id="accept-cookies" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
        Aceptar
    </button>
</div>