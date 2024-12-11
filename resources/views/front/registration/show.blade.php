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

        @foreach ($registration->doses as $dose)
            <tr>
                <td>{{$dose->dose_type}}</td>
                <td>
                    <input type="date" name="scheduled_date" value="{{ $dose->scheduled_date }}" min="{{ today()->toDateString() }}" class="scheduled_date" data-dose-id="{{ $dose->id }}">

                    @if($dose->scheduled_date && !$dose->taken_date)
                        <a href="#" class="cancel_appointment" data-dose-id="{{ $dose->id }}">
                            Cancel
                        </a>
                    @endif

                </td>
                <td>{{$dose->taken_date}}</td>
                <td>{{ $dose->givenBy->name ?? "" }}</td>
                <td>{{$dose->vaccine->name}}</td>
            </tr>
        @endforeach
  
    </table>


    @push('scripts')
        <script>
            let elems = document.getElementsByClassName('scheduled_date');

            Array.from(elems).forEach(function(elem) {

                elem.addEventListener('change', function (event) {
                    updated_date = event.target.value;
                    const doseId = event.target.dataset.doseId

                    let xhr = new XMLHttpRequest();
                    let url = '{{ route('front.registration.update_date') }}';

                    xhr.open('POST', url, true);
                    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                data = JSON.parse(xhr.responseText);
                                console.log(data.message);
                                alert('Success: ' + data.message);
                            } else {
                                alert('Error: ' + xhr.status + ' ' + xhr.responseText);
                            }
                        }
                    }
                    xhr.send(JSON.stringify({ date: updated_date, dose_id: doseId, _token: '{{csrf_token()}}' }));
                });
            });


            elems = document.getElementsByClassName('cancel_appointment');

            Array.from(elems).forEach(function(elem) {

                elem.addEventListener('click', function (event) {

                    event.preventDefault();

                    const doseId = event.target.dataset.doseId

                    let xhr = new XMLHttpRequest();
                    let url = '{{ route('front.registration.cancel_appointment') }}';

                    xhr.open('POST', url, true);
                    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                data = JSON.parse(xhr.responseText);
                                console.log(data.message);
                                alert('Success: ' + data.message);
                            } else {
                                alert('Error: ' + xhr.status + ' ' + xhr.responseText);
                            }
                        }
                    }
                    xhr.send(JSON.stringify({ dose_id: doseId, _token: '{{csrf_token()}}' }));
                });
            });

        </script>
    @endpush
    
</x-layout>

