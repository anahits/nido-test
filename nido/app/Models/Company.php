<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    //
    const TABLE = 'companies';
    const PRIMARY_KEY = 'id_company';

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
    protected $fillable = ['name', 'email', 'logo', 'website', 'company_id'];


 	/*
     * START Relationships
     */
 	public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id_company');
    }
}
