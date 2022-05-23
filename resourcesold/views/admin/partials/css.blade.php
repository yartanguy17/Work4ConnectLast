<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('assets/front/images/resources/logo.png') }}">

<!-- DataTables -->
<link href="{{asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

<!-- Responsive datatable examples -->
<link href="{{asset('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{asset('assets/admin/libs/chartist/chartist.min.css') }}" rel="stylesheet">

<!-- Bootstrap Css -->
<link href="{{asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="{{asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('css/intlTelInput.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/btn.css') }}"> --}}
<style>

    .iti { width: 100%; }

    .iti__flag {background-image: url("{{asset('images/flags.png') }}");}

    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .iti__flag {background-image: url("{{asset('images/flags@2x.png') }}");}
    }

    .change-photo-btn {
        background-color: #626ed4;
        border-radius: 50px;
        color: #fff;
        cursor: pointer;
        display: block;
        font-size: 13px;
        font-weight: 600;
        margin: 0 auto;
        padding: 10px 15px;
        position: relative;
        transition: .3s;
        text-align: center;
        width: 220px;
    }
    .change-photo-btn input.upload {
        bottom: 0;
        cursor: pointer;
        filter: alpha(opacity=0);
        left: 0;
        margin: 0;
        opacity: 0;
        padding: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: 220px;
    }

    .change-avatar {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }
    .change-avatar .profile-img {
        margin-right: 15px;
    }
    .change-avatar .profile-img img {
        border-radius: 4px;
        height: 100px;
        width: 100px;
        object-fit: cover;
    }
    .change-avatar .change-photo-btn {
        margin: 0 0 10px;
        width: 150px;
    }
</style>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
</script>
