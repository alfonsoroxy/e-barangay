@section('title', 'Barangay Indigency Print')
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
    <div class="container2">
        <div class="img-back">
            <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo"/>
        </div>
        <div class="card-side">

            @foreach ($barangay_officials as $barangay_official)

            <div class="card-body4">
                <p class="card-text2">
                    <strong class="b-officials" style="text-transform: uppercase;">
                        {{ $barangay_official->brgyOfficialFname }} {{ $barangay_official->brgyOfficialMname }} 
                        {{ $barangay_official->brgyOfficialLname }} {{ $barangay_official->brgyOfficialSuffix }}
                    </strong>
                </p>
                <p class="card-text2">
                    <strong>
                        @if($barangay_official->brgyOfficialPosition == 'Punong Barangay')

                        <em style="color: #FF0000; text-transform: uppercase;">
                            {{ $barangay_official->brgyOfficialPosition }}
                        </em>

                        @else

                        <em style="color: #1F497D; text-transform: uppercase;">
                            {{ $barangay_official->brgyOfficialPosition }}
                        </em>

                        @endif
                    </strong>
                </p>
            </div>

            @endforeach
        </div>
        <div class="content">
            <p style="text-align:end;">
                <strong>Indigency No. <u>{{ $indigency->id }}</u></strong>
            </p>
            <h2 class="title-purpose5">
                Certificate of Indigency
            </h2>
            <div class="card-body">
                <p class="card-text3">
                    <strong>To Whom It May Concern</strong>
                </p>
            </div>
            <div class="card-body2">
                <p class="card-text3">
                    This is to certify that 
                        <strong>
                            <u style="text-transform: uppercase;">
                                {{ $indigency->indigencyFname }} {{ $indigency->indigencyMname }}
                                {{ $indigency->indigencyLname }} {{ $indigency->indigencySuffix }}
                            </u>
                        </strong>  
                    is a bonafide resident of this barangay, 
                    <strong>Barangay 264, Zone 24, District II, Manila</strong> with a postal address at 
                    <strong>
                        <u style="text-transform: uppercase;">
                            {{ $indigency->indigencyHousenumber }} {{ $indigency->indigencyStreetname }}
                            Tondo, Manila.
                        </u>
                    </strong>
                    His/her family belongs to one of the many indigent families of this barangay.        
                </p>
            </div>
            <div class="card-body2">
                <p class="card-text3">
                    This certification is been issued upon the request of the above mentioned named 
                    for <strong style="text-transform: uppercase;">
                            <u>{{ $indigency->indigencyPurpose }}</u>
                        </strong> 
                    and for whatever legal purposes it may served.    
                </p>
            </div>
            <div class="card-body2">
                <p class="card-text3">
                    In <strong>WITNESS WHEREOF</strong> I have hereunto set my hand and affixed the 
                    official seal of this office. Done in the <strong>City of Manila</strong>.        
                </p>
            </div>
            <div class="card-body2">
                <strong class="card-issued">
                    <p>Issued this 
                        <u>{{ $indigency->updated_at->toFormattedDateString() }}</u>
                    </p> 
                </strong> 
            </div>
            <div class="card-name2">
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
    </div>
</main>