<?php



// class Helper{
//     public function route($path_url, $function){

//         $is_valid=true;
        
//         $address_bar_url=$_SERVER['PATH_INFO'] ?? NULL;
//         $address_bar_url=rtrim($address_bar_url,'/');
//         $address_bar_url=ltrim($address_bar_url,'/');

//         $abu_data=explode('/',$address_bar_url);
//         $pu_data=explode('/',$path_url);
//         $data=array();
//         foreach($pu_data as $index=>$parameter){
//             // if(!isset($abu_data[$index])) return;
//             // if($abu_data[$index]==$parameter){

//             // }elseif(strpos($parameter,'$')){
//             //     $data[ltrim($parameter,'$')]=$abu_data[$index];
//             // }
//             // else{
//             //     $is_valid=false;
//             // }
//             if ($abu_data[$index] == $parameter) {

//             } elseif (strpos($parameter, '$') !== false) {
//                 $data[ltrim($parameter, '$')] = $abu_data[$index];
//             } else {
//                 $is_valid = false;
//             }
            
//         }
        

//         // echo "<pre>";
//         // print_r($abu_data);
//         // print_r($pu_data);
        

//         if($is_valid) $function($data);
        
//     }
// }

//updated

class Helper {

    public static $isPageIsAvilable=false;

    public function loadcss($file_name){
    return ASSET_URL.'/css/'.$file_name.'?v='.time();
    }
    public function UID(){
        $str='xyzqwtyu'.time();
        return str_shuffle($str);
    }
    public function loadjs($file_name){
    return ASSET_URL.'js/'.$file_name;
    }
    public function loadimage($file_name){
    return ASSET_URL.'/image/'.$file_name;
    }
    public function url($route){
    return SITE_URL.$route;
    }
    public function redirect($route){
    header("location:".SITE_URL.$route);
    }

    public function isAnyEmpty($array){
        foreach($array as $key=>$value ){
            if(!$value) return $key;
        }
    }




    public function route($path_url, $function) {
        $address_bar_url = $_SERVER['PATH_INFO'] ?? NULL;
        if(!$address_bar_url && $path_url=='/'){
            self::$isPageIsAvilable=true;
            $function(array());
        }
        $is_valid = true;
        
       
        $address_bar_url = rtrim($address_bar_url, '/');
        $address_bar_url = ltrim($address_bar_url, '/');

        $abu_data = explode('/', $address_bar_url);
        $pu_data = explode('/', $path_url);
        $data = array();
        foreach ($pu_data as $index => $parameter) {
            if(!isset($abu_data[$index])) return;
            if (isset($abu_data[$index])) {
                if ($abu_data[$index] == $parameter) {

                } elseif (strpos($parameter, '$') !== false) {
                    $data[ltrim($parameter, '$')] = $abu_data[$index];
                } else {
                    $is_valid = false;
                }
            } else {
                $is_valid = false;
            }
        }

        if ($is_valid) {
            self::$isPageIsAvilable=true;
            $function($data);
        }
    }
}
