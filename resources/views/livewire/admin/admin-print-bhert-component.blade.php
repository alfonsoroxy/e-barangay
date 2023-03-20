@section('title', 'BHERT Certificate Print')
<header class="header">
    <div class="header-img-left">
        <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo" width="100px"/>
    </div>
    <div class="header-img-right">
        <img src="{{ asset('assets/dist/css/barangay-asset/Lungsod ng Manila Logo.png') }}" alt="Manila Logo" width="100px"/>
    </div>
    <h4 class="title-country">Republic of the Philippines</h4>
    <h4 class="title-city">City of Manila</h4>
    <h1 class="title-office">Office of the Barangay Chairman</h1>
    <h3 class="title-address">Barangay 264 Zone 24 District II, Tondo Manila</h3>
    <hr class="hr-blue" /> <hr class="hr-red" />
</header>
<main>
    <p style="text-align:end;">
        <strong>BHERT No. <u>{{ $bhert->id }}</u></strong>
    </p>
    <h2 class="title-purpose"><u>BHERT Certification</u></h2>
    <div class="img-back">
        <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo"/>
    </div>
    <div class="container">
        <div class="card-body">
            <p class="card-text">
                This is to certify that 
                    <strong style="text-transform: uppercase;">
                        <u>
                            {{ $bhert->bhertFname }} {{ $bhert->bhertMname }}
                            {{ $bhert->bhertLname }} {{ $bhert->bhertSuffix }}
                        </u>
                    </strong>, 
                    {{ $bhert->bhertAge }} years of age, 
                    is a bonafide resident of this barangay, 
                    <strong> Barangay 264 Zone 24 , District II, Tondo, Manila </strong> with postal address at 
                    <strong style="text-transform: uppercase;">
                        <u>
                            {{ $bhert->bhertHousenumber }} {{ $bhert->bhertStreetname }}
                            Tondo, Manila
                        </u>
                    </strong>.
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                That <strong style="text-transform: uppercase;">
                        <u>
                            {{ $bhert->bhertFname }} {{ $bhert->bhertMname }}
                            {{ $bhert->bhertLname }} {{ $bhert->bhertSuffix }}
                        </u>
                    </strong> is certified that he/she was cleared by BHERT 
                and he/she  is <strong>not included</strong> in the list of person being monitored in our Barangay 
                that is suspected, probable or with confirmed case related to COVID-19.
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                This certification has been issued for the above mentioned name for him/her 
                <strong style="text-transform: lowercase;">
                    <u>{{ $bhert->bhertPurpose }} purposes</u>
                </strong> 
                and not as an official medical certificate.
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                Furthermore, this is not in any guarantee that the above mentioned name is free in COVID-19.
            </p>
        </div>
        <div class="card-body">
            <p style="text-align: center;">
                Given this 
                    <strong>
                        <u>{{ $bhert->updated_at->toFormattedDateString() }}</u>
                    </strong>
                    in this office.
            </p>
        </div>
        <div class="card-name">
            <p>Certified by:</p>
            <p>__________________________</p>
            
            @foreach ($barangay_officials as $barangay_official)
            @if($barangay_official->brgyOfficialPosition == 'Punong Barangay')
    
                {{-- <p>TERESITA S. YAMBAO</p> --}}
                <p style="text-transform: uppercase;">
                    {{ $barangay_official->brgyOfficialFname }} {{ $barangay_official->brgyOfficialMname }}
                    {{ $barangay_official->brgyOfficialLname }} {{ $barangay_official->brgyOfficialSuffix }}
                </p>
                <p>{{ $barangay_official->brgyOfficialPosition }}</p>

            @endif
            @endforeach

            <strong style="font-size: 8px; margin-top: 3px;">
                <em>Not Valid Without Barangay Dry Seal</em>
            </strong>
        </div>
    </div>
</main>