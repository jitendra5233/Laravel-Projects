@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection
<style>
  .error{
    color:red;
  }
</style>
@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Settings </span>
</h4>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      {{-- <h5 class="card-header">Homepage Settings</h5> --}}
      <!-- Account -->
      <form id="formAccountSettings" action="{{ENV('APP_URL')}}/updatehomepage" method="post" onsubmit="return settingformsubmit()" enctype="multipart/form-data">
      @foreach($tableData as $row)
        @csrf
      <div class="card-body">
          <div class="row">
            <div class="mb-3 col-md-12">
              <h5 class="card-header p-0 my-3">Homepage</h5>
            </div>
            
            <div class="mb-3 col-md-12">
              <h5 class="card-header p-0 my-3">Card Section</h5>
            </div>

            <div class="mb-3 col-md-6">
              <label for="h1" class="form-label">Heading</label>
              <input class="form-control" type="text" id="h1" name="h1" value="{{$row->h1}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="s1" class="form-label">Sub Heading</label>
              <input class="form-control" type="text" name="s1" id="s1" value="{{$row->s1}}" />
            </div>
            
            <div class="mb-3 col-md-6">
              <h6 class="card-header p-0 mb-2">Card 1</h6>
            </div>
            
            <div class="mb-3 col-md-6">
              <h6 class="card-header p-0 mb-2">Card 2</h6>
            </div>

            <div class="mb-3 col-md-6">
              <label for="s1" class="form-label">Image</label>
              <input class="form-control" type="file" id="formFile" name="file1" >
              <input class="form-control" type="hidden" id="filename1" name="filename1" value="{{$row->img1}}" >
            </div>

            <div class="mb-3 col-md-6">
              <label for="s1" class="form-label">Image</label>
              <input class="form-control" type="file" id="formFile" name="file2" >
              <input class="form-control" type="hidden" id="filename2" name="filename2" value="{{$row->img2}}" >
            </div>

            <div class="mb-3 col-md-6">
              <label for="microtitle1" class="form-label">Micro Title</label>
              <input class="form-control" type="text" name="microtitle1" id="microtitle1" value="{{$row->microtitle1}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="microtitle2" class="form-label">Micro Title</label>
              <input class="form-control" type="text" name="microtitle2" id="microtitle2" value="{{$row->microtitle2}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="cardheading1" class="form-label">Card Heading</label>
              <input class="form-control" type="text" name="cardheading1" id="cardheading1" value="{{$row->cardheading1}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="cardheading2" class="form-label">Card Heading</label>
              <input class="form-control" type="text" name="cardheading2" id="cardheading2" value="{{$row->cardheading2}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="cardsubheading1" class="form-label">Card Sub Heading</label>
              <input class="form-control" type="text" name="cardsubheading1" id="cardsubheading1" value="{{$row->cardsubheading1}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="cardsubheading2" class="form-label">Card Sub Heading</label>
              <input class="form-control" type="text" name="cardsubheading2" id="cardsubheading2" value="{{$row->cardsubheading2}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="buttontext1" class="form-label">Button Text</label>
              <input class="form-control" type="text" name="buttontext1" id="buttontext1" value="{{$row->buttontext1}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="buttontext2" class="form-label">Button Text</label>
              <input class="form-control" type="text" name="buttontext2" id="buttontext2" value="{{$row->buttontext2}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="btnlink1" class="form-label">Button Link</label>
              <input class="form-control" type="text" name="btnlink1" id="btnlink1" value="{{$row->btnlink1}}" />
            </div>

            <div class="mb-3 col-md-6">
              <label for="btnlink2" class="form-label">Button Link</label>
              <input class="form-control" type="text" name="btnlink2" id="btnlink2" value="{{$row->btnlink2}}" />
            </div>

            <div class="mb-3 col-md-12">
              <h5 class="card-header p-0 my-3">Property Type Section</h5>
            </div>

            <div class="mb-3 col-md-6">
              <label for="h2" class="form-label">Heading</label>
              <input class="form-control" type="text" id="h2" name="h2" value="{{$row->h2}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="s2" class="form-label">Sub Heading</label>
              <input class="form-control" type="text" name="s2" id="s2" value="{{$row->s2}}" />
            </div>

            <div class="mb-3 col-md-12">
              <h5 class="card-header p-0 my-3">Project Section</h5>
            </div>

            <div class="mb-3 col-md-6">
              <label for="h3" class="form-label">Heading</label>
              <input class="form-control" type="text" id="h3" name="h3" value="{{$row->h3}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="s3" class="form-label">Sub Heading</label>
              <input class="form-control" type="text" name="s3" id="s3" value="{{$row->s3}}" />
            </div>

            <div class="mb-3 col-md-12">
              <h5 class="card-header p-0 my-3">Footer Section</h5>
            </div>

            <div class="mb-3 col-md-12">
              <label for="s3" class="form-label">Description</label>
              <textarea class="form-control" name="footer_desc" id="footer_desc">{{$row->footer_desc}}</textarea>
            </div>

            <div class="mb-3 col-md-6">
              <label for="s3" class="form-label">Calling Number</label>
              <input class="form-control" type="text" name="c_number" id="c_number" value="{{$row->c_number}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="s3" class="form-label">What's App Number</label>
              <input class="form-control" type="text" name="w_number" id="w_number" value="{{$row->w_number}}" />
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2" >Save changes</button>
          </div>
        </form>
        @endforeach
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
  settingformsubmit = () =>
  {

        var h1 = document.getElementById('h1').value;
        var s1 = document.getElementById('s1').value;
        var microtitle1 = document.getElementById("microtitle1").value;
        var microtitle2 = document.getElementById("microtitle2").value;
        var cardheading1 =document.getElementById('cardheading1').value;
        var cardheading2 =document.getElementById('cardheading2').value;
        var cardsubheading1 =document.getElementById('cardsubheading1').value;
        var cardsubheading2 =document.getElementById('cardsubheading2').value;
        var buttontext1 =document.getElementById('buttontext1').value;
        var buttontext2 =document.getElementById('buttontext2').value;
        var btnlink1 =document.getElementById('btnlink1').value;
        var btnlink2 =document.getElementById('btnlink2').value;
        var h2 = document.getElementById('h2').value;
        var s2 = document.getElementById('s2').value;
        var h3 = document.getElementById('h3').value;
        var s3 = document.getElementById('s3').value;
        var footer_desc =document.getElementById('footer_desc').value;
        var c_number =document.getElementById('c_number').value;
        var w_number =document.getElementById('w_number').value;
        
        $(".error").remove();
    if (h1.length < 1) {
    $('#h1').after('<span class="error">This field is required*</span>');
    return false;
    }

    if (s1.length < 1) {
    $('#s1').after('<span class="error">This field is required*</span>');
    return false;
    }
  
    if (microtitle1.length < 1) {
    $('#microtitle1').after('<span class="error">This field is required*</span>');
    return false;
    }
  
    if (microtitle2.length < 1) {
    $('#microtitle2').after('<span class="error">This field is required*</span>');
    return false;
    }
  
    if (cardheading1.length < 1) {
    $('#cardheading1').after('<span class="error">This field is required*</span>');
    return false;
    }
  
    if (cardheading2.length < 1) {
    $('#cardheading2').after('<span class="error">This field is required*</span>');
    return false;
    }
  
    if (cardsubheading1.length < 1) {
    $('#cardsubheading1').after('<span class="error">This Field is required*</span>');
    return false;
    }
    if (cardsubheading2.length < 1) {
    $('#cardsubheading2').after('<span class="error">This Field is required*</span>');
    return false;
    }
    if (buttontext1.length < 1) {
    $('#buttontext1').after('<span class="error">This Field is required*</span>');
    return false;
    }
    if (buttontext2.length < 1) {
    $('#buttontext2').after('<span class="error">This Field is required*</span>');
    return false;
    }
    if (btnlink1.length < 1) {
    $('#btnlink1').after('<span class="error">This Filed is required*</span>');
    return false;
    }
   
    if (btnlink2.length < 1) {
    $('#btnlink2').after('<span class="error">This Filed is required*</span>');
    return false;
    }

    if (h2.length < 1) {
    $('#h2').after('<span class="error">This Filed is required*</span>');
    return false;
    }

    if (s2.length < 1) {
    $('#s2').after('<span class="error">This Filed is required*</span>');
    return false;
    }
    if (h3.length < 1) {
    $('#h3').after('<span class="error">This Filed is required*</span>');
    return false;
    }

    if (s3.length < 1) {
    $('#s3').after('<span class="error">This Filed is required*</span>');
    return false;
    }

    if (footer_desc.length < 1) {
      $('#footer_desc').after('<span class="error">This field is required*</span>');
      return false;
    }
    
    if (c_number.length < 8 || c_number.length > 13 ) {
      $('#c_number').after('<span class="error">Contact number Length Should be in Between 8 To 13 Digit*</span>');
      return false;
    }

    if (w_number.length < 8 || w_number.length > 13 ) {
      $('#w_number').after('<span class="error">Whatsapp number Length Should be in Between 8 To 13 Digit*</span>');
      return false;
    }

    else{
    Swal.fire({
                title: "Thankyou!",   
                text: "Setting Update Successfully !",   
                type: "success", 
                showConfirmButton: false, 
                allowOutsideClick: false, 
                timer: 4000,
           });
           return true;
    }  
  }
  
</script>

@endsection
