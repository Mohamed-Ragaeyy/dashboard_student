@extends('layouts.admin')
@section('content')
<div class="card pt-5 ">
   <div class="card-body">
    {{-- @foreach($errors->all() as $error)
    <div>
      هذا الاميل موجود بالفعل
    </div>
    @endforeach --}}
        <form method="POST" action="{{ route("admin.comfort.save") }} " enctype="multipart/form-data" >
            @csrf
            @if($dd == 1)

            <div class="form-group hidden">
                {{-- <label class="required"for="id_student">الطلاب</label> --}}
                <select class="selectpicker form-control d-none"  id="search-select" data-live-search="true"  name="id_student" value="الطلاب">
                    @foreach ( $students as  $student )
                     <option class="selected" value="{{ $student->id}}">{{ $student->name}}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="form-group">
                <label class="required"for="id_student">الطلاب</label>
                <select class="selectpicker form-control"  id="search-select" data-live-search="true"  name="id_student" value="الطلاب">
                    @foreach ( $students as  $student )
                     <option value="{{ $student->id}}">{{ $student->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="form-group">
                <label class="required"for="reason">سبب الراحه</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', '') }}" required>
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="days">عدد الايام </label>
                <input class="form-control {{ $errors->has('days') ? 'is-invalid' : '' }}" type="text" name="days" id="days" value="{{ old('days', '') }}" required>
                @if($errors->has('days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('days') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="class_discount">خصم الدرجات</label>
                <input class="form-control {{ $errors->has('class_discount') ? 'is-invalid' : '' }}" type="text" name="class_discount" id="class_discount" value="{{ old('class_discount', '') }}" required>
                @if($errors->has('class_discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_discount') }}
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
