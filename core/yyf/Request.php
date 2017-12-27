<?php
/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 17:30
 * get、post等操作
 */

namespace Core\Yyf;


class Request
{
    public $methodParam = '_method';
    /**
     * Returns the method of the current request (e.g. GET, POST, HEAD, PUT, PATCH, DELETE).
     * @return string request method, such as GET, POST, HEAD, PUT, PATCH, DELETE.
     * The value returned is turned into upper case.
     */
    public function getMethod()
    {
        if (isset($_POST[$this->methodParam])) {
            return strtoupper($_POST[$this->methodParam]);
        }

        if (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
            return strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']);
        }

        if (isset($_SERVER['REQUEST_METHOD'])) {
            return strtoupper($_SERVER['REQUEST_METHOD']);
        }

        return 'GET';
    }

    /**
     * Returns whether this is a GET request.
     * @return bool whether this is a GET request.
     */
    public function getIsGet()
    {
        return $this->getMethod() === 'GET';
    }

    /**
     * Returns whether this is an OPTIONS request.
     * @return bool whether this is a OPTIONS request.
     */
    public function getIsOptions()
    {
        return $this->getMethod() === 'OPTIONS';
    }

    /**
     * Returns whether this is a HEAD request.
     * @return bool whether this is a HEAD request.
     */
    public function getIsHead()
    {
        return $this->getMethod() === 'HEAD';
    }

    /**
     * Returns whether this is a POST request.
     * @return bool whether this is a POST request.
     */
    public function getIsPost()
    {
        return $this->getMethod() === 'POST';
    }

    /**
     * Returns whether this is a DELETE request.
     * @return bool whether this is a DELETE request.
     */
    public function getIsDelete()
    {
        return $this->getMethod() === 'DELETE';
    }

    /**
     * Returns whether this is a PUT request.
     * @return bool whether this is a PUT request.
     */
    public function getIsPut()
    {
        return $this->getMethod() === 'PUT';
    }

    /**
     * Returns whether this is a PATCH request.
     * @return bool whether this is a PATCH request.
     */
    public function getIsPatch()
    {
        return $this->getMethod() === 'PATCH';
    }

    /**
     * @return bool
     */
    public function getIsAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    /**
     * Returns whether this is a PJAX request
     * @return bool whether this is a PJAX request
     */
    public function getIsPjax()
    {
        return $this->getIsAjax() && !empty($_SERVER['HTTP_X_PJAX']);
    }

    /**
     * Returns whether this is an Adobe Flash or Flex request.
     * @return bool whether this is an Adobe Flash or Adobe Flex request.
     */
    public function getIsFlash()
    {
        return isset($_SERVER['HTTP_USER_AGENT']) &&
            (stripos($_SERVER['HTTP_USER_AGENT'], 'Shockwave') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Flash') !== false);
    }

    private $_rawBody;

    /**
     * Returns the raw HTTP request body.
     * @return string the request body
     */
    public function getRawBody()
    {
        if ($this->_rawBody === null) {
            $this->_rawBody = file_get_contents('php://input');
        }

        return $this->_rawBody;
    }

    /**
     * Sets the raw HTTP request body, this method is mainly used by test scripts to simulate raw HTTP requests.
     * @param string $rawBody the request body
     */
    public function setRawBody($rawBody)
    {
        $this->_rawBody = $rawBody;
    }


    /**
     * @param null $name
     * @param null $defaultValue
     * @return null
     */
    public function get($name = null, $defaultValue = null)
    {
        if(isset($_GET[$name])){
            $ret =  !empty($name)?$_GET[$name]:$_GET;
            return empty($ret)?$defaultValue:$ret;
        }else{
            return null;
        }

    }

    public function post($name = null, $defaultValue = null){
        if(isset($_POST[$name])){
            $ret =  !empty($name)?$_POST[$name]:$_POST;
            return empty($ret)?$defaultValue:$ret;
        }else{
            return null;
        }
    }

}