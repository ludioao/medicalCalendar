@extends('layouts.app')

@section('content')
    
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="#">List</a>
        </li>
        <li class="nav-item">
            <a href="{!! route('patient.create') !!}" class="nav-link">Create</a>
        </li>
    </ul>
    
    
    <div class="table-responsive">
        {!! $html->table() !!}
    </div>
    
    
@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush