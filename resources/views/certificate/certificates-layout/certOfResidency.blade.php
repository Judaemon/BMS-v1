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

        .image2{
            width: 20%;
        }

        img{
            max-width: 150px;
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
    <div style="padding: 0px 46px">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td class="text-right image1">
                        <div>
                                 {{-- src="{{ public_path("/images/mitacor_logo.png") }}" --}}
                                 {{-- public\images\mitacor_logo.png --}}
                            {{-- <img src="{{ base_path() }}\public\images\mitacor_logo.png" alt="image 1"> --}}
                            {{-- <img src="{{ url("/images/mitacor_logo.png") }}" alt="image 1"> --}}
                            <img src="{{ public_path("/images/mitacor_logo.png") }}" alt="image 1">
                            {{-- <img src="{{ URL::asset('images\mitacor_logo.png') }}" alt="image 1"> --}}
                        </div>
                    </td>
                    <td class="text-center headerText">
                        Republic of the philipines<br>
                        Province of {Benguet}<br>
                        Municipality of {Baguio}<br>
                        <span class="text-bold text-capital mb-4">Barangay {Santo Tomas}</span><br>
        
<br>                        
                        <span class="text-bold text-capital">OFFICE OF THE {BARANGAY CAPTAIN}</span>
                    </td>
                    <td class="text-left image2">
                        {{-- <img src="{{ URL::asset('images\mitacor_logo.png') }}" alt="image 1"> --}}

                        {{-- <img src="{{ URL::asset('images/mitacor_logo.png') }}" alt="image 2"> --}}
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
            <p class="indent">This is to certify that {John Ray Judaya}, {21} years old, {single} and filipino citizen is <span class="text-bold text-capital">resident</span> of Barangay {Santo Tomas}, {Baguio City}, {Benguet}. </p>

            <p class="indent">Based on records of this office, {He} has been residing at Barangay {Santo Tomas}, {Baguio City}, {Benguet}. </p>

            <p class="indent">This <span class="text-bold text-capital">Certification</span> is being issued upon the request of the above-named person for whatever legal pupose it may serve.</p>

            <p class="indent">Issued on  {date} at Barangay {Santo Tomas}, {Baguio City}, {Benguet}, Philipines.</p>
        </div>

        <div>
            <div style="float: left; width: 60%">&nbsp;</div>
            <div style="float: right; width: 40%">
                <table style="width: 100%">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <p class="text-center">{Barangay Captain Name}</p>
                            <p class="text-center">{Punong Barangay}</p>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="margin-bottom: 20px">&nbsp;</div>

        <div>
            <p>Note:</p>
            <p>***This is a computer-generated document. No signature is required***</p>
        </div>
    </div>
</body>
</html>