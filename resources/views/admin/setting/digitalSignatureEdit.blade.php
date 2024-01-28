@extends('admin.master.master')

@section('title')
ডিজিটাল স্বাক্ষর
@endsection


@section('body')
<style>
.image-preview-container {
    width: 50%;
    margin: 0 auto;
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 3rem;
    border-radius: 20px;
}

.image-preview-container img {
    width: 100%;
    display: none;
    margin-bottom: 30px;
}


.image-preview-container input {
    display: none;
}

.login_upload_button{
    display: block;
    width: 45%;
    height: 45px;
    margin-left: 25%;
    text-align: center;
    background: #24695c;
    color: #fff;
    font-size: 15px;
    text-transform: Uppercase;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}





<style>
.image-preview-container1 {
    width: 50%;
    margin: 0 auto;
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 3rem;
    border-radius: 20px;
}

.image-preview-container1 img {
    /* width: 100%; */

    margin-bottom: 30px;
}


.image-preview-container1 input {
    display: none;
}

.image-preview-container1 label {
    display: block;
    width: 45%;
    height: 45px;
    margin-left: 25%;
    text-align: center;
    background: #24695c;
    color: #fff;
    font-size: 15px;
    text-transform: Uppercase;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>
<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>ডিজিটাল স্বাক্ষর  </h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
            <li class="breadcrumb-item">ডিজিটাল স্বাক্ষর </li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>

        </div>
      </div>
    </div>
    <div class="container-fluid">






        <div class="edit-profile">
            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h4 class="card-title mb-0">ডিজিটাল স্বাক্ষর পরিবর্তন করুন </h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                  </div>
                  <div class="card-body">
                    {{-- //@include('flashMessage') --}}

                    @if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
</div>
@endif

@if ($errors->has('digital_signature'))
<span class="text-danger">{{ $errors->first('digital_signature') }}</span>
@endif

<br>
@if ($errors->has('digital_seal'))
<span class="text-danger">{{ $errors->first('digital_seal') }}</span>
@endif
                                            <form action="{{ route('digitalSignatureUpdate') }}" method="post" enctype="multipart/form-data" id="form">
                                                @csrf


                                                <input type="hidden" value="{{ Auth::guard('admin')->user()->id }}" name="id" />


    <div class="nvisa-avatar">
        @if(empty(Auth::guard('admin')->user()->admin_sign))
                      <center>  <img src="{{ asset('/') }}public/sign/demo.jpg" alt="" id="output"> </center>
                      @else
                      <center>  <img src="{{ asset('/') }}{{ Auth::guard('admin')->user()->admin_sign }}" alt="" id="output"> </center>
                      @endif
                    </div>
                    <input type="file" accept=".png"
                    onchange="loadFile(event)" name="digital_signature" required id="upload" hidden/>
             <label class="login_upload_button btn btn-registration"  for="upload">ছবি নির্বাচন করুন</label>



                                                <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
                                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                    <div style="color:black !important">
                                                        প্রোফাইল স্বাক্ষর অবশ্যই ৩০০ X ৮০ পিক্সেল (প্রস্থ X উচ্চতা ) এবং ফাইল এর আকার অবশ্যই ৬০ কিলো বাইটের কম এবং PNG ফরমেটে হতে হবে
                                                    </div>
                                                  </div>


                                                <div class="form-footer">
                                                    <button type="submit" class="btn btn-primary btn-block">আপডেট করুন</button>
                                                  </div>
                                                  <small id="digital_signature_text" class="text-danger mt-2" style="font-size:12px;"></small>


                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>






    </div><!-- container-fluid -->
</div><!-- End Page-content -->
@endsection

@section('script')
<script>
    $(function(){


$('#upload').on('change', function(e) {
    let size = this.files[0].size;



    if (size > 60000) {
        $('#digital_signature_text').text('Please Upload Maximum 60 KB File');
    }else{
        $('#digital_signature_text').text('');
    }
});
});
</script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<script>
    /**
 * Create an arrow function that will be called when an image is selected.
 */
const previewImage = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};
</script>
@endsection

