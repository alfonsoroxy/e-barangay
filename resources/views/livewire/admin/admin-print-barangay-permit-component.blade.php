@section('title', 'Print Barangay Permit')
<header class="header">
    <div class="header-img-left">
        <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo" width="100px"/>
    </div>
    <div class="header-img-right">
        <img src="{{ asset('assets/dist/css/barangay-asset/Lungsod ng Manila Logo.png') }}" alt="Manila Logo" width="100px"/>
    </div>
    <h4 class="title-country ">Republic of the Philippines</h4>
    <h4 class="title-city">City of Manila</h4>
    <h1 class="title-office">Office of the Barangay Chairman</h1>
    <h3 class="title-address">Barangay 264 Zone 24 District II, Tondo Manila</h3>
    <hr class="hr-blue" /> <hr class="hr-red" />
</header>
<main>
    <p style="text-align:end;">
        <strong>Brgy Permit No. <u>{{ $barangay_permit->id }}</u></strong>
    </p>
    <h2 class="title-purpose"><u>Barangay Permit</u></h2>
    <div class="img-back">
        <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo"/>
    </div>
    <div class="container" >
        <div class="card-body">
            <p class="card-text">
                <strong>To Whom It May Concern; </strong>
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                This is to certify that permission is given to 
                <strong style="text-transform: uppercase;"><u> {{ $barangay_permit->barangayPermitName }} </u></strong>to undertake  
                <strong style="text-transform: uppercase;">
                    <u> {{ $barangay_permit->barangayPermitName }} </u>
                </strong> along the vicinity of 
                <strong style="text-transform: uppercase;">
                    <u>
                        {{ $barangay_permit->barangayPermitHousenumber }} {{ $barangay_permit->barangayPermitStreetname }}
                        Tondo, Manila
                    </u>
                </strong> 
                which is within the territorial jurisdiction of
                <strong>Barangay 264 Zone 24, District II, Tondo, Manila</strong>.
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                This also to signify that they should conform to all safety standards of construction practices, 
                and will also be responsible for damages, should there be any. Pursuant to the provision of 
                <strong>Section 152 of Republic act 20160</strong>; other known as the 
                <strong>Local Government Code of 1991</strong>.
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                This certification is has been issued upon the request of the latter that 
                whatsoever legal purposes it may served. 
            </p>
        </div>
        <div class="card-body">
            <p style="text-align: center;">
                    Issued this 
                    <strong>
                        <u>{{ $barangay_permit->updated_at->toFormattedDateString() }}</u>
                    </strong> 
                    in this office.
            </p>
        </div>
        <div class="card-name">
            <p>Approved by:</p>
            <p>__________________________</p>

            @foreach ($barangay_officials as $barangay_official)
            @if($barangay_official->brgyOfficialPosition == 'Punong Barangay')
    
                {{-- <p>TERESITA S. YAMBAO</p> --}}
                <p style="text-transform: capitalize;">
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