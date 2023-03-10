<?php

namespace App\Libs;

use Request;
use DB;
use \Eventviva\ImageResize;
use Config;
use File;
//use App\Libs\Misc;

class Misc {

//    public function

    public static function preparePragraphs($rows) {
        $data = [];
        if ($rows) {
            foreach ($rows as $row) {
                $data[$row->id] = $row;
            }
        }
        return $data;
    }

    public static function uploadAndResize($field, $object, $imageSizes = []) {
        if (!$imageSizes) {
            $imageSizes = Config::get('settings.imageSizes');
        }
        $uploadPath = 'uploads/';
        if (Request::hasFile($field) && Request::file($field)->isValid()) {
            $image = Request::file($field);
            $fileName = rand(111111, 99999999999999999999999) . time() . '.' . $image->getClientOriginalExtension();
            Request::file($field)->move($uploadPath, $fileName);
            $filePath = $uploadPath . $fileName;
            if ($imageSizes) {
                foreach ($imageSizes as $value) {
                    $value = explode(',', $value);
                    $type = $value[0];
                    $dimensions = explode('x', $value[1]);
                    if (!File::exists($uploadPath . $value[1])) {
                        mkdir($uploadPath . $value[1]);
                    }
                    $thumbPath = $uploadPath . $value[1] . '/' . $fileName;
                    $image = new ImageResize($filePath);
                    $image->quality_jpg = 75;
                    if ($type == 'resize')
                        $type = 'resizeToBestFit';
                    $image->$type($dimensions[0], $dimensions[1]);
                    $image->save($thumbPath);
                }
            }
            if ($object->$field) {
                Misc::deleteImage($object->$field);
            }
            $object->$field = $fileName;
            $object->save();
            @unlink($filePath);
        }
    }

    public static function get_configs() {
        $configs = \App\Models\Config::get();
        if ($configs) {
            foreach ($configs as $c) {
                $key = $c->field_name;
                $arr[$key] = $c->value;
            }
            if(@$arr)
                return $arr;
        }
    }

