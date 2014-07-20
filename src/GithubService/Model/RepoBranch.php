<?php


namespace GithubService\Model;


class RepoBranch {
    use DataMapper;

    public $name;
    
    /** @var  \GithubService\Model\Commit */
    public $commit;
    
    public $links = [];
//"_links": {
//"html": "https://github.com/octocat/Hello-World/tree/master",
//"self": "https://api.github.com/repos/octocat/Hello-World/branches/master"
//}

    static protected $dataMap = array(
        ['name', 'name'],
        ['commit', 'commit', 'class' => 'GithubService\Model\Commit'],
        ['links', '_links', 'multiple' => true, 'preserveKeys' => true] //Needs indexes
    );
}

/*


  "name": "master",
  "commit": {
    "sha": "7fd1a60b01f91b314f59955a4e4d4e80d8edf11d",
    "commit": {
      "author": {
        "name": "The Octocat",
        "date": "2012-03-06T15:06:50-08:00",
        "email": "octocat@nowhere.com"
      },
      "url": "https://api.github.com/repos/octocat/Hello-World/git/commits/7fd1a60b01f91b314f59955a4e4d4e80d8edf11d",
      "message": "Merge pull request #6 from Spaceghost/patch-1\n\nNew line at end of file.",
      "tree": {
        "sha": "b4eecafa9be2f2006ce1b709d6857b07069b4608",
        "url": "https://api.github.com/repos/octocat/Hello-World/git/trees/b4eecafa9be2f2006ce1b709d6857b07069b4608"
      },
      "committer": {
        "name": "The Octocat",
        "date": "2012-03-06T15:06:50-08:00",
        "email": "octocat@nowhere.com"
      }
    },
    "author": {
      "gravatar_id": "7ad39074b0584bc555d0417ae3e7d974",
      "avatar_url": "https://secure.gravatar.com/avatar/7ad39074b0584bc555d0417ae3e7d974?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-140.png",
      "url": "https://api.github.com/users/octocat",
      "id": 583231,
      "login": "octocat"
    },
    "parents": [
      {
        "sha": "553c2077f0edc3d5dc5d17262f6aa498e69d6f8e",
        "url": "https://api.github.com/repos/octocat/Hello-World/commits/553c2077f0edc3d5dc5d17262f6aa498e69d6f8e"
      },
      {
        "sha": "762941318ee16e59dabbacb1b4049eec22f0d303",
        "url": "https://api.github.com/repos/octocat/Hello-World/commits/762941318ee16e59dabbacb1b4049eec22f0d303"
      }
    ],
    "url": "https://api.github.com/repos/octocat/Hello-World/commits/7fd1a60b01f91b314f59955a4e4d4e80d8edf11d",
    "committer": {
      "gravatar_id": "7ad39074b0584bc555d0417ae3e7d974",
      "avatar_url": "https://secure.gravatar.com/avatar/7ad39074b0584bc555d0417ae3e7d974?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-140.png",
      "url": "https://api.github.com/users/octocat",
      "id": 583231,
      "login": "octocat"
    }
  },
  "_links": {
    "html": "https://github.com/octocat/Hello-World/tree/master",
    "self": "https://api.github.com/repos/octocat/Hello-World/branches/master"
  }



*/

 