<?php

namespace App\Http\Helpers;

use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;

class UtilsHelper
{
    public static function myProfile($users_id = null)
    {
        if ($users_id == null) {
            $users_id = Auth::id();
        }
        $getUser = User::with('profile')->find($users_id);
        return $getUser;
    }

    public static function uploadFile($file, $lokasi, $id = null, $table = null, $nameAttribute = null)
    {
        if ($file != null) {
            // delete file
            UtilsHelper::deleteFile($id, $table, $lokasi, $nameAttribute);

            // nama file
            $fileExp =  explode('.', $file->getClientOriginalName());
            $name = $fileExp[0];
            $ext = $fileExp[1];
            $name = time() . '-' . str_replace(' ', '-', $name) . '.' . $ext;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload =  public_path() . '/upload/' . $lokasi . '/';

            // upload file
            $file->move($tujuan_upload, $name);
        } else {
            if ($id == null) {
                $name = 'default.png';
            } else {
                $data = DB::table($table)->where('id', $id)->first();
                $setData = (array) $data;
                $name = $setData[$nameAttribute];
            }
        }

        return $name;
    }

    public static function deleteFile($id = null, $table = null, $lokasi = null, $name = null)
    {
        if ($id != null) {
            $data = DB::table($table)->where('id', '=', $id)->first();
            $setData = (array) $data;
            $gambar = public_path() . '/upload/' . $lokasi . '/' . $setData[$name];
            if (file_exists($gambar)) {
                if ($setData[$name] != 'default.png') {
                    File::delete($gambar);
                }
            }
        }
    }

    public static function handleSidebar($treeData)
    {
        $pushData = [];
        function hiddenTree($data, $parentId = null)
        {
            $pushData = [];
            foreach ($data as $index => $item) {
                if ($item['children'] !== null && ($parentId === null || in_array($item['id'], $parentId))) {
                    $childIds = $item['children'];
                    $pushData[] = $childIds;
                    hiddenTree($data, $childIds);
                }
            }
            return $pushData;
        }
        $pushData = hiddenTree($treeData, null);
        $flattenedArray = [];
        foreach ($pushData as $subArray) {
            $flattenedArray = array_merge($flattenedArray, $subArray);
        }
        $hiddenData = [];
        foreach ($flattenedArray as $key => $value) {
            $hiddenData[$value] = $value;
        }

        return $hiddenData;
    }