    public static function slug($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string) $str, 'UTF-8', mb_list_encodings());
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => false,
        );
        // Merge options
        $options = array_merge($defaults, $options);
        $char_map = array(
            // Latin
            '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A',
            '??' => 'AE', '??' => 'C',
            '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'I', '??' => 'I',
            '??' => 'I', '??' => 'I',
            '??' => 'D', '??' => 'N', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O',
            '??' => 'O', '??' => 'O',
            '??' => 'O', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U',
            '??' => 'Y', '??' => 'TH',
            '??' => 'ss',
            '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a',
            '??' => 'ae', '??' => 'c',
            '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'i', '??' => 'i',
            '??' => 'i', '??' => 'i',
            '??' => 'd', '??' => 'n', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o',
            '??' => 'o', '??' => 'o',
            '??' => 'o', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u',
            '??' => 'y', '??' => 'th',
            '??' => 'y',
            // Latin symbols
            '??' => '(c)',
            // Greek
            '??' => 'A', '??' => 'B', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Z',
            '??' => 'H', '??' => '8',
            '??' => 'I', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => '3',
            '??' => 'O', '??' => 'P',
            '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'Y', '??' => 'F', '??' => 'X',
            '??' => 'PS', '??' => 'W',
            '??' => 'A', '??' => 'E', '??' => 'I', '??' => 'O', '??' => 'Y', '??' => 'H',
            '??' => 'W', '??' => 'I',
            '??' => 'Y',
            '??' => 'a', '??' => 'b', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'z',
            '??' => 'h', '??' => '8',
            '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => '3',
            '??' => 'o', '??' => 'p',
            '??' => 'r', '??' => 's', '??' => 't', '??' => 'y', '??' => 'f', '??' => 'x',
            '??' => 'ps', '??' => 'w',
            '??' => 'a', '??' => 'e', '??' => 'i', '??' => 'o', '??' => 'y', '??' => 'h',
            '??' => 'w', '??' => 's',
            '??' => 'i', '??' => 'y', '??' => 'y', '??' => 'i',
            // Turkish
            '??' => 'S', '??' => 'I', '??' => 'C', '??' => 'U', '??' => 'O', '??' => 'G',
            '??' => 's', '??' => 'i', '??' => 'c', '??' => 'u', '??' => 'o', '??' => 'g',
            // Russian
            '??' => 'A', '??' => 'B', '??' => 'V', '??' => 'G', '??' => 'D', '??' => 'E',
            '??' => 'Yo', '??' => 'Zh',
            '??' => 'Z', '??' => 'I', '??' => 'J', '??' => 'K', '??' => 'L', '??' => 'M',
            '??' => 'N', '??' => 'O',
            '??' => 'P', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', '??' => 'F',
            '??' => 'H', '??' => 'C',
            '??' => 'Ch', '??' => 'Sh', '??' => 'Sh', '??' => '', '??' => 'Y', '??' => '',
            '??' => 'E', '??' => 'Yu',
            '??' => 'Ya',
            '??' => 'a', '??' => 'b', '??' => 'v', '??' => 'g', '??' => 'd', '??' => 'e',
            '??' => 'yo', '??' => 'zh',
            '??' => 'z', '??' => 'i', '??' => 'j', '??' => 'k', '??' => 'l', '??' => 'm',
            '??' => 'n', '??' => 'o',
            '??' => 'p', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u', '??' => 'f',
            '??' => 'h', '??' => 'c',
            '??' => 'ch', '??' => 'sh', '??' => 'sh', '??' => '', '??' => 'y', '??' => '',
            '??' => 'e', '??' => 'yu',
            '??' => 'ya',
            // Ukrainian
            '??' => 'Ye', '??' => 'I', '??' => 'Yi', '??' => 'G',
            '??' => 'ye', '??' => 'i', '??' => 'yi', '??' => 'g',
            // Czech
            '??' => 'C', '??' => 'D', '??' => 'E', '??' => 'N', '??' => 'R', '??' => 'S',
            '??' => 'T', '??' => 'U',
            '??' => 'Z',
            '??' => 'c', '??' => 'd', '??' => 'e', '??' => 'n', '??' => 'r', '??' => 's',
            '??' => 't', '??' => 'u',
            '??' => 'z',
            // Polish
            '??' => 'A', '??' => 'C', '??' => 'e', '??' => 'L', '??' => 'N', '??' => 'o',
            '??' => 'S', '??' => 'Z',
            '??' => 'Z',
            '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'l', '??' => 'n', '??' => 'o',
            '??' => 's', '??' => 'z',
            '??' => 'z',
            // Latvian
            '??' => 'A', '??' => 'C', '??' => 'E', '??' => 'G', '??' => 'i', '??' => 'k',
            '??' => 'L', '??' => 'N',
            '??' => 'S', '??' => 'u', '??' => 'Z',
            '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'g', '??' => 'i', '??' => 'k',
            '??' => 'l', '??' => 'n',
            '??' => 's', '??' => 'u', '??' => 'z'
        );
        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }

    public static function unique_slug($text, $tableName, $id = NULL) {
        $slug = self::slug($text);
        //slug check
        $i = 0;
        check:
        $suffix = ($i) ? "-" . $i : "";
        $row = DB::table($tableName);
        if ($id)
            $row->where("id", "!=", $id);
        $row = $row->whereSlug($slug . $suffix)->first();
        if ($row) {
            $i ++;
            goto check;
        }
        return $slug . $suffix;
        ////////
    }

    public static function language() {
        $lang_uri = URI::segment(1);
        $lang = Config::get('application.language');
        if (!Session::get("language")) {
            Session::put('language', $lang);
        }
        $languages = @Config::get('application.languages');
        if (@$languages) {
            if (in_array($lang_uri, $languages)) {
                Session::put('language', $lang_uri);
            }
            Config::set('application.language', Session::get('language'));
            return Redirect::to("/" . Session::get('language') . '/' . URI::current());
        }
    }

    public static function strip($text) {
        return strip_tags($text, '<br><p><a><b><u><i><ul><ol><li><table><tr><td><th><tbody><thead>');
    }

    public static function google_map_url($url) {
        $query = parse_url($url);
        $query = @$query['query'];
        $query = str_replace("&", "&amp;", $query);
        $url = "https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=" . $query . "&amp;output=embed";
        return $url;
    }

    public static function build_lang_array($lang, $depth = 1) {
        $out = '';
        if (!@$lang)
            return false;
        foreach ($lang as $key => $value) {
            if (is_array($value)) {
                $out .= str_repeat("\t", $depth) . "'" . $key . "' => array(\n";
                $out .= self::build_lang_array($value, ++$depth) . "\n";
                $out .= str_repeat("\t", --$depth) . "),\n";
                $depth = 1;
                continue;
            }
            $out .= str_repeat("\t", $depth) . "'" . $key . "' => '" . $value . "',\n";
        }
        return $out;
    }

    public static function followLink($url) {
        $link = "http://api.longurl.org/v2/expand?format=json&url=" . urlencode($url) . "&all-redirects=1&title=1&meta-keywords=1&meta-description=1";
        $response = @file_get_contents($link);
        if ($response)
            $obj = json_decode($response, TRUE);
        $obj = $obj['long-url'];
        if ($obj)
            return $obj;
    }

    public static function get_country($ip) {
        $curlURL = @sprintf('http://freegeoip.net/json/%s', trim($ip));
        $ch = curl_init();
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                  // Return the actual result
        @curl_setopt($ch, CURLOPT_URL, $curlURL);                      // Use the URL constructed previously
        @curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // Set the timeout so we don't take forever to load the page
        $data = @curl_exec($ch);                                     // Execute the call
        curl_close($ch);
        // The call returns JSON, convert it to a stdClass object
        $geo = @json_decode($data);
        return @$geo;
    }

    public static function country() {
        if (!Session::has('country')) {
            Bundle::start('freegeoip');
            $country = FreeGeoIP::country_code();
            $row = DB::table("countries")->where_iso2($country)->first();
            if ($row)
                Session::put('country', $row->id);
            else
                Session::put('country', 1);
        }
    }

    public static function unslug($string, $seperator = "-") {
        $string = str_replace($seperator, " ", $string);
        $string = ucfirst($string);
        return $string;
    }

    public static function relativeTime($time) {
        $second = 1;
        $minute = 60 * $second;
        $hour = 60 * $minute;
        $day = 24 * $hour;
        $month = 30 * $day;
        //$time=strtotime($time);
        $delta = strtotime('+0 hours') - $time;
        if ($delta < 2 * $minute) {
            return "1 min ago";
        }
        if ($delta < 45 * $minute) {
            return floor($delta / $minute) . " min ago";
        }
        if ($delta < 90 * $minute) {
            return "1 hour ago";
        }
        if ($delta < 24 * $hour) {
            return floor($delta / $hour) . " hours ago";
        }
        if ($delta < 48 * $hour) {
            return "yesterday";
        }
        if ($delta < 30 * $day) {
            return floor($delta / $day) . " days ago";
        }
        if ($delta < 12 * $month) {
            $months = floor($delta / $month / 30);
            return $months <= 1 ? "1 month ago" : $months . " months ago";
        } else {
            $years = floor($delta / $month / 365);
            return $years <= 1 ? "1 year ago" : $years . " years ago";
        }
    }

    public static function meta_keyword($text) {
        $string = strip_tags(trim($text));
        $string = str_replace(".", " ", $string);
        $stopWords = array('.', 'i', 'a', 'about', 'an', 'and', 'are', 'as', 'at',
            'be', 'by', 'com', 'de', 'en', 'for', 'from', 'how', 'in', 'is', 'it',
            'la', 'of', 'on', 'or', 'that', 'the', 'this', 'to', 'was', 'what', 'when',
            'where', 'who', 'will', 'with', 'und', 'the', 'www', 'and/or', '{', '}',
            ')', '(', 'that\'s');
        $arr = explode(" ", $string);
        $words = array();
        if ($arr) {
            foreach ($arr as $r) {
                $r = strtolower($r);
                if (!empty($r) and ! in_array($r, $words) and ! in_array($r, $stopWords) and ! is_numeric($r)) {
                    $words[] = trim($r);
                }
            }
        }
        if ($words)
            return implode(', ', $words);
    }

    public static function explore_directory($dirPath) {
        if ($handle = @opendir($dirPath)) {
            while (false !== ($file = @readdir($handle))) {
                if ($file != "." && $file != "..") {
                    if (@is_dir("$dirPath/$file")) {
                        $arr[] = "$file";
                    }
                }
            }
            closedir($handle);
        }
        if (@$arr)
            return $arr;
    }

    public static function dir_read($dir, $ignore = array()) {
        $files = scandir($dir);
        $dir_contents = array();
        foreach ($files as $file) {
            if ($file == '.' OR $file == '..') {
                continue;
            }
            // Ignore files specified
            if (!in_array($file, $ignore)) {
                $dir_contents[] = $file;
            }
        }
        return $dir_contents;
    }

    public static function viewValue($value, $type) {
        $suffix = "";
        if ($value) {
            if ($type == "image") {
                if (File::exists("uploads/small/" . $value)) {
                    $suffix.='<div style="background-color:#aeb2b7; width:80px;">';
                    $suffix.='<img class="cropped_preview" src="uploads/small/' . $value . '" width="80">';
                    $suffix.='</div>';
                }
            } elseif ($type == "more_images") {
                if (File::exists("uploads/small/" . $value)) {
                    $suffix.='<div class="col-xs-4 col-sm-4 col-md-3">';
                    $suffix.='<p class="image_preview">';
                    $suffix.='<img class="cropped_preview" src="uploads/small/' . $value . '" width="80">';
//                    $suffix.='<p><a class="btn btn-danger" href="admin/images/delete/' . $value . '" data-confirm="' . trans("admin.Are you sure you want to delete this item") . '?' . '" data-title="' . trans('admin.Confirmation message') . '"><i class="fa fa-trash-o"></i> ' . trans('admin.Delete') . '</a></p>';
                    $suffix.='<p><a class="delete_image btn btn-danger" href=admin/images/delete/' . $value . '><i class="fa fa-trash-o"></i>??????</a></p>';
                    $suffix.='</p>';
                    $suffix.='</div>';
                }
            } elseif ($type == "file") {
                if (File::exists("uploads/" . $value)) {
                    //$suffix.='<img class="cropped_preview" src="'.URL::base()."/uploads/50x50/".$value.'">';
                    $suffix.=$value.' <a href="uploads/' . $value . '" class="btn btn-success" target="_blank">'.trans("admin.Download") . '</a>';
                }
            } elseif ($type = "youtube") {
                $value = Misc::youtube_id($value);
                $suffix = '<iframe width="150" height="113" src="http://www.youtube.com/embed/' . $value . '?rel=0;showinfo=0;controls=0" frameborder="0" allowfullscreen></iframe>';
            } elseif ($type = "vimeo") {
                $value = Misc::vimeo_id($value);
                $suffix = '<iframe src="http://player.vimeo.com/video/' . $value . '?byline=0&portrait=0" width="150" height="113" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
            }
        }
        return $suffix;
    }

    public static function deleteImage($file_name = "", $path = "uploads/") {
        if (!@$file_name)
            return false;
        $directories = Misc::explore_directory($path);
        if ($directories) {
            if (File::exists($path . $file_name))
                File::delete($path . $file_name);
            foreach ($directories as $dir) {
                if (File::exists($path . $dir . '/' . $file_name))
                    File::delete($path . $dir . '/' . $file_name);
            }
        }
    }

    public static function deleteFile($file_name = "", $path = "uploads/") {
        if (!@$file_name)
            return false;
        if (File::exists($path . $file_name))
            @File::delete($path . $file_name);
    }

    public static function youtube_id($link) {
        if ($link) {
            if (strstr($link, '?v=')) {
                $query = parse_url($link, PHP_URL_QUERY);
                parse_str($query, $params);
                if (@$params['v']) {
                    $id = $params['v'];
                    if (@$params['t']) {
                        $id = $id . "?start=" . $params['t'] . "&";
                    }
                    if (@$params['start']) {
                        $id = $id . "?start=" . $params['start'] . "&";
                    }
                    return $id;
                }
            } else {
                if (strstr($link, 'embed')) {
                    $id = trim(substr(strstr($link, 'embed'), 6));
                } else {
                    $links = explode('/', $link);
                    if (@$links[sizeof($links) - 1]) {
                        $id = trim($links[sizeof($links) - 1]);
                    } else {
                        if (@$links[sizeof($links) - 2])
                            $id = trim($links[sizeof($links) - 2]);
                    }
                }
            }
            if (strlen($id) > 11)
                return substr($id, strlen($id) - 11, 11);
            else
                return $id;
        }
        return false;
    }

    public static function vimeo_id($link) {
        $link = explode('/', $link);
        $link = $link[sizeof($link) - 1];
        return $link;
    }

    public static function get_flickr_photoset_id($url) {
        preg_match("#sets/(\w+)#", $url, $matches);
        return $matches[1];
    }

    public static function get_flickr_owner($url) {
        $url = explode('/', $url);
        return $url[4];
    }

    public static function get_play_list_id($url) {
        $play_list = parse_url($url);
        $play_list = explode('&', $play_list['query']);
        $play_list = explode('=', $play_list[0]);
        $play_list_id = $play_list[1];
        return $play_list_id;
    }

    public static function file_get_contents_curl($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        if ($data)
            return $data;
    }

    public static function send_request($url, $method, $parameters = array()) {
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        $query_string.=http_build_query($parameters);

        if ($method == "GET") {
            $url = $url . "?" . $query_string;
            curl_setopt($ch, CURLOPT_GET, count($parameters));
            curl_setopt($ch, CURLOPT_GETFIELDS, $query_string);
        } elseif ($method == "POST") {
            curl_setopt($ch, CURLOPT_POST, count($parameters));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
        }
        $data = curl_exec($ch);
        curl_close($ch);
        if ($data)
            return $data;
    }

}

?>
