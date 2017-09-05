<div class="form-row">
    <div class="col">
        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label for="first_name" class="control-label">First name</label>
            <input
                    id="first_name"
                    type="text"
                    class="form-control"
                    name="first_name"
                    value="{{ isset($data->primaryPerson->first_name) && $data->primaryPerson->first_name ? $data->primaryPerson->first_name : old('first_name') }}"/>

            @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif

        </div>
    </div>
    <div class="col">
        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="control-label">Last name</label>
            <input
                    id="last_name"
                    type="text"
                    class="form-control"
                    name="last_name"
                    value="{{ isset($data->primaryPerson->last_name) && $data->primaryPerson->last_name ? $data->primaryPerson->last_name : old('last_name') }}"/>

            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="control-label">Title</label>
    <input
            id="title"
            type="title"
            class="form-control"
            name="title"
            value="{{ isset($data->primaryPerson->title) && $data->primaryPerson->title ? $data->primaryPerson->title : old('title') }}"/>

    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>


@if(!isset($hasEmail) && $hasEmail = true)
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">Email address</label>
    <input
            id="email"
            type="email"
            class="form-control"
            name="email"
            value="{{ isset($data->primaryPerson->email) && $data->primaryPerson->email ? $data->primaryPerson->email : old('email') }}"/>

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
@endif


@if(!isset($hasPhone) && $hasPhone = true)
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="phone" class="control-label">Phone number</label>
    <input
            id="phone"
            type="tel"
            class="form-control"
            name="phone"
            value="{{ isset($data->primaryPerson->phone) && $data->primaryPerson->phone ? $data->primaryPerson->phone : old('phone') }}"/>

    @if ($errors->has('phone'))
        <span class="help-block">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>
@endif