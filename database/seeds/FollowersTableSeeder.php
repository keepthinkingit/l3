<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        $other = $users->slice(1);
        $other_list = $other->pluck('id')->toArray();

        //管理员关注所有人,除了自己
        $user->follow($other_list);

        //所有人都关注管理员,除了管理员自己
        foreach($other as $follower) {
            $follower->follow($user_id);
        }
    }
}
