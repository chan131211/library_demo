<?php
/**
 * Created by PhpStorm.
 * User: Chan
 * Date: 2020/3/20
 * Time: 19:38
 */

namespace library\file;
class UploadImage
{

    protected $_keyName;
    //目的路径
    protected $_destinationDir;
    //文件MIME类型的范围
    protected $_allowMime;
    //文件扩展名的范围
    protected $_allowExt;
    //文件大小的范围
    protected $_allowSize;

    //上传文件的名称
    protected $fileName;
    //上传文件的MIME类型
    protected $fileType;
    //上传文件的临时文件名称
    protected $fileTmpName;
    //上传文件时发生的错误
    protected $fileError;
    //上传文件的大小
    protected $fileSize;

    //文件扩展名
    protected $extension;

    //新文件名
    protected $newFileName;

    //新文件的绝对路径
    public $newFileDir;


    //构造方法
    public function __construct($keyName,$destinationDir = './upload',$allowMime = ['image/jpeg','image/jpg','image/png'],$allowExt = ['jpeg','jpg','png'],$allowSize = 5*1024*1024)
    {
        $this->_keyName = $keyName;
        $this->_destinationDir = $destinationDir;
        $this->_allowMime = $allowMime;
        $this->_allowExt = $allowExt;
        $this->_allowSize = $allowSize;

    }
    //文件路径
    public function setDestinationDir($destinationDir)
    {
        $this->_destinationDir = $destinationDir;
    }
    //文件类型
    public function setAllowMime($allowMime)
    {
        $this->_allowMime = $allowMime;
    }
    //文件扩展名
    public function setAllowExt($allowExt)
    {
        $this->_allowExt = $allowExt;
    }
    //文件大小
    public function setAllowSize($allowSize)
    {
        $this->_allowSize = $allowSize;
    }

    //接收$_FILES参数
    public function setFileInfo()
    {
        $this->fileName = $_FILES[$this->_keyName]['name'];
        $this->fileType = $_FILES[$this->_keyName]['type'];
        $this->fileTmpName = $_FILES[$this->_keyName]['tmp_name'];
        $this->fileError = $_FILES[$this->_keyName]['error'];
        $this->fileSize = $_FILES[$this->_keyName]['size'];
    }

    //处理错误
    public function checkError()
    {
        if ($this->fileError > UPLOAD_ERR_OK) {
            throw new \Exception('文件不符合');
        }
        return true;
    }

    //检查MIME类型
    public function checkMime()
    {
        if (!in_array($this->fileType,$this->_allowMime)) {
            throw new \Exception('文件类型错误');
        }
        return true;
    }

    //检查扩展名
    public function checkExt()
    {
        $ext = $this->extension = pathinfo($this->fileName,PATHINFO_EXTENSION);
        if (!in_array($ext,$this->_allowExt)) {
            throw new \Exception('文件扩展名错误');
        }
        return true;
    }

    //检查文件大小
    public function checkSize()
    {
        if ($this->fileSize > $this->_allowSize) {
            throw new \Exception('文件过大');
        }
        return true;
    }

    //生成新的文件名称
    protected function generateNewFileName()
    {
        $this->newFileName = uniqid().'.'.$this->extension;
    }

    //移动文件
    public function moveFile()
    {
        //判断目录是否存在
        if (!file_exists($this->_destinationDir)) {
            mkdir($this->_destinationDir,755,true);
        }
        $path = $this->_destinationDir.'/'.$this->newFileName;
        if (!is_uploaded_file($this->fileTmpName) || move_uploaded_file($this->fileTmpName,$path)) {
            throw new \Exception('文件上传失败');
        }
        $currentDir = dirname(__FILE__);
        $this->newFileDir = $currentDir.$path;
        return true;
    }


}
