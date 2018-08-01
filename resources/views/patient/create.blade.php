@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Patient</h5>
            {!! Form::open(['method' => 'post', 'route' => 'patient.store']) !!}
            
                {!! Form::openGroup('name', 'Name') !!}
                    {!! Form::text('name', null, ['placeholder' => 'Enter Patient Name']) !!}
                {!! Form::closeGroup() !!}
            
                {!! Form::openGroup('email', 'E-mail') !!}
                    {!! Form::email('email', null, ['placeholder' => 'Enter Patient E-mail']) !!}
                {!! Form::closeGroup() !!}
            
                {!! Form::openGroup('address', 'Address') !!}
                    {!! Form::text('address', null, ['placeholder' => 'Enter Patient Address']) !!}
                {!! Form::closeGroup() !!}
            
                {!! Form::openGroup('document', 'Document') !!}
                    {!! Form::text('document', null, ['placeholder' => 'Enter Patient ID (Only numbers)']) !!}
                {!! Form::closeGroup() !!}
            
                {!! Form::openGroup('birth_date', 'Birth Date') !!}
                    {!! Form::date('birth_date', null, ['placeholder' => 'Enter Birth Date']) !!}
                {!! Form::closeGroup() !!}
        
                {!! Form::openGroup('phone', 'Phone') !!}
                    {!! Form::text('phone', null, ['placeholder' => 'Enter Phone Number']) !!}
                {!! Form::closeGroup() !!}
            
                {!! Form::openGroup('enable_whatsapp', 'Check if is WhatsApp enabled') !!}
                    {!! Form::checkbox('enable_whatsapp', 1) !!}
                {!! Form::closeGroup() !!}
            
                {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
                
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection
