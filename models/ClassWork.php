<?php

class ClassWork extends Model
{
    protected $table = 'class_works';

    protected $fillable = ['title', 'instruction', 'deadline', 'attachments'];

    public $timestamps = true;

    protected $casts = [
        'deadline' => 'date:Y-m-d',
        'attachments' => 'array'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function uploadAttachments($files)
    {
        $attachments = array();

        foreach($files as $file) {
            $dir = $this->class->code ."/".$this->id;
            $path = Storage::upload($dir, $file);
            $name = $file["name"];
            $attachments[] = compact('name', 'path');
        }
        $this->update(compact('attachments'));
    }
}