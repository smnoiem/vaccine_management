<x-layout title="Vaccine Status">
  
    <h3 style="text-align:center;"> Vaccine Status </h3>
  
    <div>
      <h3>Candidate: {{ $registration->user->name }}</h3>
      <p>Date of Birth: {{ $registration->user->dob }}</p>
      <p>Vaccine Center: {{ $registration->center->name }}</p>
      @if ($registration->center->address)
          <p>Vaccine Center Address: {{ $registration->center->address }}</p>
      @endif
    </div>
  
    <table style="border: 1px solid black">
  
      <tr>
        <th>Dose Type</th> <th>Date Scheduled</th> <th>Date Taken</th> <th>Given By</th> <th>Vaccine Name</th>
      </tr>
  
      <tr>
        <td>test type</td><td>test date</td><td>taken date</td><th>given by operator</th><th>vaccine name</th>
      </tr>
  
    </table>
    
  </x-layout>
  