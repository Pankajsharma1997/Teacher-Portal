<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
 use SoftDeletes;
    use Updater;

class message extends Model
{
   
    protected $table = 'messages';


    protected $fillable = [
         'parent_id',
         'sender_user_email',
         'receiver_user_email',
         'content',
         'sender_name',
         'sender_user_id',
         'receiver_name',
         'receiver_user_id',
         'status',
    ];
    use HasFactory;


//     public function child()
// {
//    return $this->hasMany('App\Models\message', 'parent_id');
// }
// public function children_rec()
// {
//    return $this->child()->with('children_rec');
//    // which is equivalent to:
//    // return $this->hasMany('App\CourseModule', 'parent')->with('children_rec);
// }
// // parent
// public function parent()
// {
//    return $this->belongsTo('App\Models\message','parent_id');
// }

// // all ascendants
// public function parent_rec()
// {
//    return $this->parent()->with('parent_rec');
// }




public function parent()
{
  return $this->belongsTo(Message::class, 'parent_id');
}

  public function children()
  {
    return $this->hasMany(Message::class,'parent_id','id')->with('children');
  }




}





// public function sender() {
//         return $this->belongsTo(User::class, 'sender_id');
//     }

//     public function receiver() {
//         return $this->belongsTo(User::class, 'receiver_id');
//     }





// public function parent() {
//     return $this->belongsTo(self::class, 'parent_id');
// }
// public function children(){
//     return $this->hasMany(self::class, 'parent_id');
// }