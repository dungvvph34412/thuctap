<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessImage extends Job implements ShouldQueue
{
    protected $imagePath;

    public function __construct($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    public function handle()
    {
        // Sử dụng thư viện Intervention Image để xử lý ảnh
        $image = Image::make(Storage::get($this->imagePath));

        // Thực hiện thay đổi kích thước ảnh
        $image->resize(300, 300);

        // Lưu lại ảnh đã được xử lý
        Storage::put($this->imagePath, (string) $image->encode());
    }
}