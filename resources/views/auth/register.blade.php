<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- tambahkan css dari file style.css  -->
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">

    <body>
        <section class="h-100 h-custom gradient-custom-2">
            <div class="container py-5 h-100">
                <!-- Registration Form -->
                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <!-- Left Column -->
                                        <div class="col-lg-6">
                                            <div class="p-5">
                                                <h3 class="fw-normal mb-5" style="color: #041721;">Personal Information</h3>
    
                                                <!-- Full Name -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label" for="name">Full Name</label>
                                                    <input type="text" id="name" name="name"
                                                        class="form-control form-control-lg" value="{{ old('name') }}" required />
                                                </div>
    
                                                <!-- Gender -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label" for="gender">Gender</label>
                                                    <select id="gender" name="gender" class="form-select" required>
                                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                                    </select>
                                                </div>
    
                                                <!-- Date of Birth -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label" for="date_of_birth">Date of Birth</label>
                                                    <input type="date" id="date_of_birth" name="date_of_birth"
                                                        class="form-control form-control-lg" value="{{ old('date_of_birth') }}" required />
                                                </div>
    
                                                <!-- Phone Number -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label" for="phone">Phone Number</label>
                                                    <input type="text" id="phone" name="phone"
                                                        class="form-control form-control-lg" value="{{ old('phone') }}" required />
                                                </div>
                                            </div>
                                        </div>
    
                                        <!-- Right Column -->
                                        <div class="col-lg-6 bg-indigo text-white">
                                            <div class="p-5">
                                                <h3 class="fw-normal mb-5">Additional Information</h3>

                                                 <!-- asal pendaftar -->
                                                 <div class="mb-4 pb-2">
                                                    <label class="form-label" for="registrant_type">Asal Pendaftar</label>
                                                    <select id="registrant_type" name="registrant_type" class="form-select" required>
                                                        <option value="" disabled selected>PILIH ASAL PENDAFTAR</option>
                                                        <option value="mahasiswa" {{ old('registrant_type') == 'mahasiswa' ? 'selected' : '' }}>MAHASISWA</option>
                                                        <option value="umum" {{ old('registrant_type') == 'umum' ? 'selected' : '' }}>UMUM</option>
                                                    </select>
                                                </div>
    
                                                <!-- NPM/NIK -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label text-white" for="npm_nik">NPM/NIK</label>
                                                    <input type="text" id="npm_nik" name="npm_nik"
                                                        class="form-control form-control-lg" value="{{ old('npm_nik') }}" required />
                                                </div>
    
                                                <!-- Email -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control form-control-lg" value="{{ old('email') }}" required />
                                                </div>
    
                                                <!-- Password -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label text-white" for="password">Password</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control form-control-lg" required />
                                                </div>
    
                                                <!-- Confirm Password -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label text-white" for="password_confirmation">Confirm Password</label>
                                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                                        class="form-control form-control-lg" required />
                                                </div>
    
                                                <!-- Profile Picture -->
                                                <div class="mb-4 pb-2">
                                                    <label class="form-label text-white" for="photo">Profile Picture</label>
                                                    <input type="file" id="photo" name="photo"
                                                        class="form-control form-control-lg" />
                                                </div>
    
                                                {{-- <!-- Terms and Conditions -->
                                                <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                                    <input class="form-check-input me-3" type="checkbox" id="terms" required />
                                                    <label class="form-check-label text-white" for="terms">
                                                        I accept the <a href="#" class="text-white"><u>Terms and Conditions</u></a>.
                                                    </label>
                                                </div> --}}
    
                                                <!-- Submit Button -->
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="{{route('login')}}" class="btn btn-outline-light btn-lg">Back to Login</a>
                                                    <button type="submit" class="btn btn-light btn-lg">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        
    
        <!-- Bootstrap JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>