<?php


namespace Helper\Transform;


use Illuminate\Http\Request;
use Image;

class PhotoMod
{
    private string $extension;
    private        $file;
    private string $name;

    public function __construct(Request $request)
    {
        $this->file      = $request->file('image');
        if (empty($this->file)){
            return null;
        }
        $this->extension = $this->file->extension();
        $this->name      = time().'.'.$this->extension;
    }

    public static function resizeAndUpload(Request $request): string
    {
        $instance = new self($request);
        $image    = Image::make($instance->file);
        $image->resize(500,
                       null,
            function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/img').'/'.$instance->name, 30);

        return $instance->name;
    }

}