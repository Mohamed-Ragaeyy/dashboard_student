@extends('layouts.admin')
@section('content')
<div class="content mt-5 pt-2">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    ! تم تسجيل الدخول بنجاح
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Slider">
                <thead>
                    <tr>
                        <th width="10">
                         المسلسل
                        </th>
                        <th>
                         الاسم
                        </th>
                        <th>
                        المدينة
                        </th>
                        <th>
                          رقم التسجيل الضريبى
                         </th>
                        <th>
                          الموبيل
                        </th>
                        <th>
                          رقم الملف الضريبى
                        </th>
                        <th>
                           البريد الالكترونى
                         </th>
                         <th>
                            كلمه مرور البريد الالكترونى
                          </th>
                          <th>
                              اسم المستخدم الضريبى
                          </th>
                          <th>
                            كلمه المرور الضريبيه
                          </th>
                          <th>
                            كلمه مرور المكتب
                          </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $key => $client)
                        <tr data-entry-id="{{ $client->id }}">
                            <td>
                                {{$client->id ?? '' }}
                            </td>
                            <td>
                                {{$client->name ?? '' }}
                            </td>
                            <td>
                                {{$client->city ?? '' }}
                            </td>
                            <td>
                                {{$client->tax_reg_number ?? '' }}
                            </td>
                            <td>
                                {{$client->mobile ?? '' }}
                            </td>
                            <td>
                                {{$client->tax_file_no ?? '' }}
                            </td>
                            <td>
                                {{$client->email?? '' }}
                            </td>
                            <td>
                                {{$client->emailpassword?? '' }}
                            </td>
                            <td>
                                {{$client->tax_password?? '' }}
                            </td>
                            <td>
                                {{$client->office_password?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.client.edit', $client->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                    <form action="{{ route('admin.client.destroy', $client->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
@endsection
