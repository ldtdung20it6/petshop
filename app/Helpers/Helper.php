<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .='
                <tr>
                <td>' . $menu->id . '</td>
                <td>'.$char.$menu->name.'</td>
                <td>'.self::active($menu->active).'</td>
                <td>'.$menu->updated_at.'</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/menus/edit/ '.$menu->id.'"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('.$menu->id.',\'/admin/menus/destroy\')"><i class="fas fa-trash"></i></a>
                </td>
                </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus,$menu->id,$char.'--');
            }
        }
        return $html;
    }
    public static function active($active = 0) : string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>':'<span class="btn btn-success btn-xs">YES</span>';
    }

    public static function menus($menus, $parent_id = 0)
    {
        $html = '';
        foreach($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= '
                <li class="nav-item dropdown">
                <a  class="nav-link text-black hover-text-red" href = "/danh-muc/'. $menu->id . '-' . Str::slug($menu->name,'-') .'.html">
                    '. $menu->name.'
                    </a>';

                    unset($menus[$key]);

                    if(self::isChild($menus,$menu->id)){
                        $html .='<ul class ="dropdown-menu">';
                        $html .= self::menus($menus, $menu->id);
                        $html .= '</ul>';
                    }
                    $html .='</li>';



            }
        }
        return $html;
    }
    public static function isChild($menus, $id) : bool
    {
        foreach($menus as $menu){
            if($menu->parent_id == $id){
                return true;
            }
        }
        return false;
    }
    public static function price($price =0 , $priceSale =0)
    {
        if($priceSale != 0) return number_format($priceSale) ;
        if($price != 0) return number_format($price) ;
        return '<a href ="/lien-he">Liên Hệ</a>';
    }
    public static function role($roles, $parent_id = 0 , $char = '')
    {

        $html = '';

        foreach ($roles as $key => $role){
            if($role->parent_id == $parent_id){
                $html .='
                <tr>
                <td>' . $role->id . '</td>


                <td>'.$char.$role->fullname.'</td>
                <td>'.$char.$role->email.'</td>
                <td>'.$role->phone.'</td>
                <td>'.$char.$role->address.'</td>
                <td>'.self::roles($role->role).'</td>

                <td>
                <a class="btn btn-primary btn-sm" href="/admin/roles/edit/ '.$role->id.'"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('.$role->id.',\'/admin/roles/destroy\')"><i class="fas fa-trash"></i></a>
                </td>
                </tr>
                ';

                unset($roles[$key]);

                $html .= self::role($roles,$role->id,$char.'--');
            }
        }
        return $html;
    }
    public static function roles($role) : string
    {
        if($role == 'admin'){
            return'<span class="btn btn-danger btn-xs">Admin</span>';
        }elseif($role == 'employee'){
            return '<span class="btn btn-warning btn-xs">Employee</span>';
        }else{
            return '<span class="btn btn-success btn-xs">User</span>';
        }
    }
    public static function supplier($suppliers, $parent_id = 0 , $char = '')
    {

        $html = '';

        foreach ($suppliers as $key => $supplier){
            if($supplier->parent_id == $parent_id){
                $html .='
                <tr>
                <td>' . $supplier->id . '</td>
                <td>'.$char.$supplier->name.'</td>
                <td>'.$char.$supplier->email.'</td>
                <td>'.$supplier->phone.'</td>
                <td>'.$char.$supplier->address.'</td>
                <td>'.$char.$supplier->supplying.'</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/roles/edit/ '.$supplier->id.'"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('.$supplier->id.',\'/admin/roles/destroy\')"><i class="fas fa-trash"></i></a>
                </td>
                </tr>
                ';

                unset($suppliers[$key]);

                $html .= self::supplier($suppliers,$supplier->id,$char.'--');
            }
        }
        return $html;
    }
    public static function shipPing($shippings , $customers = 0 ,$char = ''){
        $html = '';
        foreach($shippings as $key => $shipping)
        if($shipping->customers == $customers){
        $html .='
        <tr>
                    <td>' . $shipping->id . '</td>
                <td>' . $shipping->name . '</td>
                <td>'.$char.$shipping->phone.'</td>
                <td>'.$char.$shipping->email.'</td>
                <td>'.$shipping->created_at.'</td>
                <td>'.self::shipPings($shipping->shipping).'</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/customers/view/ '.$shipping->id.'"><i class="fas fa-eye"></i></a>
                <a class="btn btn-warning btn-sm" href="customers/{id}/shippings" '.$shipping->id.'"><i class="fas fa-truck"></i></a>
                <a class="btn btn-success btn-sm" href="customers/{id}/delivered" '.$shipping->id.'"><i class="fas fa-user"></i></a>
                </td>
                </tr>
                    ';
                    unset($shippings[$key]);

                $html .= self::shipPing($shippings,$shipping->id,$char.'--');
            }
        return $html;
    }


    public static function shipPings($shipping = '') : string
    {
        if($shipping == 2){
            return '<span class="btn btn-success btn-xs">Đã Giao Hàng</span>';
        }elseif($shipping == 1){
            return '<span class="btn btn-warning btn-xs">Đang Giao Hàng</span>';
        }else{
            return '<span class="btn btn-danger btn-xs">Chưa Giao Hàng</span>';
        }
    }
}
