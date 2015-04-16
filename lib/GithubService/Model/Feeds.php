<?php 

namespace GithubService\Model;

class Feeds extends \GithubService\Model\DataMapper {

    public $currentUserActorUrl = null;

    public $currentUserOrganizationUrl = null;

    /**
     * @var \GithubService\Model\Indices $currentUserOrganizationUrls
     */
    public $currentUserOrganizationUrls = array(
        
    );

    public $currentUserPublicUrl = null;

    public $currentUserUrl = null;

    /**
     * @var \GithubService\Model\ $links
     */
    public $links = null;

    public $timelineUrl = null;

    public $userUrl = null;

    protected function getDataMap() {
        $dataMap = [
            ['currentUserActorUrl', 'current_user_actor_url'],
            ['currentUserOrganizationUrl', 'current_user_organization_url'],
            ['currentUserOrganizationUrls', 'current_user_organization_urls', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['currentUserPublicUrl', 'current_user_public_url'],
            ['currentUserUrl', 'current_user_url'],
            
            // TODO - readd links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
            ['timelineUrl', 'timeline_url'],
            ['userUrl', 'user_url'],
        ];

        return $dataMap;
    }


}
