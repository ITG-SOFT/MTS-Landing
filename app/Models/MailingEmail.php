<?php

namespace App\Models;

use App\Mail\SendInformationMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class MailingEmail extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    public static function sendNewItem(Product $product)
    {
        $emails = self::all();

        foreach ($emails as $email) {
            Mail::to($email->email)->send(new SendInformationMail($email->email, "Создан продукт {$product->title}"));
        }
    }
}
