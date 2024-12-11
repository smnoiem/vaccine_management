<x-layout title="Welcome">

    <h3 style="text-align:center">Welcome to Vaxx</h3>
    <hr>
    <div style="padding:6%;font-size:1.5rem;">
        @if(!auth())
        <div>
            <ul>
                <li><a href="{{ route('login') }}">login</a></li>
                <li><a href="{{ route('register') }}">register</a></li>
            </ul>
        </div>
        @else
        <div>
            @if (auth()->user()->registration)
            <a href="">Vaccine Status</a> <br>
            @else
            <a href="{{ route('front.registration.create') }}">Register</a> <br>
            @endif
            <a href="/vaccine-card">Download Vaccine Card</a> <br>
            <a href="/vaccine-certificate">Download Certificate</a> <br>
        </div>
        @endif
    </div>
    
</x-layout>