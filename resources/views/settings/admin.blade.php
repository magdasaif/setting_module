@extends('admin.layouts.app')

@section('page.title', 'تعديل البروفايل')

@section('content')
    <div class="card">
        <header class="card-header">
            <p>
                <span class="icon is-small">
                <i class="fa fa-user-cog"></i>
                </span>
                <span>تعديل البروفايل</span>
            </p>
        </header>

        <div class="card-content">
            <collapse class="outer" accordion is-fullwidth>
                <collapse-item title=" البيانات الاساسيه" icon="fa fa-cubes" selected>
                    <div class="columns is-vcentered">
                        <div class="column is-12">
                            {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.update_admin']]) !!}
                                @csrf
                                <input name="id" type="number" value="{{ auth()->id() }}" hidden>
                                <div class="card-content">
                                    <div class="field is-horizontal general-input">
                                        <div class="field-label is-normal">
                                            <label class="label required">الأسم</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    {!! Form::text('name', auth()->user()->name, ['class' => 'input' , 'required'] )!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal general-input">
                                        <div class="field-label is-normal">
                                            <label class="label required">البريد الألكتروني</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    {!! Form::text('email', auth()->user()->email, ['class' => 'input' , 'required','readonly'] )!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal general-input">
                                        <div class="field-label is-normal">
                                            <label class="label required"> الهاتف</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    {!! Form::text('phone', auth()->user()->phone, ['class' => 'input' , 'required'] )!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal general-input">
                                        <div class="field-label is-normal">
                                            <label class="label required">كلمة السر</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    {!! Form::text('password', null, ['class' => 'input'] )!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal general-input">
                                        <div class="field-label is-normal">
                                            <label class="label required">تأكيد كلمة السر</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    {!! Form::text('password_confirmation', null, ['class' => 'input'] )!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(auth()->user()->type=='merchant')
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label required">لوجو </label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                    <uploader label=" لوجو" name="logo" @if(isset(auth()->user()->logo)) file="{{ auth()->user()->logo }}" @endif ></uploader>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label required"> خلفيات</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input type="file" name="banners[]" class="form-control" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <footer class="card-footer" style="padding-right: 50%;">
                                    <div class="buttons has-addons">
                                        <center><button type="submit" class="button is-primary"> حفظ</button></center>
                                    </div>
                                </footer>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </collapse-item>
                @if(auth()->user()->type=='merchant')
                    <collapse-item title=" الخلفيات " icon="fa fa-images" selected>
                        <div class="columns is-vcentered">
                            <div class="column is-12">
                            <div class="card-content">
                                <div class="table-container">
                                    <table class="table is-fullwidth" id="features">
                                    <thead>
                                        <tr>
                                        <th>صوره</th>
                                        <th>الاجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(auth()->user()->banners() as $banner)
                                        <tr>
                                        <td><img src="{{ $banner->getUrl('site') }}"></td>
                                    
                                        <td>
                                            <div class="buttons has-addons">
                                                <span class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $banner->id }}" data_name="{{ $banner->file_name }}" data-url="{{ route('merchant.banner.destroy', $banner->id) }}">حذف</span>
                                            </div>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </collapse-item>
                @endif
            </collapse>
        </div>

    </div>
@endsection
@include('admin.partials.deleteModal')

