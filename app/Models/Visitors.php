<?php

namespace App\Models;

use Database\Factories\VisitorsFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


#[Fillable(['name', 'contact_no', 'address', 'host', 'arrival', 'departure'])]
class Visitors extends Model
{
    /** @use HasFactory<VisitorsFactory> */
    use HasFactory, Notifiable, SoftDeletes;

}
