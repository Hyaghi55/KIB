<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Sms_helper;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','birthdate','fcmtoken','os','role','city_id','code','mobile','token','image'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


      public function company()
    {
        return $this->hasMany('App\Portal');
    }



           public function notifications()
    {
        return $this->belongsToMany('App\Notification','user_notifications')->as('notification')->withPivot('id','delivered')->withTimestamps();
    }


         public function notifications_unseen()
    {
        return $this->belongsToMany('App\Notification','user_notifications')->where('delivered','unseen')->as('notification')->withPivot('id','delivered')->withTimestamps();
    }


    public function city()
    {
       return $this->belongsTo('App\City','city_id');
    }

    public static function user_show($id)
    {
        $user=User::where('id',$id)->with('city','notifications','notifications_unseen')->first();
        return $user;
    }


    public static function company_index()
    {
        $companies=User::where('role','company')->with('city')->get();
        return $companies;
    }


       public static function get_by_token($token)
    {
        $user=User::where('token',$token)->with('city')->first();
        return $user;
    }



    public static function user_create($name,$username,$email,$password,$birthdate,$fcmtoken,$os,$city_id,$code,$mobile,$token)
    {
        $user=new user;
        $user->name=$name;
        $user->username=$username;
        $user->email=$email;
        $user->active='0';
        $user->password=$password;
        $user->birthdate=$birthdate;
        $user->fcmtoken=$fcmtoken;
        $user->token=$token;
        $user->os=$os;
        $user->role='user';
        $user->mobile=$mobile;
        $user->code=Sms_helper::RandomString();
        $user->city_id=$city_id;
        $user->save();
        return $user;
    }


        public static function admin_user_create($name,$username,$email,$password,$birthdate,$fcmtoken,$os,$city_id,$code,$mobile,$token,$role,$image)
    {
        $user=new user;
        $user->name=$name;
        $user->username=$username;
        $user->email=$email;
        $user->active='1';
        $user->password=$password;
        $user->birthdate=$birthdate;
        $user->fcmtoken=$fcmtoken;
        $user->token=$token;
        $user->os=$os;
        $user->role=$role;
        $user->mobile=$mobile;
        $user->code=Sms_helper::RandomString();
        $user->city_id=$city_id;
        $user->image=$image;
        $user->save();
        return $user;
    }


    public static function admin_user_update($id,$name,$username,$email,$password,$birthdate,$fcmtoken,$os,$city_id,$code,$mobile,$token,$image)
    {
       $user=User::find($id);
        $user->name=$name;
        $user->username=$username;
        $user->email=$email;
        $user->active='1';
        $user->password=$password;
        $user->birthdate=$birthdate;
        $user->fcmtoken=$fcmtoken;
        $user->token=$token;
        $user->os=$os;
        // $user->role=$role;
        $user->mobile=$mobile;
        $user->code=Sms_helper::RandomString();
        $user->city_id=$city_id;
        // $user->image=$image;
        $user->save();
        return $user;
    }

       public static function user_update($id,$name,$email,$birthdate,$fcmtoken,$os,$city_id,$mobile)
    {
        $user=User::find($id);
        $user->name=$name;
        // $user->username=$username;
        $user->email=$email;
        // $user->active='1';
        // $user->password=$password;
        $user->birthdate=$birthdate;
        $user->fcmtoken=$fcmtoken;
        
        $user->os=$os;
        $user->city_id=$city_id;
        $user->mobile=$mobile;
        $user->save();
        return $user;
    }





    public  static function user_index()
    {
        $users=User::with('city','notifications','notifications_unseen')->get();
        return $users;
    }



       public static function user_active($user_id)
    {
        $user=User::find($user_id);
        $user->active='1';
        $user->save();
        return $user;
    }


         public static function user_update_token($user_id,$token)
    {
        $user=User::find($user_id);
        $user->fcmtoken=$token;
        $user->save();
        return $user;
    }


        public static function user_delete($id)
    {
        $user=User::find($id);
        $user->delete();
    }


          public static function user_by_email($email)
    {
        $user=User::where('email',$email)->first();
        return $user;
    }






        public function RandomString()
{
       $code=strval(rand(100000,999999));
    return $code;
}


     public function is_admin()
     {
       if($this->role=='admin')
       {
         return true;
       }
       else {
         // code...
         return false;
       }
     }


          public function is_user()
     {
       if($this->role=='user')
       {
         return true;
       }
       else {
         // code...
         return false;
       }
     }


          public function is_company()
     {
       if($this->role=='company')
       {
         return true;
       }
       else {
         // code...
         return false;
       }
     }



}
