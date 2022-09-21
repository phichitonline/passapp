<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute จะต้องได้รับการยอมรับ',
    'accepted_if' => ':attribute ต้องยอมรับเมื่อ :other คือ :value',
    'active_url' => ':attribute ไม่ใช่ URL ที่ถูกต้อง',
    'after' => ':attribute ต้องเป็นวันที่หลังจาก :date',
    'after_or_equal' => ':attribute ต้องเป็นวันที่หลังหรือเท่ากับ :date',
    'alpha' => ':attribute ต้องประกอบด้วยตัวอักษรเท่านั้น',
    'alpha_dash' => ':attribute ต้องประกอบด้วยตัวอักษร ตัวเลข ขีดกลาง และขีดล่างเท่านั้น',
    'alpha_num' => ':attribute ต้องประกอบด้วยตัวอักษรและตัวเลขเท่านั้น',
    'array' => ':attribute ต้องเป็นอาร์เรย์',
    'before' => ':attribute ต้องเป็นวันที่มาก่อน :date',
    'before_or_equal' => ':attribute ต้องเป็นวันที่ก่อนหรือเท่ากับ :date',
    'between' => [
        'array' => ':attribute ต้องมีระหว่าง :min และ :max รายการ',
        'file' => ':attribute ต้องอยู่ระหว่าง :min และ :max kilobytes.',
        'numeric' => ':attribute ต้องอยู่ระหว่าง :min และ :max',
        'string' => ':attribute ต้องอยู่ระหว่าง :min และ :max ตัวอักษร',
    ],
    'boolean' => ':attribute ฟิลด์จะต้องเป็นจริงหรือเท็จ',
    'confirmed' => ':attribute การยืนยันไม่ตรงกัน',
    'current_password' => 'รหัสผ่านไม่ถูกต้อง',
    'date' => ':attribute ไม่ใช่วันที่ที่ถูกต้อง',
    'date_equals' => ':attribute ต้องเป็นวันที่เท่ากับ :date',
    'date_format' => ':attribute ไม่ตรงกับรูปแบบ :format',
    'declined' => ':attribute จะต้องถูกปฏิเสธ',
    'declined_if' => ':attribute จะต้องถูกปฏิเสธเมื่อ :other คือ :value',
    'different' => ':attribute และ :other จะต้องแตกต่างกัน',
    'digits' => ':attribute ต้องเป็นตัวเลข :digits',
    'digits_between' => ':attribute ตัวเลขต้องอยู่ระหว่าง :min และ :max',
    'dimensions' => ':attribute มีขนาดภาพที่ไม่ถูกต้อง',
    'distinct' => ':attribute ฟิลด์มีค่าซ้ำกัน',
    'doesnt_end_with' => ':attribute อาจไม่จบด้วยข้อใดข้อหนึ่งต่อไปนี้: :values',
    'doesnt_start_with' => ':attribute ไม่ขึ้นต้นด้วยข้อใดข้อหนึ่งต่อไปนี้: :values',
    'email' => ':attribute จะต้องเป็นที่อยู่อีเมลที่ถูกต้อง',
    'ends_with' => ':attribute ต้องลงท้ายด้วยข้อใดข้อหนึ่งต่อไปนี้: :values',
    'enum' => ':attribute ที่เลือกไม่ถูกต้อง',
    'exists' => ':attribute ที่เลือกไม่ถูกต้อง',
    'file' => ':attribute ต้องเป็นไฟล์',
    'filled' => ':attribute ฟิลด์จะต้องมีค่า',
    'gt' => [
        'array' => ':attribute ต้องมีมากกว่า :value รายการ',
        'file' => ':attribute ต้องมากกว่า :value kilobytes',
        'numeric' => ':attribute ต้องมากกว่า :value',
        'string' => ':attribute ต้องมากกว่า :value ตัวอักษร',
    ],
    'gte' => [
        'array' => ':attribute จำเป็นต้องมี :value รายการหรือมากกว่า',
        'file' => ':attribute ต้องมากกว่าหรือเท่ากับ :value kilobytes',
        'numeric' => ':attribute ต้องมากกว่าหรือเท่ากับ :value',
        'string' => ':attribute ต้องมากกว่าหรือเท่ากับ :value ตัวอักษร',
    ],
    'image' => ':attribute ต้องเป็นภาพ',
    'in' => ':attribute ที่เลือกไม่ถูกต้อง',
    'in_array' => ':attribute ไม่มีฟิลด์ใน :other',
    'integer' => ':attribute ต้องเป็นจำนวนเต็ม',
    'ip' => ':attribute ต้องเป็น IP address ที่ถูกต้อง',
    'ipv4' => ':attribute ต้องเป็น IPv4 address ที่ถูกต้อง',
    'ipv6' => ':attribute ต้องเป็น IPv6 address ที่ถูกต้อง',
    'json' => ':attribute ต้องเป็น JSON string ที่ถูกต้อง',
    'lt' => [
        'array' => ':attribute ต้องมีน้อยกว่า :value รายการ',
        'file' => ':attribute ต้องน้อยกว่า :value kilobytes',
        'numeric' => ':attribute ต้องน้อยกว่า :value',
        'string' => ':attribute ต้องน้อยกว่า :value ตัวอักษร',
    ],
    'lte' => [
        'array' => ':attribute ต้องมีไม่เกิน :value รายการ',
        'file' => ':attribute ต้องน้อยกว่า หรือเท่ากับ :value kilobytes.',
        'numeric' => ':attribute ต้องน้อยกว่า หรือเท่ากับ :value.',
        'string' => ':attribute ต้องน้อยกว่า หรือเท่ากับ :value ตัวอักษร',
    ],
    'mac_address' => ':attribute ต้องเป็น MAC address ที่ถูกต้อง',
    'max' => [
        'array' => ':attribute ต้องมีไม่เกิน :max รายการ',
        'file' => ':attribute ต้องไม่มากกว่า :max kilobytes',
        'numeric' => ':attribute ต้องไม่มากกว่า :max',
        'string' => ':attribute ต้องไม่มากกว่า :max ตัวอักษร',
    ],
    'max_digits' => ':attribute ตัวเลขต้องมีไม่เกิน :max',
    'mimes' => ':attribute ต้องเป็นไฟล์ประเภท: :values',
    'mimetypes' => ':attribute ต้องเป็นไฟล์ประเภท: :values',
    'min' => [
        'array' => ':attribute อย่างน้อยต้องมี :min รายการ',
        'file' => ':attribute ต้องมีอย่างน้อย :min kilobytes',
        'numeric' => ':attribute ต้องมีอย่างน้อย :min',
        'string' => ':attribute ต้องมีอย่างน้อย :min ตัวอักษร',
    ],
    'min_digits' => ':attribute อย่างน้อยต้องมี :min ตัวเลข',
    'multiple_of' => ':attribute จะต้องเป็นผลคูณของ :value',
    'not_in' => 'The selected :attribute ไม่ถูกต้อง',
    'not_regex' => ':attribute รูปแบบไม่ถูกต้อง',
    'numeric' => ':attribute ต้องเป็นตัวเลข',
    'password' => [
        'letters' => ':attribute ต้องมีอย่างน้อยหนึ่งตัวอักษร',
        'mixed' => ':attribute ต้องมีตัวพิมพ์ใหญ่และตัวพิมพ์เล็กอย่างน้อยหนึ่งตัว',
        'numbers' => ':attribute ต้องมีตัวเลขอย่างน้อยหนึ่งตัว',
        'symbols' => ':attribute ต้องมีสัญลักษณ์อย่างน้อยหนึ่งตัว',
        'uncompromised' => ':attribute ที่ได้รับได้ปรากฏในการรั่วไหลของข้อมูล กรุณาเลือก :attribute ที่แตกต่าง',
    ],
    'present' => 'ฟิลด์ :attribute จะต้องมีอยู่',
    'prohibited' => ':attribute เป็นฟิลด์ต้องห้าม',
    'prohibited_if' => ':attribute ต้องห้ามเมื่อ :other คือ :value',
    'prohibited_unless' => ':attribute ห้ามเว้นแต่ :other อยู่ใน :values',
    'prohibits' => ':attribute เป็นฟิลด์ต้องห้าม :other มีอยู่',
    'regex' => ':attribute รูปแบบไม่ถูกต้อง',
    'required' => ':attribute ต้องระบุ',
    'required_array_keys' => 'ฟิลด์ :attribute ต้องมีรายการสำหรับ: :values',
    'required_if' => ':attribute ต้องระบุเมื่อ :other คือ :value',
    'required_unless' => 'ฟิลด์ :attribute ต้องระบุเว้นแต่ :other อยู่ใน :values',
    'required_with' => 'ฟิลด์ :attribute ต้องระบุเมื่อ :values มีอยู่',
    'required_with_all' => 'ฟิลด์ :attribute ต้องระบุเมื่อ :values มีอยู่',
    'required_without' => 'ฟิลด์ :attribute ต้องระบุเมื่อ :values ไม่มีอยู่',
    'required_without_all' => 'ฟิลด์ :attribute ต้องระบุเมื่อไม่มี :values อยู่',
    'same' => ':attribute และ :other ต้องตรงกัน',
    'size' => [
        'array' => ':attribute ต้องมี :size รายการ',
        'file' => ':attribute ต้องมี :size kilobytes',
        'numeric' => ':attribute ต้องมี :size',
        'string' => ':attribute ต้องมี :size ตัวอักษร',
    ],
    'starts_with' => ':attribute ต้องขึ้นต้นด้วยข้อใดข้อหนึ่งต่อไปนี้: :values',
    'string' => ':attribute ต้องเป็น string.',
    'timezone' => ':attribute ต้องเป็น timezone ที่ถูกต้อง',
    'unique' => ':attribute ได้ถูกใช้ไปแล้ว',
    'uploaded' => ':attribute ไม่สามารถอัปโหลด',
    'url' => ':attribute ต้องเป็น URL ที่ถูกต้อง',
    'uuid' => ':attribute ต้องเป็น UUID ที่ถูกต้อง',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
