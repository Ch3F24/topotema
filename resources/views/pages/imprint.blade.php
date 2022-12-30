@extends('layouts.app')

@section('meta')
    <title>{{ __('Imprint') . ' - ' . __('Site Title') }}</title>
@endsection

@section('main')
    <div class="ml-auto px-4 md:px-0 lg:w-7/12">

        <h1 class="w-full text-2xl text-white lg:text-4xl">{{ __('Imprint') }}</h1>

        <div class="mt-8 grid grid-cols-2 text-white lg:mt-16">

            <div class="space-y-4">

                <div>

                    <p>Topotéma – Állambiztonsági helyeken</p>

                    <p>

                        <a href="/"
                           title="Topotéma website">www.topotema.hu
                        </a>

                    </p>

                </div>

                <p>Az Állambiztonsági Szolgálatok
                    <br>Történeti Levéltárának tudományos
                    <br>ismeretterjesztő honlapja
                </p>

                <div>

                    <p>Budapest, 1067. Eötvös utca 7.</p>

                    <p>
                        email:
                        <a href="mailto:topotema@abtl.hu"
                           title="Email topotema@abtl.hu">topotema@abtl.hu
                        </a>
                    </p>

                    <ul>
                        <li>Főigazgató:</li>
                        <li>Cseh Gergő Bendegúz</li>
                        <li>Projektfelelős:</li>
                        <li>Müller Rolf</li>
                        <li>Tartalomfejlesztés:</li>
                        <li>Cserényi-Zsitnyányi Ildikó</li>
                        <li>Krahulcsán Zsolt</li>
                        <li>Müller Rolf</li>
                        <li>Semsei Ferenc</li>
                        <li>Szécsényi András</li>
                        <li>Takács Tibor</li>
                        <li>Épületfotók:</li>
                        <li>Kovaloszky Dániel</li>
                    </ul>

                </div>

            </div>

            <div class="space-y-4">

                <ul>
                    <li>Videós munkák:</li>
                    <li>Hugyecsek Balázs/Weateam Hungary Bt.</li>
                    <li>Adatbázis-fejlesztés:</li>
                    <li>Poliphon Kft., Lux Zoltán</li>
                    <li>Honlap-fejlesztés:</li>
                    <li>Weateam Hungary Bt.</li>
                </ul>

                <ul>
                    <li>Együttműködő partnerek:</li>
                    <li>Budapest Főváros Levéltára</li>
                    <li>Budapesti Rendőr-főkapitányság Hivatala</li>
                    <li>Fővárosi Nyomozó Ügyészség</li>
                    <li>Fővárosi Szabó Ervin Könyvtár Budapest Gyűjtemény</li>
                    <li>Honvédelmi Minisztérium</li>
                    <li>Kiscelli Múzeum</li>
                    <li>Magyar Nemzeti Levéltár Szabolcs-SzatmárBereg Megyei Levéltára</li>
                    <li>Magyar Nemzeti Múzeum Történeti Fényképtár</li>
                    <li>Országos Széchényi Könyvtár Kézirattár</li>
                    <li>Terror Háza Múzeum</li>
                    <li>Budapeşte Yunus Emre Türk Kültür</li>
                    <li>Merkezi – Budapesti Yunus Emre Intézet</li>
                    <li>Török Kulturális Központ</li>
                </ul>

            </div>

        </div>

        <div class="mt-8 lg:mt-16">
            <img src="{{ asset('assets/images/partners.png') }}"
                 alt="Partners logo"
                 title="Partners logo">
        </div>

    </div>
@endsection
