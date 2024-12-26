@extends('admin.layouts.body', ['title' => 'Center List', 'page'=> 'center_list'])
@section('content')
    <div class="col-lg-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <div class="card-tools">
                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="{{route('admin.centers.create')}}"><i class="fa fa-plus"></i> Add New Center</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table tabe-hover table-bordered" id="center_list_table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($centers as $center)
                        <tr>
                            <th class="text-center">{{$loop->iteration}}</th>
                            <td><b>{{ ucwords($center->name) }}</b></td>
                            <td><b>{{ $center->address }}</b></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                Action
                                </button>
                                <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="javascript:void(0)" data-id="{{$center->id}}">View</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('admin.centers.edit', $center->id)}}">Edit</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" data-id="{{$center->id}}">Delete</a>
                                </div>
                            </td>
                        </tr>	
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    
<script>

    $(document).ready(function(){

        $('#center_list_table').dataTable();

    })

</script>
@endpush