<div class="" style="display: block; text-align: center; margin-top: 1.3rem; margin-bottom: 0.6rem;">

    {{--
    <div style="text-align: left; font-size: 0.8rem;">
        Entrar con Redes sociales
    </div>
    --}}

    <div class="" style="display: grid; gap: 15px; grid-template-columns: 1fr 1fr;">

        <a href="{{ url('login/facebook') }}" class="r-icon-social">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="#1e3050"
                 viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg>

            <span>
                Facebook
            </span>
        </a>

        <a href="{{ url('login/google') }}" class="r-icon-social">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="#ff0000"
                 viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM64 256c0-55.3 44.7-100 100-100c27 0 49.5 9.8 67 26.2l-27.1 26.1c-7.4-7.1-20.3-15.4-39.8-15.4c-34.1 0-61.9 28.2-61.9 63.2c0 34.9 27.8 63.2 61.9 63.2c39.6 0 54.4-28.5 56.8-43.1H164V241.8h94.4c1 5 1.6 10.1 1.6 16.6c0 57.1-38.3 97.6-96 97.6c-55.3 0-100-44.7-100-100zm291 18.2v29H325.8v-29h-29V245h29V216H355v29h29v29.2H355z"/></svg>

            <span>
                Google
            </span>
        </a>

    </div>
</div>

<style>
    .r-icon-social {
        display: grid;
        padding: 0.3rem;
        width: 100%;
        border: 1px solid rgba(0,0,0, 0.2);
        border-radius: 4px;
        text-align: left;
        box-sizing: border-box;
        grid-template-columns: 30px 1fr;
        align-content: center;
    }

    .r-icon-social svg {
        width: 100%;
    }

    .r-icon-social span {
        display: block;
        align-self: center;
        font-size: 1.1rem;
        text-align: center;
    }

</style>
