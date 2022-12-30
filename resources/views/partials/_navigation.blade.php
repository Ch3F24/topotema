<nav class="flex pt-4 pb-12 lg:py-8">
    <div class="mr-4 lg:w-3/12">
        <a href="/">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Topotéma logó" class="logo">
        </a>
    </div>
    <ul class="mr-4 ml-auto hidden md:flex flex-1 justify-end text-white space-x-4 md:mr-8 lg:items-center">
        <li class="nav-link">
            <a href="{{ route('imprint') }}"
               title="{{ __('Imprint') }}">{{ __('Imprint') }}
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('legal_notice') }}"
               title="{{ __('Legal notice') }}"
               class="nav-link">{{ __('Legal notice') }}
            </a>
        </li>
        <li>
            <span id="audio-toggle" title="Audió lejátszása">
                <img src="{{ asset('assets/svg/audio.svg') }}" alt="Audio Icon" class="w-5 cursor-pointer">
            </span>
            <audio class="hidden" id="audio-player">
                <source src="{{ asset('/assets/audio/audio.mp3') }}" type="audio/mpeg">
            </audio>
        </li>
    </ul>
    <div class="ml-auto">
        <a href="https://www.abtl.hu/">
            <img src="{{ asset('assets/images/abtl_logo.svg') }}" alt="Abtl logó" class="hidden abtl-logo lg:block">
            <img src="{{ asset('assets/images/abtl_mono.svg') }}" alt="Abtl logó" class="ml-auto abtl-logo lg:hidden">
        </a>
    </div>
</nav>
