<?php

namespace RestKlient\Producer;

use RestKlient\BaseISklepApiModel;
use RestKlient\IOneCreatable;
use RestKlient\IAllGetable;
use CurlWrapper\GetResponser;
use CurlWrapper\CustomRequestResponser;

final class ProducerApiModel extends BaseISklepApiModel implements IOneCreatable, IAllGetable{
    public const API_METHOD = 'producers';
    protected $siteUrl;
    protected $logoFilename;
    protected $ordering;
    protected $sourceId;

    public function __construct($pId = null, $pName = null, $pSiteUrl = null, $pLogoFilename = null, $pOrdering = null, $pSourceId = null){
        parent::__construct($pId, $pName);
        $this->siteUrl = $pSiteUrl;
        $this->logoFilename = $pLogoFilename;
        $this->ordering = $pOrdering;
        $this->sourceId = $pSourceId;
    }

    public function getAll(){
        $responser = new GetResponser;
        return $responser->getResponse($this);
    }

    public function createOne(){
        $responser = new CustomRequestResponser;
        return $responser->getResponse($this, $responser::HTTP_METHOD_POST);
    }

    public function prepareDataArray(){
        return [
            'producer' => [
                'id' => $this->id,
                'name' => $this->name,
                'site_url' => $this->siteUrl,
                'logo_filename' => $this->logoFilename,
                'ordering' => $this->ordering,
                'source_id' => $this->sourceId,
            ]
        ];
    }
};