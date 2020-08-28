<?php

if (!function_exists('get_date')) {
    function get_date($date, $format = 'd, M Y')
    {
        $new_date = new DateTime($date);
        return $new_date->format($format);
    }
}

if (!function_exists('get_timeago')) {
    function get_timeago( $ptime )
    {
        $estimate_time = time() - $ptime;

        if( $estimate_time < 1 )
        {
            return 'less than 1 second ago';
        }

        $condition = array(
                    12 * 30 * 24 * 60 * 60  =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $estimate_time / $secs;

            if( $d >= 1 )
            {
                $r = round( $d );
                return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
}    


if (!function_exists('img_upload')) {
    function img_upload($img_name, $img_path,$type = 'jpg|jpeg|png')
    {
        $ci =& get_instance();
        $config = array(
            'upload_path' => $img_path,
            'allowed_types' => $type,
            'filename' => $img_name['profile_pic']['name']
        );
        $ci->load->library('upload', $config);
        if ($ci->upload->do_upload('profile_pic')) {
            $logo = array('upload_data' =>$ci->upload->data());
            $site_icon = array('upload_data' => array('file_name' =>"" , ));
            return $img = $logo['upload_data']['file_name'];
        }else{
            return ['status' => 'error' ,'msg' => $ci->upload->display_errors()];            
        }
    }
}

if (!function_exists('get_full_time')) {
    function get_full_time($datetime)
    {
        return get_date($datetime, 'd, M Y @ h:i A');
    }
}

if (!function_exists('dummy_image')) {
    function dummy_image($type = null)
    {
        switch ($type) {
            case 'drivers':
                return base_url('assets/images/faces/face1.jpg');
            case 'tablets':
                return base_url('assets/images/dummy/tablet.jpg');
            default:
                return base_url('assets/images/dummy/4.jpg');
        }
    }
}

function getAllMonths()
{
    return [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
}
