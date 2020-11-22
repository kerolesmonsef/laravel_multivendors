<?php

namespace App\MYMODEL\Helpers;

use App\Logging\Api_log;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Myhelper
{

    public static function DieError(int $response_code = null, string $error_key, string $error_message): void
    {
        if ($response_code) {
            Api_log::SAVE_API_LOG($response_code);
            echo json_encode(['status' => 'fail', 'response_code' => $response_code, 'errors' => [$error_key => [$error_message]]]);
        } else {
            echo json_encode(['status' => 'fail', 'errors' => [$error_key => [$error_message]]]);
        }
        die();
    }

    public static function isMobileNumber($value)
    {
        return preg_match("/^\+?[0-9]{8,20}$/u", $value);
    }

    public static function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function CurrentRequestMethod(): string
    {
        $action = app('request')->route()->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        return $action;
    }

    public static function CurrentRequestID()
    {
        $action = Myhelper::CurrentRequestMethod();
        $request_id = substr($action, strpos($action, "_") + 1);
        return $request_id;
    }

    public static function Utf8StringToHexString(string $string)
    {
        $conv = array();
        $convmap = array(0x0, 0xffff, 0, 0xffff);
        $strlen = mb_strlen($string, "UTF-8");
        for ($i = 0; $i < $strlen; $i++) {
            $ch = mb_substr($string, $i, 1, "UTF-8");
            $decimal = substr(mb_encode_numericentity($ch, $convmap, 'UTF-8'), -5, 4);
            $conv[] = base_convert($decimal, 10, 16);
        }

        for ($i = 0; $i < count($conv); $i++) {
            if (strlen($conv[$i]) == 1) {
                $conv[$i] = "000" . $conv[$i];
            } else if (strlen($conv[$i]) == 2) {
                $conv[$i] = "00" . $conv[$i];
            } else if (strlen($conv[$i]) == 3) {
                $conv[$i] = "0" . $conv[$i];
            }
        }
        return implode('', $conv);
    }

    public static function Is_ASCII_EnglishFormat(string $str): bool
    {
        $Is_Ascii = mb_detect_encoding($str, 'ASCII', true);
        return $Is_Ascii != false;
    }

    public static function ListDir(string $path): array
    {
        $sub_dirs = [];
        $dir_to_check = scandir($path);
        foreach ($dir_to_check as $item) {
            if ($item != '..' && $item != '.' && is_dir($path . "/" . $item)) {
                $sub_dirs[] = $item;
            }
        }
        return $sub_dirs;
    }

    /**
     * change file name
     * @param string $name
     * @return string
     */
    public static function c_file_name(string $perfix = "", string $name): string
    {
        $logo_file_name = $perfix . rand() % 995457 . "__" . time() . "__" . $name;
        return $logo_file_name;
    }

    public static function isAssoc(array $arr)
    {
        if (array() === $arr)
            return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    public static function AND_OR_Where(): array
    {
        /**
         * @var Builder $where
         * @var Builder $WhereHas
         * @var Builder $whereBetween
         * @var Builder $whereDate
         * @var Builder $whereIn
         * @var Builder $whereRaw
         */
        $where = (!is_null(request()->input('and'))) ? "where" : "orwhere";
        $WhereHas = (!is_null(request()->input('and'))) ? "WhereHas" : "OrWhereHas";
        $whereBetween = (!is_null(request()->input('and'))) ? "whereBetween" : "OrwhereBetween";
        $whereDate = (!is_null(request()->input('and'))) ? "whereDate" : "OrwhereDate";
        $whereIn = (!is_null(request()->input('and'))) ? "whereIn" : "OrwhereIn";
        $whereRaw = (!is_null(request()->input('and'))) ? "whereRaw" : "OrwhereRaw";
        return [$where, $WhereHas, $whereBetween, $whereDate, $whereIn, $whereRaw];
    }

    /**
     * @param int $width
     * @param int $high
     * @param string $saved_path
     * @param string $file_name | storage\\files\tickets
     * @return string
     */
    public static function getRandomImage(int $width, int $high, string $saved_path, string $file_name)
    {

        $url = "http://lorempixel.com/$width/$width/";
        $image = file_get_contents($url);
//        file_put_contents(("storage\\files\\$file_name"), $image);
        File::put("$saved_path/$file_name", $image);
        return $file_name;
    }


}
