@section('title', 'Business Permit Print')
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
        <strong>Business Permit No. <u>{{ $business_permit->id }}</u></strong>
    </p>
    <h2 class="title-purpose2"><u>BUSINESS CLEARANCE</u></h2>
    <h2 class="title-purpose3"><u>BUSINESS PERMIT</u></h2>
    <div class="img-back">
        <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo"/>
    </div>
    <div class="container">
        <div class="card-body">
            <p class="card-text">
                <strong>To whom it may concern:</strong>
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                This is to certify that the business  or firm registered, 
                this office is hereby granted a <strong>Barangay Clearance</strong> 
                to operate the business, which within  the territorial jurisdiction 
                of this  Barangay, pursuant to the provision of 
                    <strong>
                        Section 152 (c) Republic Act 7160, otherwise known as Local Government Code of 1991.
                    </strong>
            </p>
        </div>
        <div class="card-body">
            <div class="card-body">
                <p class="card-text">
                    <strong>BUSINESS NAME:
                        <u style="margin-left: 20px; text-transform: uppercase;">
                            {{ $business_permit->businessPermitBusinessname }}
                        </u>
                    </strong>
                </p>
                <p class="card-text">
                    <strong>OWNER/ REGISTRANT:
                        <u style="margin-left: 20px; text-transform: uppercase;">
                            {{ $business_permit->businessPermitFname }} {{ $business_permit->businessPermitMname }}
                            {{ $business_permit->businessPermitLname }} {{ $business_permit->businessPermitSuffix }}
                        </u>
                    </strong>
                </p>
                <p class="card-text">
                    <strong>BUSINESS ADDRESS:
                        <u style="margin-left: 20px; text-transform: uppercase;">
                            {{ $business_permit->businessPermitHousenumber }} {{ $business_permit->businessPermitStreetname }}
                            Tondo, Manila
                        </u>
                    </strong>                    
                </p>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">
                This permit/clearance is issued upon the request of the said person, 
                owner and proprietor of the said establishment for 
                <strong style="text-transform: uppercase;">
                    <u>{{ \Carbon\Carbon::parse($business_permit->businessPermitBusinessYearEstablish)->format('Y') }}</u>
                </strong> 
                and for whatever legal purposes it may serve.
            </p>
        </div>
        <div class="card-body2">
            <p style="text-align: center;">
                <strong>
                    Issued this 
                        <u>
                            {{ $business_permit->updated_at->toFormattedDateString() }}
                        </u>
                </strong>             
            </p>
        </div>
        <div class="card-name4">
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

            <strong style="font-size: 8px;">
                <em>Not Valid Without Barangay Dry Seal</em>
            </strong>
        </div>
    </div>
</main>