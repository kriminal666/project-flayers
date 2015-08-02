<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 2/08/15
 * Time: 11:25
 */

namespace App\Http\Utils;


/**
 * Class Flash
 * @package App\Http\Utils
 */
class Flash
{

    /**
     * @param $title
     * @param $message
     * @param $level
     * @param string $key
     * @return mixed
     */
    public function create($title, $message, $level, $key = 'flash_message')
    {
        return session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]);
    }

    /**
     * @param $title
     * @param $message
     * @return mixed
     */
    public function info($title, $message)
    {

        return $this->create($title, $message, 'info');

    }

    /**
     * @param $title
     * @param $message
     * @return mixed
     */
    public function success($title, $message)
    {

        return $this->create($title, $message, 'success');

    }

    /**
     * @param $title
     * @param $message
     * @return mixed
     */
    public function error($title, $message)
    {

        return $this->create($title, $message, 'error');

    }

    /**
     * @param $title
     * @param $message
     * @param string $level
     * @return mixed
     */
    public function overlay($title, $message, $level = 'sucess')
    {

        return $this->create($title, $message, $level, 'flash_message_overlay');

    }


}