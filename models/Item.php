<?php

class Item extends Model
{
    protected static $table = 'items';

    protected static $fillable = ['name', 'quantity', 'price'];
}
