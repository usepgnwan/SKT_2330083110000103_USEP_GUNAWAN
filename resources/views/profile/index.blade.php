<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="csrf-token" content="{{ @csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('partial.js');
</head>
<body>
    <main id="main-component"> 
        {{-- HEADER --}}

        <div class="container mt-5">
            @include('partial.header');

            <div class="row d-flex justify-content-center">
                <div class="col-xl-4">

                    <div class="card">
                      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">  
                        <img src="{{ $profile['image'] }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $profile['name'] }}</h2>
                        <h5>{{ $profile['no_peserta'] }}</h5>
                        <div class="row d-flex justify-content-center">
                          <div class="col-2">Hobi</div>
                          <div class="col-10">{{ $profile['hobi'] }}</div> 
                          <div class="col-2">Alamat</div>
                          <div class="col-10">{{ $profile['alamat'] }}</div>
                          <div class="col-10">
                            <a href="{{ $profile['repository'] }}" class="btn btn-success" target="_blank"><i class="bi bi-github"></i> View the repository</a> 
                          </div>
                        </div>
                      </div>
                    </div>
          
                  </div>
            </div>
        </div>
 
    </main> 
    @include('partial.css');
</body>
</html>