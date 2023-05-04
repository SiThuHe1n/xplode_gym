<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
   <img src="{{ asset('logo.png') }}" class="logo_img" alt="">
<hr>
<table class="table table-borderless">
    <tr>
        <td>
        Invoice -   {{ $member_section->code }}
        </td>
        <td style="text-align:end;">
        Member -  {{ $member_section->member->code }}
        </td>
    </tr>
    <tr>
        <td>
        Name - {{ $member_section->member->name }}
        </td>
        <td style="text-align:end;">
            @if($member_section->trainer_id)
        PT - {{ $member_section->trainer->name }}
        @endif
        </td>
    </tr>
</table>
<table class="table">
    <thead>
        <tr>
            <th>Description</th>
            <th>QTY</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @if($member_section->package_id)
        <tr>
            <td>Member Type </td>
            <td>@if($member_section->package->month) {{ $member_section->package->month }} Months @endif @if($member_section->package->day) {{ $member_section->package->day }} Days @endif </td>
            <td>{{ $member_section->package->cost }} MMK </td>
        </tr>
        @endif
        @if($member_section->trainer_section)
        <tr>
            <td>Section</td>
            <td>{{ $member_section->section->time }} hrs </td>
            <td>{{ $member_section->section->cost }}</td>
        </tr>
        @endif

    </tbody>

</table>
<hr>
    <div class="row d-flex justify-content-end">
        <div class="col-4">
            <table class="table table-borderless">
                <tr>
                    <td>
                        Subtotal
                    </td>
                    <td>
                        {{ $member_section->amount+$member_section->amount2 }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Discount
                    </td>
                    <td>
                        0
                    </td>
                </tr>
                <tr>
                    <td>
                        Tax
                    </td>
                    <td>
                        0
                    </td>
                </tr>
                <tr>
                    <td>
                        Total
                    </td>
                    <td>
                        {{ $member_section->amount+$member_section->amount2 }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <h5 class="text-center">Hotline: 09-12345678 , 09-12345678</h5>
    <h5 class="text-center">Address: No (1) ABC Road  ,CD Township, Yangon</h5>

   <style>
    .logo_img{
        width: 50vw;
        height:100px;
        object-fit: contain;
        left: 25vw;
        right: 25vw;
        position: relative;

    }
   </style>
   <script>
    window.print();
window.onafterprint = function(event) {
    window.location.href = '{{ $route }}'
};

   </script>
</body>
</html>
