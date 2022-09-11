<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Certificate of residency</title>

    <!-- Bootstrap core CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

    <style>
        .text-right {
            text-align: right;
        }
        
        .text-left {
            text-align: left;
        }
        .text-center {
            text-align: center;
        }

        .image1{
            width: 20%;
        }

        .headerText{
            width: 60%;
        }

        /* .headerText p{
            margin-bottom: 2px;
        } */

        .text-capital{
            text-transform: uppercase;
        }

        .text-bold{
            font-weight: bold;
        }

        .text-underline{
            text-decoration: underline;
        }

        .image2{
            width: 20%;
        }

        img{
            max-width: 130px;
            height: auto;
        }

        .mb-4{
            margin: 0px 0px 0px 0px;
        }

        .indent{
            text-indent: 50px;
        }

        p{
            font-size: 14px;
        }
    </style>

</head>
<body style="background: white">
    <div style="padding: 0px 36px">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td class="text-right image1">
                        <div>
                            <img src="{{ public_path("/images") }}{{ $systemSetting->province_municipality_logo}}" alt="image 1">
                        </div>
                    </td>
                    <td class="text-center headerText">
                        Republic of the Philippines<br>

                        @if ($systemSetting->isprovince)
                        Province of
                        @else
                        Municipality of 
                        @endif
                        {{$systemSetting->province_municipality}}<br>
                        
                        City of {{$systemSetting->city}}<br>
                        <span class="text-bold text-capital mb-4">Barangay {{ $systemSetting->barangay}}</span><br>
        
<br>                        
                        <span class="text-bold text-capital">OFFICE OF THE {{$certificate->office}}</span>
                    </td>
                    <td class="text-left image2">
                        <img src="{{ public_path("/images") }}{{ $systemSetting->province_municipality_logo}}" alt="image 2">
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 class="text-center text-bold text-capital">Certificate of residency</h2>

        <div style="margin-bottom: 5px">&nbsp;</div>

        <div>
            <p class="text-bold text-capital">To whom it may concern:</p>
        </div>

        <div>
            <p class="indent">This is to certify that <span class="text-bold">{{$user->firstname}} {{$user->lastname}}</span>, <span class="text-bold">{{$user->age()}}</span> years old, <span class="text-bold">{{$user->civil_status}}</span> and filipino citizen is <span class="text-bold text-capital">resident</span> of Barangay <span class="text-bold">{{ $systemSetting->barangay }}</span>, <span class="text-bold">{{ $systemSetting->city }}</span>, <span class="text-bold">{{ $systemSetting->province_municipality }}</span>. </p>

            <p class="indent">Based on records of this office, <span class="text-bold">{{$user->firstname}} {{$user->lastname}}</span> has been residing at Barangay <span class="text-bold">{{ $systemSetting->barangay }}</span>, <span class="text-bold">{{ $systemSetting->city }}</span>, <span class="text-bold">{{ $systemSetting->province_municipality }}</span>. </p>

            <p class="indent">This <span class="text-bold text-capital">Certification</span> is being issued upon the request of the above-named person for whatever legal pupose it may serve.</p>

            <p class="indent">Issued on  {{ $dateToday }} at Barangay <span class="text-bold">{{ $systemSetting->barangay }}</span>, <span class="text-bold">{{ $systemSetting->city }}</span>, <span class="text-bold">{{ $systemSetting->province_municipality }}</span>, Philippines.</p>
        </div>

        <br>
        <br>
        <br>
        
        <div>
            <div style="float: left; width: 50%">&nbsp;</div>
            <div style="float: right; width: 50%">
                <table style="width: 100%">
                    <tbody>
                        <tr style="padding: 5px;">
                            <p class="text-center">
                                <span class="text-underline text-bold">{{$barangay_captain->firstname}}  {{$barangay_captain->lastname}}</span>
                                <br>
                                <span >{{$barangay_captain->barangay_position}}</span>
                            </p>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="margin-bottom: 20px">&nbsp;</div>
<br>
<br>
<br>
<br>
        <div>
            <p>Note:</p>
            <p>***This is a computer-generated document. No signature is required***</p>
        </div>
    </div>
</body>
</html>