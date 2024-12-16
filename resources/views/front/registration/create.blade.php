@extends('layouts.frontend_app')

@section('title', 'Registration')
@section('app_content')
    <section id="registraion_section">
        <div class="row container">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-info">Important Links</h4>
                        <ul class="mt-4">
                            <li><a href="{{ route('front.registration.status') }}" class="btn btn-link">Vaccine Status</a>
                            </li>
                            <li><a href="{{ route('front.vaccine.card') }}" class="btn btn-link">Vaccine Card</a></li>
                            <li><a href="" class="btn btn-link">Faq</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>Registraion For Vaccine</h2>
                        <form action="{{ route('handle.registration') }}" class="mt-4" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">NID</label>
                                        <input type="text" class="form-control" name="nid" placeholder="NID"
                                            value="{{ old('nid') }}">
                                        @error('nid')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">Date Of Birth</label>
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">Vaccine</label>
                                        <select name="vaccine_id" id="" class="form-control">
                                            <option value="">Select a Vaccine</option>
                                            @foreach ($vaccines as $vaccine)
                                                <option value="{{ $vaccine->id }}">{{ $vaccine->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('vaccine_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">Division</label>
                                        <select name="division" id="" class="form-control division">
                                            <option value="">Select Your Divison</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">District</label>
                                        <select name="district" id="" class="form-control district">
                                            <option value="">Select Your District</option>

                                        </select>
                                        @error('district')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="my-2">
                                        <label for="">Hospital</label>
                                        <select name="hospital_id" id="" class="form-control hospital">
                                            <option value="">Select a Hospital</option>
                                        </select>
                                        @error('hospital_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <button class="btn btn-sm btn-success w-100 disabled verify_btn">Apply for Vaccine</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('script')
    <script>
        $(document).ready(function() {
            $('.division').select2();
        });

        $('body').on('change', '.division', function() {
            let id = $(this).val();
            let url = `${base_url}/division-districts/${id}`
            axios.get(url).then(res => {
                let html = '';
                html += '<option value="">Select Your District</option>'
                res.data.districts.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });
                $('.district').html(html);
                $('.district').select2();
            })
        });

        $('body').on('change', '.district', function() {
            let id = $(this).val();
            let url = `${base_url}/district-hospitals/${id}`
            axios.get(url).then(res => {
                let html = '';
                html += '<option value="">Select A Hospital</option>'
                res.data.hospitals.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });
                $('.hospital').html(html);
                $('.hospital').select2();
            })
        });
    </script>
@endpush