    public static function tanggalBulanTahunKonversi($tanggal)
    {
        $tanggalWaktu = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal);
        $tanggalIndonesia = $tanggalWaktu->isoFormat('D MMMM Y HH:mm', 'Do MMMM Y HH:mm');
        return $tanggalIndonesia;
    }

    public static function limitTextGlobal($text, $limit = 100)
    {
        if (strlen($text) > $limit) {
            $text = substr($text, 0, $limit);
            $text .= '...';
        }
        return $text;
    }

    public static function formatDate($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::parse($dateNow);
        $formattedDate = $tanggal->format('j F Y');
        return $formattedDate;
    }
    public static function formatDateV2($tanggal_transaction)
    {
        $date = DateTime::createFromFormat('d/m/Y', $tanggal_transaction);
        $tanggal = $date->format('Y-m-d');
        return UtilsHelper::formatDate($tanggal);
    }

    public static function formatDateLaporan($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::parse($dateNow);
        $formattedDate = $tanggal->format('d/m/Y');
        return $formattedDate;
    }

    public static function formatHumansDate($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::createFromFormat('Y-m-d', $dateNow);
        $formattedDate = $tanggal->diffForHumans();
        return $formattedDate;
    }

    public static function integerMonth($month)
    {
        switch ($month) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
            default:
                return 'Januari';
                break;
        }
    }

    public static function monthData()
    {
        return ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    }

    public static function stringMonth($month)
    {
        switch ($month) {
            case 'Januari':
                return 1;
                break;
            case 'Februari':
                return 2;
                break;
            case 'Maret':
                return 3;
                break;
            case 'April':
                return 4;
                break;
            case 'Mei':
                return 5;
                break;
            case 'Juni':
                return 6;
                break;
            case 'Juli':
                return 7;
                break;
            case 'Agustus':
                return 8;
                break;
            case 'September':
                return 9;
                break;
            case 'Oktober':
                return 10;
                break;
            case 'November':
                return 11;
                break;
            case 'Desember':
                return 12;
                break;
            default:
                return 1;
                break;
        }
    }
    public static function formatUang($nominal)
    {
        return number_format($nominal, 0, '.', ',');
    }

    public static function createdApp()
    {
        return 'Bima Ega Farizky';
    }

    public static function renderMenu()
    {
        $dataMenuHome = [
            '/'
        ];
        $isHome = collect($dataMenuHome)->contains(function ($route) {
            return request()->is($route) || str_starts_with(request()->url(), url($route));
        })
            ? true
            : false;
        $dataMenuAuthentication = [
            'profile',
            'login',
            'register',
            'account',
            'logout',
        ];
        $isAuthentication = collect($dataMenuAuthentication)->contains(function ($route) {
            return request()->is($route) || str_starts_with(request()->url(), url($route));
        })
            ? true
            : false;
        $dataMenuAdminPanel = [
            'adminPanel',
            'dashboard',
            'kategoriBarang',
            'barang',
            'satuanBarang',
        ];
        $isAdminPanel =  collect($dataMenuAdminPanel)->contains(function ($route) {
            return request()->is($route) || str_starts_with(request()->url(), url($route));
        });
        $isRealtimeChat = request()->is('/chat') ? true : false;

        $menuHome = [
            [
                'nama' => 'Home',
                'link' => url('/'),
                'is_active' =>  request()->is('/') ? 'active' : '',
            ],
        ];

        $menuProfile = [
            [
                'nama' => 'Profile',
                'link' => url('profile'),
                'condition' => true,
            ],
            [
                'nama' => 'Account',
                'link' => url('account'),
                'condition' => Auth::check(),
            ],
            [
                'nama' => 'Login',
                'link' => url('login'),
                'condition' => !Auth::check(),
            ],
            [
                'nama' => 'Register',
                'link' => url('register'),
                'condition' => !Auth::check(),
            ],
            [
                'nama' => 'Logout',
                'link' => url('logout'),
                'condition' => Auth::check(),
            ],
        ];
        $menuProfile = array_filter($menuProfile, function ($item) {
            return $item['condition'];
        });
        foreach ($menuProfile as $key => $item) {
            $menuProfile[$key]['is_active'] = request()->is(ltrim(parse_url($item['link'], PHP_URL_PATH), '/')) ? 'active' : '';
        }

        $dataActiveAdminPanel = [
            'kategoriBarang',
            'barang',
            'satuanBarang',
        ];
        $menuAdminPanel = [
            [
                'nama' => 'Admin Panel',
                'link' => url('adminPanel'),
                'is_active' =>  request()->is('adminPanel') ? 'active' : '',
            ],
            [
                'nama' => 'Dashboard',
                'link' => url('dashboard'),
                'is_active' =>  request()->is('dashboard') ? 'active' : '',
            ],
            [
                'nama' => 'Data Master',
                'link' => '#',
                'is_active' => collect($dataActiveAdminPanel)->contains(function ($route) {
                    return request()->is($route) || str_starts_with(request()->url(), url($route));
                }) ? 'active' : '',
                'children' => [
                    [
                        'nama' => 'Kategori Barang',
                        'link' => url('kategoriBarang'),
                        'is_active' =>  request()->is('kategoriBarang') ? 'active' : '',
                    ],
                    [
                        'nama' => 'Barang',
                        'link' => url('barang'),
                        'is_active' =>  request()->is('barang') ? 'active' : '',
                    ],
                    [
                        'nama' => 'Satuan Barang',
                        'link' => url('satuanBarang'),
                        'is_active' =>  request()->is('satuanBarang') ? 'active' : '',
                    ],
                ],
            ],
        ];

        $menuChat = [
            [
                'nama' => 'Realtime Chat',
                'link' => url('realtimeChat'),
            ],
            [
                'nama' => 'Ruang Chat',
                'link' => url('ruangChat'),
            ],
            [
                'nama' => 'Join Chat',
                'link' => url('ruangChat'),
            ],
        ];

        $menu = [];
        if ($isHome) {
            $menu = $menuHome;
        }
        if ($isAuthentication) {
            $menu = $menuProfile;
        }
        if ($isAdminPanel) {
            $menu = $menuAdminPanel;
        }
        if ($isRealtimeChat) {
            $menu = $menuChat;
        }
        $html = '';

        foreach ($menu as $item) {
            $btnLogout = $item['nama'] == 'Logout' ? 'btn-logout' : '';
            if (isset($item['children'])) {
                $html .= '<li class="nav-item dropdown">';
                $html .= '<a class="nav-link dropdown-toggle ' . $item['is_active'] . '" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                $html .= $item['nama'];
                $html .= '</a>';
                $html .= '<ul class="dropdown-menu">';
                foreach ($item['children'] as $child) {
                    $html .= '<li><a class="dropdown-item ' . $child['is_active'] . '" href="' . $child['link'] . '">' . $child['nama'] . '</a></li>';
                }
                $html .= '</ul>';
                $html .= '</li>';
            } else {
                $html .= '<li class="nav-item">';
                $html .= '<a class="nav-link ' . $item['is_active'] . ' ' . $btnLogout . '" href="' . $item['link'] . '" >' . $item['nama'] . '</a>';
                $html .= '</li>';
            }
        }

        return $html;
    }
}
