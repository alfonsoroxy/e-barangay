@section('title', 'Barangay Clearance Print')
<header class="header">
    <div class="header-img-left">
        <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo" width="100px"/>
    </div>
    <div class="header-img-right">
        <img src="{{ asset('assets/dist/css/barangay-asset/Lungsod ng Manila Logo.png') }}" alt="Barangay Logo" width="100px"/>
    </div>
    <h4 class="title-country">Republic of the Philippines</h4>
    <h4 class="title-city">City of Manila</h4>
    <h1 class="title-office">Office of the Barangay Chairman</h1>
    <h3 class="title-address">Barangay 264 Zone 24 District II, Tondo Manila</h3>
    <hr class="hr-blue" /> <hr class="hr-red" />
</header>
<main>
    <p style="text-align:end;">
        <strong>Clearance No. <u>{{ $clearance->id }}</u></strong>
    </p>
    <h2 class="title-purpose"><u>Barangay Clearance</u></h2>
    <div class="img-back">
        <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo"/>
    </div>
    <div class="container">
        <div class="card-body">
            <p class="card-text">
                <strong>To Whom It May Concern: </strong>
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                This is to certify that, 
                <strong style="text-transform: uppercase;">
                    <u>
                        {{ $clearance->clearanceFname }} {{ $clearance->clearanceMname }}
                        {{ $clearance->clearanceLname }} {{ $clearance->clearanceSuffix }}
                    </u>
                </strong> 
                of legal age, 
                <strong style="text-transform: uppercase;">
                    {{ $clearance->clearanceNationality }}, 
                    {{ $clearance->clearanceGender }}, 
                    {{ $clearance->clearanceMaritalstatus }}
                </strong>,
                and a bonafide resident of this barangay with postal address at 
                <strong style="text-transform: uppercase;">
                    <u>
                        {{ $clearance->clearanceHousenumber }} {{ $clearance->clearanceStreetname }}
                        Tondo, Manila
                    </u>
                </strong> 
                which within the territorial jurisdiction of
                <strong>Barangay 264 Zone 24 District II, Tondo, Manila</strong>.
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">
                Further certify, that the person whose name and address above has 
                <strong>NO DERAGATORY RECORD</strong> filed in our Barangay Office; 
                who is a person named above has of good moral character and a law abiding citizen. 
            </p>
        </div>
        </div>
        <div class="card-body">
            <p class="card-text">
                This certification has been issued for whatever legal purpose(s) 
                it may serve him/her best. 
            </p>
        </div>
        <div class="card-body">
            <p style="text-align: center;">
                Given this 
                    <strong>
                        <u>{{ $clearance->updated_at->toFormattedDateString() }}</u>
                    </strong> in this office.
                </p>
        </div>
        <div class="card-name">
            <p>Certified True and Correct by:</p>
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