<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'order_id', 'transaction_id', 'payer_email', 'payer_full_name', 'currency', 'amount', 'payee_email', 'time_paid_created_at', 'time_paid_updated_at', 'status', 'reference_id'
    ];
}
