<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TransportInvoice
 *
 * @property integer $id
 * @property integer $transport_id
 * @property integer $invoiceCustomer_id
 * @property integer $invoiceGarage_id
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\TransportInvoice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportInvoice whereTransportId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportInvoice whereInvoiceCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportInvoice whereInvoiceGarageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportInvoice whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportInvoice whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportInvoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportInvoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TransportInvoice extends Model
{
    protected $table = 'transportInvoices';
}
