<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/rupplogo.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/rupplogo.png')}}">
    <title>RUPP ID E-Card</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    @if ($data['status'] === 'Active')
        <div class="zoom-container">
            <div class="container">
                <div class="padding">
                    <div class="IdCard">
                        <img class="IdCard" src="/img/rupp.svg" alt="image">
                        <div class="top">
                            <div class="profile-user">
                                @if (!$data['image']|| $data['image'] === 'null' || $data['image'] === 'empty')
                                    <img src="/img/avatar.jpg" class="card-img-top" alt="image">
                                @else
                                    <img src="http://staff-system.rupp.edu.kh/{{ $data['image'] }}" class="card-img-top" alt="image">
                                @endif
                            </div>
                        </div>
                        <div class="ename">
                            <h4 class="department-font">{{ $data['custom_place_of_work'] }}</h4>
                            <div class="position">
                                <h4 class="name-font">{{ $data['custom_khmer_name'] }}&nbsp;</h4>
                            </div>
                            <h4 class="department-font">{{ $data['custom_position'] }}</h4>
                        </div>
                        <div class="edetails">
                            <div class="inline-div">
                                <h5 class="user-info" id="user-id">
                                    អត្តលេខ <b class="b-user-id">៖</b> {{ $data['custom_rupp_id'] }}
                                </h5>
                                <h5 class="user-info" id="user-gender">
                                    ភេទ <b class="b-user-gender">៖</b> {{ $data['gender'] }}
                                </h5>
                            </div>
                            <div class="inline-div">
                                <h5 class="user-info2">
                                    ផុតកំណត់ប្រើ
                                </h5>
                                <h5 class="custom-expdate user-info2"></h5>
                                <script>
                                    const dateStr = "{{ $data['custom_expdate'] }}";
                                    const date = new Date(dateStr);
                                    const month = String(date.getMonth() + 1).padStart(2, '0');
                                    const year = date.getFullYear();
                                    const formattedDate = `${month} / ${year}`;
                                    document.querySelector('.custom-expdate').textContent = formattedDate;
                                </script>
                            </div>
                        </div>
                        <div class="footer">
                            <p>Technology by IT Center</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</body>
</html>
