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
    'accepted'             => ':attribute должен быть принят.',
    'active_url'           => ':attribute не есть доступным URL.',
    'after'                => ':attribute должен быть датой которая после :date.',
    'after_or_equal'       => ':attribute должен быть датой что после или равна дате :date.',
    'alpha'                => ':attribute должен содержать только буквы.',
    'alpha_dash'           => ':attribute должен содержать только буквы, цифры и дефиз',
    'alpha_num'            => ':attribute должен содержать только буквы и цифры.',
    'array'                => ':attribute должен быть масивом.',
    'before'               => ':attribute должен быть датой до :date.',
    'before_or_equal'      => ':attribute должен быть датой что после или равна дате :date.',
    'between'              => [
        'numeric' => ':attribute должен находится в пределах :min до :max.',
        'file'    => ':attribute должен находится в пределах от :min до :max киллобайт.',
        'string'  => ':attribute должен находится в пределах от :min до :max символов.',
        'array'   => ':attribute должен иметь границы от :min до :max элементов.',
    ],
    'boolean'              => ':attribute Должен быть логическим значением.',
    'confirmed'            => ':attribute Подтверждение не совпадает.',
    'date'                 => ':attribute не является датой.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должны быть разными.',

    'digits'               => ':attribute должны быть :digits цифр.',
    'digits_between'       => ':attribute должны быть от :min до :max цифр.',
    'dimensions'           => ':attribute Не допустимые размеры изображений.',
    'distinct'             => ':attribute Имеет значение которое повторяется.',
    'email'                => ':attribute должны быть корректным email-адресом.',
    'exists'               => 'не допустимое значение :attribute.',
    'file'                 => ':attribute должны быть файлом.',
    'filled'               => ':attribute Должно иметь значение.',
    'image'                => ':attribute должно быть изображением.',
    'in'                   => 'значение :attribute не допустимое.',
    'in_array'             => ':attribute поле не существует в :other.',
    'integer'              => ':attribute должны быть целочисленным значением',
    'ip'                   => ':attribute должны быть корректным IP.',
    'json'                 => ':attribute должны быть корректным JSON.',
    'max'                  => [
        'numeric' => ':attribute не может быть больше, чем :max.',
        'file'    => ':attribute не может быть больше, чем :max киллобайт.',
        'string'  => ':attribute не может быть больше, чем :max символов.',
        'array'   => ':attribute не может быть больше чем :max элементов.',
    ],

    'mimes'                => ':attribute должен соответствовать типу: :values.',
    'mimetypes'            => ':attribute должен быть файлом формата: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть по крайней мере :min.',
        'file'    => ':attribute должен быть по крайней мере :min киллобайт.',
        'string'  => ':attribute должен быть по крайней мере :min символов.',
        'array'   => ':attribute должен состаять по крайней мере с :min элементов.',
    ],
    'not_in'               => 'значение :attribute не действительное.',
    'numeric'              => ':attribute должно быть числом.',
    'present'              => ':attribute должно присутствувать.',
    'regex'                => ':attribute неверный формат.',
    'required'             => ':attribute обязательно для заполнения',
    'required_if'          => ':attribute обязательно для заполнения когда :other имеет значение :value.',
    'required_unless'      => ':attribute обязательно для заполнения если :other не содержится в :values.',
    'required_with'        => ':attribute поле обязательно для заполнения, если :values присутствует.',
    'required_with_all'    => ':attribute поле обязательно для заполнения, если :values присутствует.',
    'required_without'     => ':attribute поле обязательно для заполнения, если :values отсутствует.',
    'required_without_all' => ':attribute поле обязательно для заполнения, если одно с :values присутствует.',
    'same'                 => ':attribute и :other должны соответствовать.',
    'size'                 => [
        'numeric' => ':attribute должен быть :size.',
        'file'    => ':attribute должен иметь размер :size киллобайт.',
        'string'  => ':attribute должен иметь :size символов.',
        'array'   => ':attribute должен содержать :size элементов.',
    ],
    'string'               => ':attribute должен быть строкой.',
    'timezone'             => ':attribute должен быть корректой временной зоной.',
    'unique'               => ':attribute это значение должно быть уникальным. Такие данные в БД уже присутствуют.',
    'uploaded'             => ':attribute не получилось загрузить.',
    'url'                  => ':attribute не верный формат URL.',
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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [],
];