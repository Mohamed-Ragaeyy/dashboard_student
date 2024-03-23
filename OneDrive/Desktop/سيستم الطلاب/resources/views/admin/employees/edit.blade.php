@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.employee.update', $employee->id) }} " enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required"for="name">الاسم</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $employee->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="national_number">الرقم القومى</label>
                <input class="form-control {{ $errors->has('national_number') ? 'is-invalid' : '' }}" type="text" name="national_number" id="national_number" value="{{ old('national_number',  $employee->national_number) }}" required>
                @if($errors->has('national_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('national_number') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="number">رقم الطالب</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', $employee->number) }}" required>
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="college">الكليه</label>
                <input class="form-control {{ $errors->has('college') ? 'is-invalid' : '' }}" type="text" name="college" id="college" value="{{ old('college',  $employee->college) }}" required>
                @if($errors->has('college'))
                    <div class="invalid-feedback">
                        {{ $errors->first('college') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="section">القسم</label>
                <input class="form-control {{ $errors->has('section') ? 'is-invalid' : '' }}" type="text" name="section" id="section" value="{{ old('section',  $employee->section) }}" required>
                @if($errors->has('section'))
                    <div class="invalid-feedback">
                        {{ $errors->first('section') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="total">المجموع</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="text" name="total" id="total" value="{{ old('total',  $employee->total) }}" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="phone">الموبيل</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone',  $employee->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="address">العنوان</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address',  $employee->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                   حفظ
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
