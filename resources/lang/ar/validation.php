<?php
return [
    'accepted' => 'The field must be accepted.',
    'active_url' => 'The is not a valid URL.',
    'after' => 'The field must be a date after :date.',
    'alpha' => 'The may only contain letters.',
    'alpha_dash' => 'The may only contain letters, numbers, and dashes.',
    'alpha_num' => 'The may only contain letters and numbers.',
    'array' => 'The field must be an array.',
    'before' => 'The field must be a date before :date.',
    'between' => [
        'numeric' => 'The field must be between :min and :max.',
        'file' => 'The field must be between :min and :max kilobytes.',
        'string' => 'The field must be between :min and :max characters.',
        'array' => 'The field must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute must be true or false.',
    'confirmed' => ' :attribute التأكيد غير متطابق',
    'date' => 'The :attribute is not a valid date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The and :other must be different.',
    'digits' => 'The field must be :digits digits.',
    'digits_between' => 'The field must be between :min and :max digits.',
    'distinct' => 'The :attribute has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'exists' => 'The :attribute selected is invalid.',
    'filled' => 'The :attribute is required.',
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected is invalid.',
    'in_array' => 'The :attribute does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'max' => [
        'numeric' => ':attribute لا يزيد عن :min.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute لا يقل عن :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The :attribute selected is invalid.',
    'numeric' => ':attribute يجب ان يكون رقم',
    'present' => 'The :attribute must be present.',
    'regex' => ' :attribute format is invalid.',
    'required' => ' :attribute مطلوب',
    'required_if' => 'The :attribute is required when :other is :value.',
    'required_unless' => 'The :attribute is required unless :other is in :values.',
    'required_with' => 'The :attribute is required when :values is present.',
    'required_with_all' => 'The :attribute is required when :values is present.',
    'required_without' => ' :attribute  مطلوب عند :values غير موجودة',
    'required_without_all' => 'The :attribute is required when none of :values are present.',
    'same' => 'The and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':attribute' .' مستخدم من قبل',
    'url' => 'The :attribute format is invalid.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes' => [

        'email'=>'البريد الالكتروني',
        'password'=>'كلمة المرور',
        'name'=>'الاسم',
        'phone'=>'رقم الهاتف',
        'from'=>'بداية الحجز',
        'special_from'=>'وقت الحمام المغربي',

    'title'=>'العنوان بالانجليزية',
    'title_ar'=>'العنوان بالعربية',
    'summary_ar'=>'الملخص  بالعربية',
    'summary'=>'الملخص ',
    'content'=>'المحتوي',
    'content_ar'=>'المحتوي بالعربية',
    'post_date'=>'التاريخ',
    'des_ar'=>'الوصف بالعربية',
    'des_en'=>'الوصف',
    'price'=>'السعر',
    'duration'=>'المدة',
    'main_image'=>'الصورة',
    ],
    'count' => 'count',
    'countbetween' => 'countbetween',
    'countmax' => 'countmax',
    'countmin' => 'countmin',
    'myimage' => 'myimage',
    'myfile' => 'myfile',
    'match' => 'match',
];