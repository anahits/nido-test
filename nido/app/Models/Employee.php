<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    const TABLE = 'employees';
    const PRIMARY_KEY = 'id_employee';

     /**
     * Table to use.
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = self::TABLE;
    protected $primaryKey = self::PRIMARY_KEY;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone'];


    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

 	/*
     * START Relationships
     */

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id_company');
    }

}
