<?php


namespace Helper\Constants;


class CommonValidations extends Holder
{
    public const NAME        = ['min:2', 'max:255'];
    public const DESC        = ['required', 'max:4096'];
    public const TEXT        = 'string';
    public const URL         = 'url';
    public const ACTIVE      = ['required', 'boolean'];
    public const BOOLEAN     = 'boolean';
    public const USUAL       = 'sometimes|required|min:1|max:255';
    public const NUMERIC     = 'sometimes|required|numeric';
    public const NUMBER      = 'numeric';
    public const JSON        = ['sometimes', 'array'];
    public const ARRAY       = 'array';
    public const EMAIL       = 'email';
    public const PASS        = ['min:5', 'max:72'];
    public const PHONE       = ['regex:/(^((\+88)?01))[1|3-9]{1}(\d){8}$/'];
    public const ID          = 'min:16|max:24';
    public const IDRef       = ['size:24'];   // MongoDB support 12bytes ID (24 char)
    public const MIN1        = 'min:1';
    public const INTEGER     = 'integer';
    public const REQUIRED    = 'required';
    public const PRESENT     = 'present';
    public const SOMETIMES   = 'sometimes';
    public const NULLABLE    = 'nullable';
    public const PIPE        = '|';
    public const UUID4       = ['min:36', 'max:36'];
    public const UUID4OrAll  = ['regex:/^\*{1}$|^[\w\-]{36}$/']; // allow * or 36 char uuid (including -)
    public const NEGATIVE    = ['regex:/-[0-9]{1,9}$/'];
    public const noSpace     = ['regex:/^\S*$/'];
    public const noSlash     = ['regex:/\A[^\/]+\z/'];
    public const DATE        = 'date_format:Y/m/d';
    public const TIME        = 'date_format:H:i';
}
