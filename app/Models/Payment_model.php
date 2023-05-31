<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment_model extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'payment_id';

    protected $allowedFields = [

      'transaction_id',
      'amount_paid',
      'customer_id',
      'customer_name',
      'customer_email',
      'customer_contact',
      'status',
      'packageDetails',
      'checkin_date',
      'create_date',
    ];
}
