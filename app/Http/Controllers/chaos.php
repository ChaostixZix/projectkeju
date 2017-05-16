<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\chaos_model;
use Aws\S3\S3Client;
use Aws\Credentials\CredentialsInterface as Cre;
use Aws\Credentials\CredentialProvider;

class chaos extends BaseController
{
    public function chaos()
    {
        return new chaos_model();
    }

    public function test($name = 'babix.png', $path = '')
    {
        $c = new S3Client(array(
            'version' => 'latest',
            'region' => 'us-west-2',
            'credentials' => array(
                'key' => 'AKIAJBXWMJ5PZHKF22RQ',
                'secret' => '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'
            )
        ));
        $result = $c->putObject(array(
            'Bucket'     => 'chaostix',
            'Key'        => $name,
            'SourceFile' => '/kejucraft',
            'Metadata'   => array(
                'Foo' => 'abc',
                'Baz' => '123'
            )
        ));
        $response = $result->toArray();

    }

    public function index(Request $request)
    {
        if(empty($request->session()->get('user')))
        {
            return redirect()->route('login');
        }else{
            return redirect()->route('dash');
        }
    }

    public function login(Request $request)
    {
        if(!empty($request->session()->get('user')))
        {
            return redirect()->route('dash');
        }else{
            return view('kc.login');
        }
    }

    public function login_post(Request $request)
    {
        $cek = $this->chaos()->login_user($request->input('username'), $request->input('password'));
        $rank = $this->chaos()->getrank($request->input('username'));

        if($cek == 1)
        {
            session(['user' => $request->input('username'), 'rank' => $rank]);
            return redirect()->route('dash');
        }else{
            return redirect()->route('login');
        }
    }

    public function dash($page = "dash", $arg = 1, Request $request)
    {
        if(empty($request->session()->get('user')))
        {
            return redirect()->route('login');
        }else{
            $user = $request->session()->get('user');
            $data = [
                'user' => $request->session()->get('user'),
                'rank' => $this->chaos()->getrank($user)->pluck('userGroup')[0],
                'userdata' => $this->chaos()->get_user_data($user),
                'money' => $this->chaos()->get_user_money($user),
                'pesan' => $this->chaos()->get_inbox($user, true),
                'daftarpesan' => $this->chaos()->get_inbox($user, false),
                'datarank' => $this->chaos()->get_rank_data(),
                'hargaranksekarang' => $this->chaos()
                    ->get_rank_detail($this
                        ->chaos()->getrank($request
                            ->session()->get('user'))
                        ->pluck('userGroup')[0]),
                'jumlahuser' => count($this->chaos()->jumlahplayer()),
                'post' => $this->chaos()->getpost(),
                'datapost' => $this->chaos()->getspost($arg),
                'userlist' => $this->chaos()->jumlahplayer()
            ];
            return view("kc." . $page)
                ->with('user', $data['user'])
                ->with('rank', $data['rank'])
                ->with('userdata', $data['userdata'])
                ->with('money', $data['money'])
                ->with('pesan', $data['pesan'])
                ->with('daftarpesan', $data['daftarpesan'])
                ->with('datarank', $data['datarank'])
                ->with('hargaranksekarang', $data['hargaranksekarang'])
                ->with('jumlahuser', $data['jumlahuser'])
                ->with('post', $data['post'])
                ->with('datapost', $data['datapost'])
                ->with('userlist', $data['userlist']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('index');
    }

    public function donate($rank, Request $request)
    {
        if(empty($request->session()->get('user')))
        {
            return redirect()->route('login');
        }else{
            $harga = $this->chaos()->get_rank_data($rank)->pluck('harga')[0];
            $do = $this->chaos()->buyrank($rank, $harga, $request->session()->get('user'));
            if($do == 1)
            {
                return redirect('panel/donate')->with('message', 'success');
            }elseif($do == 0){
                return redirect('panel/donate')->with('message', 'kurang');
            }elseif($do == 3){
                return redirect('panel/donate')->with('message', 'sell');
            }else{
                return redirect('panel/donate')->with('message', 'error');
            }
        }
    }

    public function cpw(Request  $request)
    {
        if(empty($request->session()->get('user')))
        {
            return redirect()->route('login');
        }else{
            $oldpass = $this->chaos()->get_password($request->session()->get('user'));
            $oldpass = $oldpass[0];
            $oldpw = $request->input('oldpass');
            $newpw = $request->input('newpass');
            if($oldpass == $oldpw)
            {
                $do = $this->chaos()->update_password($request->session()->get('user'), $newpw);
                if($do == 1)
                {
                    return redirect('panel/profile')->with('message', 'success');
                }elseif($do == 0){
                    return redirect('panel/profile')->with('message', 'salah');
                }
            }else{
                return redirect('panel/profile')->with('message', 'beda');
            }
        }
    }

    public function addpost(Request $request)
    {
        if(empty($request->session()->get('user')))
        {
            return redirect()->route('login');
        }else{
            $judul = $request->input('judul');
            $content = $request->input('content');
            $poster = $request->session()->get('user');
            $do = $this->chaos()->addpost($judul, $content, $poster);
            if($do == 1)
            {
                return redirect('panel/addpost')->with('message', 'success');
            }else{
                return redirect('panel/addpost')->with('message', 'gagal');
            }
        }
    }

    public function sellrank(Request $request)
    {
        if(empty($request->session()->get('user')))
        {
            return redirect()->route('login');
        }else{
            $do = $this->chaos()->sellrank($request->session()->get('user'));
            if($do == 1)
            {
                return redirect('panel/donate')->with('message', 'sellrank');
            }else{
                return redirect('panel/donate', 'gagalsellrank');
            }
        }
    }


}
