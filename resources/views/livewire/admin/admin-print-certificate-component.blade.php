@section('title', 'Barangay Certificate Print')
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
                <strong>Certificate No. <u>{{ $certificate->id }}</u></strong>
            </p>
            <h2 class="title-purpose4">
                Certification
            </h2>
            <p class="card-text3">
                <strong>To Whom It May Concern</strong>
            </p>
            <div class="card-body2">
                <p class="card-text3">
                    This is to certify that 
                        <strong style="text-transform: uppercase;">
                            <u>
                                {{ $certificate->certificateFname }} {{ $certificate->certificateMname }}
                                {{ $certificate->certificateLname }} {{ $certificate->certificateSuffix }}
                            </u>
                        </strong>,
                    legal age is a bonafide  resident of  this barangay, 
                    <strong>Barangay 264, Zone 24, District II, Manila</strong> 
                    with a postal 
                    <strong style="text-transform: uppercase;">
                        <u>
                            {{ $certificate->certificateHousenumber }} {{ $certificate->certificateStreetname }}
                            tondo, Manila.
                        </u>
                    </strong>
                    <p><em>AS PER REQUIREMENT AND / OR TO SUPPORT HIS /HER </em></p>        
                </p>
            </div>
            <div class="card-body3" style="font-size: 12px">
                <div class="form-group-left">

                    @if($certificate->certificatePurpose == 'Application for Employment')
                        <input type="checkbox" id="Application for Employment" name="Application for Employment" 
                        value="Application for Employment" class="card-input" checked/>
                            <label for="Application for Employment"> Application for Employment</label><br>
                    @else
                        <input type="checkbox" id="Application for Employment" name="Application for Employment" 
                        value="Application for Employment" class="card-input" />
                            <label for="Application for Employment"> Application for Employment</label><br>
                    @endif
    
                    @if($certificate->certificatePurpose == 'Hospital Purpose')
                        <input type="checkbox" id="Hospital Purpose" name="Hospital Purpose" 
                        value="Hospital Purpose" class="card-input" checked/>
                            <label for="Hospital Purpose"> Hospital Purpose</label><br>
                    @else
                        <input type="checkbox" id="Hospital Purpose" name="Hospital Purpose" 
                        value="Hospital Purpose" class="card-input" />
                            <label for="Hospital Purpose"> Hospital Purpose</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'Transaction with a Bank')
                        <input type="checkbox" id="Transaction with a Bank" name="Transaction with a Bank" 
                        value="Transaction with a Bank" class="card-input" checked/>
                            <label for="Transaction with a Bank"> Transaction with a Bank</label><br>
                    @else
                        <input type="checkbox" id="Transaction with a Bank" name="Transaction with a Bank" 
                        value="Transaction with a Bank" class="card-input" />
                            <label for="Transaction with a Bank"> Transaction with a Bank</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'Postal ID Requirement')
                        <input type="checkbox" id="Postal ID Requirement" name="Postal ID Requirement" 
                        value="Postal ID Requirement" class="card-input" checked/>
                            <label for="Postal ID Requirement"> Postal ID Requirement</label><br>
                    @else
                        <input type="checkbox" id="Postal ID Requirement" name="Postal ID Requirement" 
                        value="Postal ID Requirement" class="card-input" />
                            <label for="Postal ID Requirement"> Postal ID Requirement</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'Organized Vending')
                        <input type="checkbox" id="Organized Vending" name="Organized Vending" 
                        value="Organized Vending" class="card-input" checked/>
                            <label for="Organized Vending"> Organized Vending</label><br>
                    @else
                        <input type="checkbox" id="Organized Vending" name="Organized Vending" 
                        value="Organized Vending" class="card-input" />
                            <label for="Organized Vending"> Organized Vending</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'Travel / Transfer of Resident')
                        <input type="checkbox" id="Travel / Transfer of Resident" name="Travel / Transfer of Resident" 
                        value="Travel / Transfer of Resident" class="card-input" checked/>
                            <label for="Travel / Transfer of Resident"> Travel / Transfer of Resident</label><br>
                    @else
                        <input type="checkbox" id="Travel / Transfer of Resident" name="Travel / Transfer of Resident" 
                        value="Travel / Transfer of Resident" class="card-input" />
                            <label for="Travel / Transfer of Resident"> Travel / Transfer of Resident</label><br>
                    @endif
                </div>
                <div class="form-group-right">

                    @if($certificate->certificatePurpose == 'School Admission/Requirement')
                        <input type="checkbox" id="School Admission/Requirement" name="School Admission/Requirement" 
                        value="School Admission/Requirement" class="card-input" checked/>
                            <label for="School Admission/Requirement"> School Admission/Requirement</label><br>
                    @else
                        <input type="checkbox" id="School Admission/Requirement" name="School Admission/Requirement" 
                        value="School Admission/Requirement" class="card-input" />
                            <label for="School Admission/Requirement"> School Admission/Requirement</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'Processing of Calamity Loan')
                        <input type="checkbox" id="Processing of Calamity Loan" name="Processing of Calamity Loan" 
                        value="Processing of Calamity Loan" class="card-input" checked/>
                            <label for="Processing of Calamity Loan"> Processing of Calamity Loan</label><br>
                    @else
                        <input type="checkbox" id="Processing of Calamity Loan" name="Processing of Calamity Loan" 
                        value="Processing of Calamity Loan" class="card-input" />
                            <label for="Processing of Calamity Loan"> Processing of Calamity Loan</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'Processing of SSS Loan')
                        <input type="checkbox" id="Processing of SSS Loan" name="Processing of SSS Loan" 
                        value="Processing of SSS Loan" class="card-input" checked/>
                            <label for="Processing of SSS Loan"> Processing of SSS Loan</label><br>
                    @else
                        <input type="checkbox" id="Processing of SSS Loan" name="Processing of SSS Loan" 
                        value="Processing of SSS Loan" class="card-input" />
                            <label for="Processing of SSS Loan"> Processing of SSS Loan</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'For Livelihood Loan')
                        <input type="checkbox" id="For Livelihood Loan" name="For Livelihood Loan" 
                        value="For Livelihood Loan" class="card-input" checked/>
                            <label for="For Livelihood Loan"> For Livelihood Loan</label><br>
                    @else
                        <input type="checkbox" id="For Livelihood Loan" name="For Livelihood Loan" 
                        value="For Livelihood Loan" class="card-input" />
                            <label for="For Livelihood Loan"> For Livelihood Loan</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'ID for Senior Citizen')
                        <input type="checkbox" id="ID for Senior Citizen" name="ID for Senior Citizen" 
                        value="ID for Senior Citizen" class="card-input" checked/>
                            <label for="ID for Senior Citizen"> ID for Senior Citizen</label><br>
                    @else
                        <input type="checkbox" id="ID for Senior Citizen" name="ID for Senior Citizen" 
                        value="ID for Senior Citizen" class="card-input" />
                            <label for="ID for Senior Citizen"> ID for Senior Citizen</label><br>
                    @endif

                    @if($certificate->certificatePurpose == 'Other')
                        <input type="checkbox" id="Other" name="Other" 
                        value="Other" class="card-input" checked/>
                            <label for="Other"> 
                                Other: 
                                <strong style="text-transform: uppercase;">
                                    <u>{{ $certificate->certificateOtherPurpose }}</u>
                                </strong>
                            </label><br>
                    @else
                        <input type="checkbox" id="Other" name="Other" 
                        value="Other" class="card-input" />
                            <label for="Other"> Other</label><br>
                    @endif
                </div>
            </div>
            <div class="card-body2">
                <p class="card-text3">
                    This certification has been issued upon the request of the above mentioned 
                    named for whatever legal purposes it may served.
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
                        <u>{{ $certificate->updated_at->toFormattedDateString() }}</u>
                    </p> 
                </strong> 
            </div>
            <div class="card-name5">
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