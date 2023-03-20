@section('title', 'Frequently Ask Questions')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Frequently Ask Questions</h1>
                </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home-component') }}">Home</a></li>
                    <li class="breadcrumb-item active">Frequently Ask Questions</li>
                </ol>
            </div>
          </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                1. Data Privacy Agreement
                                <code>
                                    Please read and agree to the terms before you register
                                </code>
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <h5 class="card-title w-100">
                                <strong>Data Privacy Agreement</strong>
                            </h5>
                            <p class="card-text">
                                The Barangay 264 of Tondo Manila recognizes its responsibilities 
                                under the Republic Act No. 10173, also known as the Data Privacy 
                                Act of 2012, with respect to the data they collect, record, 
                                organize, update, use, consolidate or destruct from the data 
                                subject,  The personal data obtained from this portal is entered 
                                and stored within the barangay authorized information, request 
                                documents, and announcement system and will only be accessed by 
                                the Barangay Official or Staff authorized personnel. The Barangay 
                                264 had instituted appropriate organizational, technical and physical 
                                security measures to ensure the protection of the resident's personal 
                                data. Furthermore, the infomation collected and stored in the portal 
                                shall only be used for the following purposes:
                            </p>
                            <ol class="card-text">
                                <li>
                                    Processing and reporting of documents related to the requesting document, 
                                    DILG and other accrediting agencies under certain conditions as may be 
                                    required by the lawful order of the courts or in cases of emergency as 
                                    defined under the Data Privacy Law.
                                </li>
                                <li>
                                    Announcement of Barangay is offered and organized by the Barangay 
                                    Officials and Staff which pertaining to establishing relation with 
                                    residents.
                                </li>
                                <li>
                                    The Barangay Official shall not disclose personal information of 
                                    resident without consent.
                                </li>
                            </ol>
                            <h5 class="card-title w-100">
                                <strong>Residents Consent</strong>
                            </h5>
                            <p class="card-text">
                                I have read the Data Privacy Statement and express my consent for the 
                                Barangay 264 to collect, record, organize, update or modify, retrieve, 
                                consult, use, consolidate, block. erase or destruct my personal data 
                                as may be required by the informed, object to processing, access and 
                                rectify my personal data, and be indemnified in case of damages pursuant 
                                to the provision of the Republic Act No. 10173 of the Philippines, 
                                Data Privacy Act of 2012 and its corresponding implementing Rules and Regulations.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                2. How can i request onsite?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p class="card-text">
                                You can request online by following these steps;
                            </p>
                            <ol class="card-text">
                                <li>
                                    Proceed to the barangay hall 
                                </li>
                                <li>
                                    Request a document to the Barangay Secretary make sure that 
                                    you have the certain requirements to process your request
                                </li>
                                <li>
                                    Once the Barangay Secretary approves your request, 
                                    wait and then claim your request 
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                3. When will i receive the document in the Barangay hall, if i request through online?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p class="card-text">
                                You can proceed to the barangay hall once it's already 
                                <strong><em>PROCESSED Status</em></strong> 
                                or the system <strong><em>notify</em></strong> you in your dashboard
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                4. How can I register through online?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p class="card-text">
                                You can register by following these steps;
                            </p>
                            <ol class="card-text">
                                <li>
                                    Click the Log In that located in navigation bar
                                </li>
                                <li>
                                    Click the register link
                                </li>
                                <li>
                                    Fill out the information needed make sure that your 
                                    email address is active then submit
                                </li>
                                <li>
                                    Then you will see that there's a notice that you need to 
                                    activate your account by clicking the activation link in your email
                                </li>
                                <li>
                                    Once you activate the link via email you will redirect to the portal dashboard 
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                5. Who will manage my data once i register through online?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p class="card-text">
                                The personal data obtained from this portal is entered and stored within the 
                                barangay system and will only be accessed by the Barangay Official specially 
                                the Secretary which a authorized personnel. The Barangay Secretary had instituted 
                                appropriate organizational, technical and physical security measures to ensure 
                                the protection of the residents personal data
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                6. How can I request in online?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p class="card-text">
                                You can request online by following these steps;
                            </p>
                            <ol class="card-text">
                                <li>
                                    Click Log in, in the navigation bar and if you haven't created an account, 
                                    click the link for register 
                                </li>
                                <li>
                                    Once you have logged in, select the barangay document that you want to request 
                                    and make sure you have one requirements that is needed then fill out the 
                                    forms then submit
                                </li>
                                <li>
                                    When you already have requested you will see the status of your documents 
                                    which it has different categories 
                                    <strong><em>PENDING, APPROVED, DENIED, PROCESSED, CANCELED, CLAIMED</em></strong> 
                                </li>
                                <li>
                                    <strong>Pending</strong> - Document status after you submit a request 
                                </li>
                                <li>
                                    <strong>Approved</strong> - When the Barangay Official approves your request 
                                </li>
                                <li>
                                    <strong>Denied</strong> - When the Barangay Official denied your request 
                                                                because of not being able to meet the certain requirements 
                                </li>
                                <li>
                                    <strong>Processed</strong> - When the Barangay Official already processed your request 
                                                                    and you can proceed to the barangay hall
                                </li>
                                <li>
                                    <strong>Claimed</strong> - When the Barangay Official acknowledged that you claimed 
                                                                    your request in the Barangay hall 
                                </li>
                                <li>
                                    <strong>Canceled</strong> - When you canceled your document request 
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12 mt-3 text-center">
                <p class="lead">
                    <a href="contact-us.html">Contact us</a>,
                    if you found not the right anwser or you have a other question?<br />
                </p>
            </div>
        </div> --}}
    </section>
</div>
