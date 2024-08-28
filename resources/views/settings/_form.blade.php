<div class="card-content">

    <!--- start setting --->
    <div class="card-content">
        <collapse class="outer" accordion is-fullwidth>
            <collapse-item title="اعدادات الموقـع" icon="fa fa-cubes" selected>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required">اسم الموقع</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('site_name_ar', null, ['class' => 'input' , 'required'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required">اسم الموقع بالانجليزية </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('site_name_en', null, ['class' => 'input' , 'required'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required">وصف الموقع</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::textarea('description_ar', null, ['class' => 'textarea', 'rows' => 3  , 'required'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required">وصف الموقع بالانجليزية </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::textarea('description_en', null, ['class' => 'textarea', 'rows' => 3 , 'required'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"> ايميل الموقع</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <div class="control">
                        {!! Form::text('email', null, ['class' => 'input'] )!!}
                    </div>
                    </div>
                </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">الهاتف</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('phone', null, ['class' => 'input'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">  فاكس</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('fax', null, ['class' => 'input', 'required'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">نبذه عن التطبيق بالعربية</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('apps_ar_hint', null, ['class' => 'input'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">نبذه عن التطبيق بالانجليزية </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('apps_en_hint', null, ['class' => 'input'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">العنوان بالعربية</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('address_ar', null, ['class' => 'input'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">العنوان بالانجليزية </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('address_en', null, ['class' => 'input'] )!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required">لوجو </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                            <uploader label=" لوجو" name="logo" @if(isset($setting)) file="{{ $setting->logo }}" @endif ></uploader>
                            </div>
                        </div>
                    </div>
                </div>
            </collapse-item>
        </collapse>
    </div>
    <!--- end setting  ---->

    <!--- start social --->
    <div class="card-content">
        <collapse class="outer" accordion is-fullwidth>
            <collapse-item title="اعدادات السوشيــال" icon="fa fa-rss" >
            <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">FaceBook</label>
            </div>
            <div class="field-body">
                <div class="field" style="display: inline-flex;">
                    <div class="control" style="width: 50%;">
                        {!! Form::text('facebook', ($setting->social['facebook'][0])??null, ['class' => 'input'] )!!}
                    </div>
                    <div class="control" style="width: 50%;margin-right: auto;">
                        <input type="text" class="input" name="facebook_icon"  value="{{ ($setting->social['facebook'][1])??null}}"  placeholder="Select icon" data-fa-browser />
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Twitter</label>
            </div>
            <div class="field-body">
                <div class="field" style="display: inline-flex;">
                    <div class="control" style="width: 50%;">
                        {!! Form::text('twitter', ($setting->social['twitter'][0])??null, ['class' => 'input'] )!!}
                    </div>
                    <div class="control" style="width: 50%;margin-right: auto;">
                        <input type="text" class="input" name="twitter_icon"  value="{{ ($setting->social['twitter'][1])??null}}"    placeholder="Select icon" data-fa-browser />
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Instagram</label>
            </div>
            <div class="field-body">
                <div class="field" style="display: inline-flex;">
                    <div class="control" style="width: 50%;">
                        {!! Form::text('instagram', ($setting->social['instagram'][0])??null, ['class' => 'input'] )!!}
                    </div>
                    <div class="control" style="width: 50%;margin-right: auto;">
                        <input type="text" class="input" name="instagram_icon"   value="{{ ($setting->social['instagram'][1])??null}}"   placeholder="Select icon" data-fa-browser />
                    </div>
                </div>
            </div>
        </div>
            </collapse-item>
        </collapse>
     </div>
    <!--- end social----> 

    <!--- mail mail_configration--->
    <div class="card-content">
        <collapse class="outer" accordion is-fullwidth>
            <collapse-item title="اعدادات الارســــال" icon="fa fa-envelope" >
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required"> mail_mailer </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input  class='input' name="mail_mailer" Class="form-control" type="text" value="{{ ($setting->mail_configuration['mail_mailer'])??null }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required"> mail_host </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input  class='input' name="mail_host" type="text" value="{{ ($setting->mail_configuration['mail_host'])??null }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required"> mail_port </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input  class='input' name="mail_port" type="text" value="{{ ($setting->mail_configuration['mail_port'])??null }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required"> mail_username </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input  class='input' name="mail_username" type="text" value="{{ ($setting->mail_configuration['mail_username'])??null }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required"> mail_password </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input  class='input' name="mail_password" type="text" value="{{ ($setting->mail_configuration['mail_password'])??null }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required"> mail_encryption </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input  class='input' name="mail_encryption" type="text" value="{{ ($setting->mail_configuration['mail_encryption'])??null }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required"> mail_from_address </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input required="required" name="mail_from_address" class="input" type="text" value="{{ ($setting->mail_configuration['mail_from_address'])??null }}">
                            </div>
                        </div>
                    </div>
                </div>      
                <!-- </div> -->
            </collapse-item>
        </collapse>
    </div>
    <!--- end mail_configration ---->

    <footer class="card-footer">
        <div class="buttons has-addons">
            <a class="button is-info" href="{{ route('admin.settings.edit') }}"> الغاء </a>
            <button type="submit" class="button is-success">حفظ</button>
        </div>
    </footer>
</div>
