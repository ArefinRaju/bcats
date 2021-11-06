<div class="card mt-4">
    <div class="card-header">
        <h4>Admission Form</h4>
    </div>
    <div class="row p-0 m-0">
        <div class="col-md-5">
            <div class="faq-accordion position-relative">
                <div class="login-input card_view w-100">
                    <form action="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mb-3 form-control border-0">
    
                                <div class="getadmission">
                                    <p for="email">কোচিং আইডি: {{ $admission->coaching_no }}</p>
                                    <p for="email">কোচিং এর নাম: {{ $admission->user->name }}</p>
                                    <p for="email">এডমিশন নাম: {{ $admission->admission_name }}</p>
                                    <p for="salary">বেতনের ধরণ: {{ $admission->fees_type }}</p>
                                    <p for="salary">বেতন: {{ $admission->monthly_fees }}</p>
                                    <p for="address">শেষ সময়:
                                        {{ \Carbon\Carbon::parse($admission->expire_date)->format('d/m/Y') }}</p>
    
                                    <a href="javascript:void(0)"
                                        onclick="searchBtn(false,'form_section','id_search','bottom_input')"
                                        class="d-block text-center my-0 sign-in-btn rounded">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    
        <div class="col-md-7">
            <div class="faq-accordion position-relative pt-4">
                <form action="{{ route('get-admission') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="position-absolute" id="bottom_input">
                        <div class="me-3 input-box">
                            <label for="class">Class</label>
                            <select name="class_id" id="class" >
                                <option value="{{ $admission->class_id }}">{{ $admission->className->class_name }}</option>
                            </select>

                            <input type="hidden" name="class_id" value="{{ $admission->class_id }}">
    
                            <label for="name">Your name</label>
                            <input placeholder="Your Name" type="text" name="name" id="name">
    
                            <label for="gName">Guardian  name</label>
                            <input placeholder="Guardian Name" type="text" name="gname" id="gName">
                            
                            <label for="birth_date">Birth  date</label>
                            <input type="date" name="birth_date" id="birth_date" style="cursor: pointer;">
    
                            <label for="address">Your Address</label>
                            <textarea placeholder="Your Address" name="address" id="address"></textarea>
    
                        </div>
                        <div>
                            <label for="section">Section</label>
                            <select name="section_id" id="section" >
                                <option value="{{ $admission->section_id }}">{{ $admission->section->section_name }}</option>
                            </select>

                            <input type="hidden" name="section_id" value="{{ $admission->section_id }}">
    
                            <label for="mobile">Your mobile</label>
                            <input placeholder="Your Mobile" type="text" name="mobile" id="mobile">
    
                            <label for="mobile">Guardian mobile</label>
                            <input placeholder="Guardian Mobile" type="text" name="gmobile" id="mobile">
    
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender">
                                <option selected value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
    
                            <label for="profile">Upload photo</label>
                            <input type="file" name="profile" id="profile">
    
                            <input type="hidden" name="admission_id" id="hidden_id">
                            <button type="submit" class="sign-in-btn rounded m-0">Get Admission</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

