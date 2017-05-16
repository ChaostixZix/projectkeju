<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class chaos_model extends Model
{
    public function cekuser($username)
    {
        $cek = $this->db()->get()->where('name', $username);
        if(count($cek) > 0)
        {
            return 1;
        }else{
            return 0;
        }
    }
    public function db($db = "simpleauth_players")
    {
        return db::table($db);
    }

    public function register($username, $email, $password, $pin, $status)
    {
        $cek = $this->cekuser($username);
        if($cek == 0)
        {
            $this->db()->insert([
                ['name' => $username, 'email' => $email, 'hash' => $password, 'logindate' => NULL, 'lastip'  => NULL]
            ]);
            return 1;
        }else{
            return 0;
        }
    }

    public function login_user($username, $password)
    {
        $cek = $this->db()->get()->where('name', $username)->where('hash', $password);
        if(count($cek) > 0)
        {
            return 1;
        }else{
            return 0;
        }
    }

    public function del_user($username)
    {
        $cek = $this->cekuser($username);
        if($cek == 1)
        {
            $this->db()->where('name', $username)->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function getrank($username)
    {
        $get = $this->db('players')->get()->where('userName', $username);
        if(count($get) > 0)
        {
            return $get;
        }else{
            return 'NoRank';
        }
    }

    public function get_user_data($username)
    {
        $cek = $this->db()->get()->where('name', $username);
        if(count($cek) > 0)
        {
            return $cek;
        }else{
            return 0;
        }
    }

    public function setmoney($username, $money)
    {
        $this->db('user_money')->where('username', $username)->update(['money' => $money]);
    }

    public function buyrank($rank, $harga, $username)
    {
        $coinc = $this->get_user_money($username);
        $currentrank = $this->getrank($username)->pluck('userGroup')[0];
        if($currentrank == "Owner" or $currentrank == "Staff" or $currentrank == "Guest")
        {
            if($coinc[0] > $harga)
            {
                $setrank = $this->setrank($rank, $username);
                if($setrank == 1)
                {
                    $coinafter = $coinc[0] - $harga;
                    $this->setmoney($username, $coinafter);
                    return 1;
                    //Berhasil
                }else{
                    return 2;
                    //GAGAL
                }
            }else{
                return 0;
                //Coin Kurang
            }
            return 3;
        }else{
            //HARUS JUAL DULU
            return 3;
        }
    }

    public function setrank($rank, $username)
    {
        $cek = $this->db('players')->where('userName', $username);
        if(count($cek) > 0)
        {
            $cek->update(['userGroup' => $rank]);
            //Berhasil
            return 1;
        }else{
            //Player Belum Terdaftar
            return 0;
        }
    }

    public function get_inbox($username, $limit)
    {
        if($limit == false)
        {
            $cek = $this->db('message')->get()->where('username', $username);
        }else{
            $cek = $this->db('message')->where('username', $username)->limit(5)->get();
        }
        if(count($cek) > 0)
        {
            return $cek;
        }else{
            return;
        }
    }

    public function get_user_money($username)
    {
        $cek = $this->db('user_money')->get()->where('username', $username);
        if(count($cek) > 0)
        {
            return $cek->pluck('money');
        }else{
            return 0;
        }
    }

    public function update_password($username, $pw)
    {
        $cekuser = $this->db()->where('name', $username);
        $cek = $cekuser->get();
        if(count($cek) > 0)
        {
            $cekuser->update(['hash' => $pw]);
            return 1;
        }else{
            return 0;
        }
    }

    public function get_password($username)
    {
        $cek = $this->db()->get()->where('name', $username);
        if(count($cek) > 0)
        {
            return $cek->pluck('hash');
        }else{
            return;
        }
    }

    public function get_rank_data()
    {
        return $this->db('rank')->get();
    }

    public function get_rank_detail($rank)
    {
        return $this->db('rank')->where('rank', $rank)->get();
    }

    public function addpost($judul, $content, $poster)
    {
       $do =  $this->db('post')->insert([
           'judul'=> $judul,
           'content' => $content,
           'poster' => $poster
       ]);
       if($do)
       {
           return 1;
       }else{
           return 0;
       }
    }

    public function sellrank($username)
    {
        echo $currentrank = $this->getrank($username)->pluck('userGroup')[0];
        $harga = $this->get_rank_detail($currentrank)->pluck('harga')[0];
        $hargajual = 0.8 * $harga;
        $currentcoin = $this->get_user_money($username)[0];

        if(!empty($harga)) {
            $update = $this->setrank('Guest', $username);
            $aftercoin = $currentcoin + $hargajual;
            $this->setmoney($username, $aftercoin);
            if($update == 1)
            {
                //Berhasil
                return 1;
            }else{
                //Player Belum Terdaftar DI PurePerms
                return 2;
            }
        }else{
            //Harga Rank Sebelumnya Tidak Ada
            return 0;
        }
    }

    public function jumlahplayer()
    {
        $jumlah = $this->db()->get();
        return $jumlah;

    }

    public function getpost()
    {
        return $this->db('post')->orderBy('id', 'desc')->get();
    }

    public function getspost($id)
    {
        return $this->db('post')->get()->where('id', $id);
    }

}