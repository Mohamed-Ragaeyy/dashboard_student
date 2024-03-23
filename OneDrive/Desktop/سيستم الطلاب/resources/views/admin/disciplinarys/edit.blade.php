@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.disciplinary.update', $disciplinary->id) }} " enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required"for="id_student">الطلاب</label>
                <select class="selectpicker form-control"  id="search-select" data-live-search="true"  name="id_student" value="الطلاب">
                    @foreach ( $students as  $student )
                     <option value="{{ $student->id}}">{{ $student->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="required"for="reason">سبب الراحه</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', $disciplinary->reason) }}" required>
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="type">النوع</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type',  $disciplinary->type) }}" required>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required"for="class_discount">خصم الدرجات</label>
                <input class="form-control {{ $errors->has('class_discount') ? 'is-invalid' : '' }}" type="text" name="class_discount" id="class_discount" value="{{ old('class_discount',  $disciplinary->class_discount) }}" required>
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
