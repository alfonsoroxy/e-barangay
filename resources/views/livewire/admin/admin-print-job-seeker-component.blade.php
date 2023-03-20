@section('title', 'First Time Job Seeker Print')
<div class="page-wrapper">
    <div class="header">
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
    </div>
    <div>
        <p style="text-align:end;">
            <strong>Job Seeker No. <u>{{ $job_seeker->id }}</u></strong>
        </p>
        <h2 class="title-purpose"><u>Oath of Undertaking</u></h2>
        <div class="img-back">
            <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo"/>
        </div>
        <div class="container">
            <div class="card-body2">
                <p class="card-text">
                    I,  <strong style="text-transform: capitalize;">
                            <u>
                                {{ $job_seeker->jobSeekerFname }} {{ $job_seeker->jobSeekerMname }}
                                {{ $job_seeker->jobSeekerLname }} {{ $job_seeker->jobSeekerSuffix }}
                            </u style="text-transform: capitalize;">, 
                                {{ $job_seeker->age() }}, 
                                {{ $job_seeker->jobSeekerGender }}, 
                                {{ $job_seeker->jobSeekerMaritalstatus }}, 
                                {{ $job_seeker->jobSeekerNationality }}
                        </strong>; resident of  
                    <strong>Barangay 264 Zone 24 District II, Tondo, Manila</strong> with postal address of 
                    <strong style="text-transform: capitalize;">
                        <u>
                            {{ $job_seeker->jobSeekerHousenumber }} {{ $job_seeker->jobSeekerStreetname }}
                            Tondo, Manila
                        </u>
                    </strong> for 
                    <strong>
                        <u>
                            more than {{ $job_seeker->getStayYears() }} of stay
                        </u>
                    </strong>, availing the benefits of <strong>R.A. 11261</strong>, 
                    otherwise known as the <strong>First Time Jobseekers Act of 2019</strong>, 
                    do hereby declare, agree and undertake to abide and be bound by the following:
                </p>
            </div>
            <div class="card-body2">
                <p class="card-text">
                    <ol>
                        <li>
                            This is the first time that I will actively look for the job, and therefore 
                            requesting that a Barangay Certification be issued in my favor to avail the 
                            benefits of the law;
                        </li>
                        <li>
                            That I am aware  that the privilege/s under the said law shall be valid 
                            for one year from the date of the Barangay Certificate is issued;
                        </li>
                        <li>
                            That I can avail the benefits of the law only once;
                        </li>
                        <li>
                            That I understand that my personal information shall be included in the 
                            Roster/ List of First Time Jobseekers and will not be used for any unlawful purpose;
                        </li>
                        <li>
                            That I will inform/report to the Barangay personally, though text or other means, 
                            or through my family/relatives once I get employed; and
                        </li>
                        <li>
                            That I am not a beneficiary of the JobStart Program under R.A. 10869 and other laws 
                            that give similar exemption for the documents or transactions exempted under R.A. 11621;
                        </li>
                        <li>
                            That if issued the requested Certification, I will not use the same in any fraud, 	
                            neither falsify nor help and/or assist un the fabrication of the said certification.
                        </li>
                        <li>
                            That this undertaking is made solely for the purpose of obtaining a Barangay Certification 
                            consistent with the objective of R.A. No. 11261 and not for any other purpose.
                        </li>
                        <li>
                            That I consent the use of my personal information pursuant to the Data Privacy Act 	
                            and other application laws, rules, and regulations.
                        </li>
                    </ol>
                </p>
            </div>
            <div class="card-body2">
                <p style="text-align: center;">Signed this 
                    <strong>
                        <u>{{ $job_seeker->updated_at->toFormattedDateString() }}</u>
                    </strong> in the
                    <strong>City of Manila</strong>
                </p>
            </div>
            <div class="card-name4">
                <p>Witnessed by:</p>
                
                @foreach ($barangay_officials as $barangay_official)
                @if($barangay_official->brgyOfficialPosition == 'Secretary')
        
                    {{-- <p>TERESITA S. YAMBAO</p> --}}
                    <p style="text-transform: uppercase;">
                        <u>
                            {{ $barangay_official->brgyOfficialFname }} {{ $barangay_official->brgyOfficialMname }} 
                            {{ $barangay_official->brgyOfficialLname }} {{ $barangay_official->brgyOfficialSuffix }}
                        </u>
                    </p>
                    <p>{{ $barangay_official->brgyOfficialPosition }}</p>

                @endif
                @endforeach

            </div>
            <div class="card-name4" style="float: right; text-transform: capitalize;">
                <p>
                    <u>
                        {{ $job_seeker->jobSeekerFname }} {{ $job_seeker->jobSeekerMname }}
                        {{ $job_seeker->jobSeekerLname }} {{ $job_seeker->jobSeekerSuffix }}
                    </u>
                </p>
                <p>First Time Jobseeker</p>
                <p style="text-align: end; font-size: 8px; margin-top: 5px;">
                    <strong><em>Not Valid Without Barangay Dry Seal</em></strong>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="page-wrapper">
    <div class="header">
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
    </div>
    <div>
        <h2 class="title-purpose"><u>Certification</u></h2>
        <p style="color: #44546A; text-align: center;">
            <u>(FIRST TIME JOBSEEKERS ASSISTANCE ACT- (RA 11261)</u>
        </p>
        <div class="img-back">
            <img src="{{ asset('assets/dist/css/barangay-asset/Barangay Logo.png') }}" alt="Barangay Logo"/>
        </div>
        <div class="container">
            <div class="card-body">
                <p class="card-text">
                    This is to certify that , Mr/Ms. 
                        <strong style="text-transform: capitalize;">
                            <u>
                                {{ $job_seeker->jobSeekerFname }} {{ $job_seeker->jobSeekerMname }}
                                {{ $job_seeker->jobSeekerLname }} {{ $job_seeker->jobSeekerSuffix }}
                            </u>
                        </strong>, 
                    <strong>
                        {{ $job_seeker->age() }} years of age
                    </strong>, a resident of 
                    <strong style="text-transform: capitalize;">
                        <u>
                            {{ $job_seeker->jobSeekerHousenumber }} {{ $job_seeker->jobSeekerStreetname }}
                            Tondo, Manila
                        </u>
                    </strong> 
                    which within the territorial jurisdiction of 
                    <strong>Barangay 264 Zone 24 District II, Tondo, Manila</strong> 
                    for more than 
                        <strong>
                            {{ $job_seeker->getStayYears() }}, 
                        </strong> is a qualified awardee of
                    <strong>R.A. 11261 or the FIRST TIME Jobseekers Act of 2019</strong>.
                </p>
            </div>
            <div class="card-body">
                <p class="card-text">
                    I, furthermore, that the person whose name and address above  was informed by his/her rights, 
                    including the duties and responsibilities accorded by <strong>R.A. 11261</strong> 
                    through the <strong><u>Oath of Undertaking</u></strong> he/she has signed and executed 
                    in the presence of the Barangay Official.
                </p>
            </div>
            <div class="card-body">
                <p style="text-align: center;">
                    Signed this 
                    <strong>
                        <u>{{ $job_seeker->updated_at->toFormattedDateString() }}</u>
                    </strong> 
                    <strong>City of Manila</strong>.
                </p>
            </div>
            <div class="card-body">
                <p style="text-align: center;">
                    This certification is valid only <strong>one (1) year</strong> 
                    from the date of issuance.
                </p>
            </div>
            <div class="card-name">
                <p>Witnessed by:</p>
                
                @foreach ($barangay_officials as $barangay_official)
                @if($barangay_official->brgyOfficialPosition == 'Secretary')
        
                    {{-- <p>TERESITA S. YAMBAO</p> --}}
                    <p style="text-transform: uppercase;">
                        <u>
                            {{ $barangay_official->brgyOfficialFname }} {{ $barangay_official->brgyOfficialMname }} 
                            {{ $barangay_official->brgyOfficialLname }} {{ $barangay_official->brgyOfficialSuffix }}
                        </u>
                    </p>
                    <p>{{ $barangay_official->brgyOfficialPosition }}</p>

                @endif
                @endforeach

            </div>
            <div class="card-name" style="float: right;">

                @foreach ($barangay_officials as $barangay_official)
                @if($barangay_official->brgyOfficialPosition == 'Punong Barangay')
        
                    {{-- <p>TERESITA S. YAMBAO</p> --}}
                    <p style="text-transform: uppercase;">
                        <u>
                            {{ $barangay_official->brgyOfficialFname }} {{ $barangay_official->brgyOfficialMname }}
                            {{ $barangay_official->brgyOfficialLname }} {{ $barangay_official->brgyOfficialSuffix }}
                        </u>
                    </p>
                    <p>{{ $barangay_official->brgyOfficialPosition }}</p>

                @endif
                @endforeach
                
                {{-- <p>Date: {{ $job_seeker->updated_at }}</p> --}}
                <strong style="text-align: end; font-size: 8px; margin-top: 5px;">
                    <em>Not Valid Without Barangay Dry Seal</em>
                </strong>
            </div>
        </div>
    </div>
</div>