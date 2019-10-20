<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = ['product_id'];

    public function uploadImage($image)
    {

        if($image == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads/product', $filename);
        $this->img = $filename;
        $this->save();
    }

    public function getImage()
    {
        if($this->img == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/product/' . $this->img;
    }

    public function removeImage()
    {
        if ($this->img != null)
        {
            Storage::delete('uploads/product/' . $this->img);
        }
    }

    /**
     * Override delete method to delete image too
     *
     * @return void
     * @throws \Exception
     */
    public function delete()
    {
        $this->removeImage();
        parent::delete();
    }
}
