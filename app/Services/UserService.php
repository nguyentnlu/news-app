<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
        date_default_timezone_set('asia/ho_chi_minh');
    }

    public function create($data)
    {
        DB::beginTransaction();
        try {
            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);
            $user->roles()->sync($data['role']);
            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            return null;
        }
    }

    public function update($data, $user)
    {
        DB::beginTransaction();
        try {
            $user->fill($data)->save();
            $user->roles()->sync($data['role']);
            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return null;
        }
    }

    public function delete(User $user)
    {
        $user->roles()->detach();
        $user->delete();
    }

    public function search($filter)
    {
        foreach (Arr::get($filter, 'search') as $column => $value) {
            $users = User::where($column, 'like', "%{$value}%")->get();
        }

        return $users;
    }
}
