<div class="modal-dialog modal-lg modal-xl">
    <div class="modal-content">
        <div class="modal-header">

            <h3 class="modal-title pull-left">Register Yourself <span class="font-14">(As a Student)</span></h3>
            <div class="pull-right font-12 margin-top-10">
                * All fields are Mandatory
            </div>
        </div>
        <div class="modal-body">
            <div class="container-fluid padding-top-20">
                <div class="row">
                    <!-- upload file -->
                    <div class="col-md-6">
                        <div class="upload-details">
                            <div class="clearfix full-width">
                                <div class="pull-left upload-trainer-photo">
                                    <div class="trainer-profile-pic">
                                        <img alt="Profile Picture" class="rounded" id="image-1" src="images/default-user.png">
                                    </div>
                                    <span class="btn default btn-file hide">
                                        <span class="fileinput-new">
                                            Upload Photo
                                        </span>
                                        <input type="file" class="textbox fileupload fileInput btn-transparent" name="files" id="fileupload">
                                    </span>
                                </div>
                                <div class="pull-left upload-trainer-video hide">
                                    <div class="trainer-profile-pic">
                                        <img alt="Profile Picture" class="rounded" id="image-1" src="images/upload-video.png">
                                    </div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new">
                                            Upload Video
                                        </span>
                                        <input type="file" class="textbox fileupload btn-transparent" name="video" id="videoupload">
                                    </span>
                                </div>
                            </div>
                            <div class="trainer-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15134.631734819093!2d73.84777595!3d18.4991473!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1472983198842"

                                width="100%" height="168" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- ./ upload file -->
                    <!-- registration form for student-->
                    <div class="col-md-6 material">
                        <form id="frm_reg_student" class="stop-propagation registration-form">
                        <input type="hidden" name="register[user_type]" value="2">
                        <input type="hidden" name="register[status_id]" value="1">
                            <div class="stud_register_error"></div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">First Name <span>*</span></label>
                                        <input type="text" class="form-control" required="required" placeholder="Your First Name" name="register[first_name]">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">Last Name  <span class="req">*</span></label>
                                        <input type="text" class="form-control" required="required" placeholder="Your Last Name" name="register[last_name]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">Email ID  <span class="req">*</span></label>
                                        <input type="email" id="" class="form-control input-lg" placeholder="Enter Your Email ID" tabindex="3" name="register[email_id]">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">Mobile Number  <span class="req">*</span></label>
                                        <input type="text" id="js-stud_reg_mob" class="form-control input-lg" placeholder="Enter Your Mobile Number" tabindex="3" name="register[contact_number]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">Password  <span class="req">*</span></label>
                                        <input type="password" class="form-control" required="required" placeholder="Enter Password" name="register[password]">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">Confirm Password   <span class="req">*</span></label>
                                        <input type="password" class="form-control" required="required" placeholder="Enter Password" name="register[c_password]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">Enter City  <span class="req">*</span></label>
                                        <select name="register[city_id]" class="form-control" required="required">
                                            <option value="">Select city</option>
                                            <option value="1">Pune</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">Enter Pincode/ Areacode  <span class="req">*</span></label>
                                        <input type="text" class="form-control" required="required" placeholder="Enter Your Pincode" name="register[pin_code]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="control-label font-12 font-blue">Gender  <span class="req">*</span></label>
                                        <select name="register[gender_id]" class="form-control" required="required">
                                            <option value="">Select gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Not Disclosed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group full-width clearfix ">
                                <div class="checkbox pull-left">
                                    <input id="checkbox3" class="js-agree_terms" type="checkbox">
                                    <label for="checkbox3">
                                        I agree to your terms and conditions
                                    </label>
                                </div>
                                <button type="submit" disabled="disabled" class="btn btn-primary-blue pull-right js-btn_reg_student">
                                     Submit
                                </button>
                                <button type="submit" class="btn btn-secondary pull-right margin-right-5">
                                     Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- ./ registration form for student-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="full-width promotional-space border-top-1 margin-top-20">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
