<?php
namespace rs\linkshare\Application\Model;

class rs_linkshare extends \OxidEsales\Eshop\Core\Model\MultiLanguageModel
{

    protected $_sClassName = 'rs_linkshare';
    
    //multilang fields
    protected $_aFieldNames = [
        'rstitle' => true,
        'rsdescription' => true,
        'rsimage' => true,
    ];
    
    public function __construct()
    {
        parent::__construct();
        $this->init('rs_linkshare');
    }
    
    public function loadType($oxid, $sType)
    {
        //getting at least one field before lazy loading the object
        $this->_addField('oxid', 0);
        $query = $this->buildSelectString([$this->getViewName() . '.oxid' => $oxid, $this->getViewName() . '.rstype' => $sType]);
        $this->_isLoaded = $this->assignRecord($query);

        return $this->_isLoaded;
    }
    public function loadTypeInLang($language, $oxid, $sType)
    {
        // set new lang to this object
        $this->setLanguage($language);
        // reset
        $this->_sViewTable = false;

        return $this->loadType($oxid,$sType);
    }
    
    protected function _getPathFolder()
    {
        $sPath = $this->getConfig()->getOutDir(true).'pictures/rs_linkshare';
        @mkdir($sPath);
        $sPath.= "/";
        return $sPath;
    }
    
    protected function _getPathFile()
    {
        $sPath = $this->_getPathFolder();
        $sFilename = $this->rs_linkshare__rsimage->value;
        if($sFilename!="" && file_exists($sPath.$sFilename))
                return $sPath.$sFilename;
        return "";
    }
    
    public function getUrlFile()
    {
        if($this->_getPathFile()!="")
        {
            $sPath = $this->getConfig()->getOutUrl().'pictures/rs_linkshare/';
            $sFilename = $this->rs_linkshare__rsimage->value;
            return $sPath.$sFilename;
        }
        return "";
    }
    
    public function uploadPicture()
    {
        $aFiles = $_FILES['rs_linkshare__rsimage'];
        if($aFiles['tmp_name']!="")
        {
            $sSource = $aFiles['tmp_name'];
            $sName = $aFiles['name'];
            
            $path_parts = pathinfo($sName);
            $sExtension = strtolower("".$path_parts['extension']);
            
            if($sExtension=="jpg" || $sExtension=="png")
            {
                $sPath = $this->_getPathFolder();
                
                $sFilename = $this->rs_linkshare__rstype->value."_".$this->getId()."_".$this->getLanguage().".".$sExtension;
                move_uploaded_file($sSource, "$sPath/$sFilename");
                
                $aData=[];
                $aData['rs_linkshare__rsimage']=$sFilename;
                $this->assign($aData);
                $this->save();
            }
        }
    }
    public function deletePicture()
    {
        $sFilePath = $this->_getPathFile();
        if($sFilePath!="")
            @unlink($sFilePath);
        
        $aData=[];
        $aData['rs_linkshare__rsimage']=null;
        $this->assign($aData);
        $this->save();
    }
}
