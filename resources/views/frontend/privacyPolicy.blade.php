@extends('layouts.frontend-master')
@section('title')
    পলিসি | আমার স্টুডেন্ট
@endsection
@section('styles')
    <style>
        .privacy-details .content-heading {
            padding-bottom: 30px;
        }

        .privacy-details .content-heading .content-heading-title {
            text-decoration: underline;
        }

        .privacy-details .content-heading .content-para br {
            padding-bottom: 15px;
        }

    </style>
@endsection
@section('content')

    <section class="blog-details-area ptb-80 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="privacy-details">
                        <div class="content-title pb-5">
                            <h1 class=" title text-center">Privacy Policy</h1>
                        </div>
                        <div class="content-heading">
                            <p class="content-para">Below we set out our privacy policy which will govern the way in
                                which we process any personal information that you provide to us. We will notify you if the
                                way in which we process your information is to change at any time.</p>
                            <p class="content-para">You can access our home page and browse our site without disclosing
                                your personal data save information collected by cookies that we use (see below).</p>
                        </div>

                        <div class="content-heading">
                            <h4 class="content-heading-title">Who may process data?</h4>
                            <p class="content-para">Your personal information (which includes your name, address and any
                                other details you provide to us which concern you as an individual) may be processed both by
                                us and by other companies within our group. Our website also includes a link to Rackspace
                                and such company may collect personal data about visitors to our site. Each of the companies
                                authorized to process your information as mentioned above will do so in accordance with this
                                privacy policy.</p>
                        </div>

                        <div class="content-heading">
                            <h4 class="content-heading-title">Legal Requirements</h4>
                            <p class="content-para">Bcats may disclose your Personal Data in the good faith belief that
                                such action is necessary to:</p>
                            <p class="content-para mt-1">
                                <span class=" mt-1">• To comply with a legal obligation <span><br>
                                        <span class=" mt-1">• To protect and defend the rights or property of Byno
                                            Tech <span><br>
                                                <span class=" mt-2">• To prevent or investigate possible wrongdoing
                                                    in connection with the Service<span><br>
                                                        <span class=" mt-3">• To protect the personal safety of
                                                            users of the Service or the public <span><br>
                                                                <span class=" mt-3">• To protect against legal
                                                                    liability <span><br>

                            </p>
                        </div>

                        <div class="content-heading">
                            <h4 class="content-heading-title">Purpose of processing</h4>
                            <p class="content-para">We will use your information for the purpose of fulfilling service
                                orders placed by you, processing any other transactions authorized or made by you with us,
                                informing you of special offers and providing other marketing information to you which we
                                think you may find of interest, undertaking services or customer research/development. </p>

                        </div>

                        <div class="content-heading">
                            <h4 class="content-heading-title">Disclosure of information</h4>
                            <p class="content-para">In the unlikely event that a liquidator, administrator or receiver is
                                appointed over us or all or any part of our assets that insolvency practitioner may transfer
                                your information to a third party purchaser of the business provided that purchaser
                                undertakes to use your information for the same purposes as set out in this policy. We
                                undertake not to provide your personal information to third parties save in accordance with
                                this policy. Your information will not be disclosed to government or local authorities or
                                other government institutions save as required by law or other binding regulations.</p>
                        </div>

                        <div class="content-heading">
                            <h4 class="content-heading-title">Children’s Privacy</h4>
                            <p class="content-para">Our Service does not address anyone under the age of 18
                                (“Children”).We do not knowingly collect personally identifiable information from anyone
                                under the age of 18. If you are a parent or guardian and you are aware that you’re Children
                                has provided us with Personal Data, please contact us. If we become aware that we have
                                collected Personal Data from children without verification of parental consent, we take
                                steps to remove that information from our servers.</p>
                        </div>

                        <div class="content-heading">
                            <h4 class="content-heading-title">Cookies</h4>
                            <p class="content-para">We may send a small file to your computer when you visit our website.
                                This will enable us to identify your computer, track your behavior on our website and to
                                identify your particular areas of interest so as to enhance your future visits to this
                                website. We may use cookies to collect and store personal data and we link information
                                stored by cookies with personal data you supply to us. Save for the use of cookies, we do
                                not automatically log data or collect data save for information you specifically provide to
                                us. You can set your computer browser to reject cookies but this may preclude your use of
                                certain parts of this website.</p>
                            <p class="content-para">Third party vendors, including Google, use cookies to serve ads based
                                on a user's prior visits to your website. Google's use of the DART cookie enables it and its
                                partners to serve ads to your users based on their visit to your sites and/or other sites on
                                the Internet. Users may opt out of the use of the DART cookie by visiting the <a
                                    href="#">advertising opt-out page.</a></p>
                        </div>

                        <div class="content-heading">
                            <h4 class="content-heading-title">Security measures</h4>
                            <p class="content-para">We have implemented security policies, rules and technical measures to protect the personal data that we have under our control from unauthorized access, improper use and disclosure, unauthorized destruction or accidental loss.</p>
                           
                        </div>
                        
                        <div class="content-heading">
                            <h4 class="content-heading-title">Access to information</h4>
                            <p class="content-para">You may ask us whether we are storing personal information about you by emailing our admin department via the Contact page and, if you wish and upon payment of a fee of $09, we will provide you with a copy of the personal data we hold about you by email. We may ask for proof of your identity before providing any information and reserve the right to refuse to provide information requested if identity is not established.</p>
                        </div>
                        
                        <div class="content-heading">
                            <h4 class="content-heading-title">Copyright</h4>
                            <p class="content-para">All website design, text, graphics, the selection and arrangement thereof are Copyright © 2016, bcats.net, ALL RIGHTS RESERVED.</p>
                        </div>
                       
                        <div class="content-heading">
                            <h4 class="content-heading-title">Trademarks</h4>
                            <p class="content-para">Bcats.netis a trademark of BCATS or its subsidiaries and may be registered in certain parts of the world.</p>
                        </div>
                        
                        <div class="content-heading">
                            <h4 class="content-heading-title">Disclaimer of Warranty and Liability</h4>
                            <p class="content-para">The following provisions may be curtailed or disallowed by the laws of certain jurisdictions. In such case, the terms hereof are to be read as excluding or limiting such term so as to satisfy such law.</p>
                            <p class="content-para">We do not represent or warrant that the information accessible via this website is accurate, complete or current. We have no liability whatsoever in respect of any use which you make of such information.</p>
                            <p class="content-para">The information provided on this website has not been written to meet your individual requirements and it is your sole responsibility to satisfy yourself prior to ordering any products or services from us that they are suitable for your purposes.</p>
                            <p class="content-para">Whilst we make all reasonable attempts to exclude viruses from the website, we cannot ensure such exclusion and no liability is accepted for viruses. Thus, you are recommended to take all appropriate safeguards before downloading information or images from this website.</p>
                            <p class="content-para">All warranties, express or implied, statutory or otherwise are hereby excluded.</p>
                            <p class="content-para">Neither we nor any of our employees or affiliated entities will be liable for any kind of damages and howsoever arising including, without limitation, loss of profits, compensatory, consequential, direct, exemplary, incidental, indirect, punitive or special, damages or any liability which you may have to a third party, even if we have been advised of the possibility of such loss.We are not responsible for the direct or indirect consequences of you linking to any other website from this website.</p>
                        
                        </div>
                        
                        <div class="content-heading">
                            <h4 class="content-heading-title">Consent and inquiries</h4>
                            <p class="content-para">In order to access the information on this website, you must signal acceptance of the terms and disclaimer set out above. If you do not accept any of these terms, leave this website now. If you have any enquiry or concern about our privacy policy or the way in which we are handling personal data please contact our admin department via the Contact page. If at any time you wish us to cease processing your information please send a message to our admin department and insert "unsubscribe" as the subject heading</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
@endsection
