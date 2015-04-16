<?php


return array(
        //---
        //title: Licenses | GitHub API
        //---
        //
        //# Licenses
        //
        //* TOC
        //{:toc}
        //
        //{{#tip}}
        //
        //  <a name="preview-period"></a>
        //
        //  The Licenses API is currently available for developers to preview.
        //  During the preview period, the API may change without advance notice.
        //  Please see the [blog post](https://github.com/blog/1964-open-source-license-usage-on-github-com) for full details.
        //
        //  To access the API during the preview period, you must provide a custom [media type](/v3/media) in the `Accept` header:
        //
        //      application/vnd.github.drax-preview+json
        //
        //{{/tip}}
        //
        //The Licenses API returns metadata about popular open source licenses and information about a particular project's license file. The license key and name conforms to the [SPDX specification](https://spdx.org/).
        //
        //{{#warning}}
        //
        //GitHub is a lot of things, but it’s not a law firm. As such, GitHub does not provide legal advice. Using the Licenses API or sending us an email about it does not constitute legal advice nor does it create an attorney-client relationship. If you have any questions about what you can and can't do with a particular license, you should consult with your own legal counsel before moving forward. In fact, you should always consult with your own lawyer before making any decisions that might have legal ramifications or that may impact your legal rights.
        //
        //GitHub created the License API to help users get information about open source licenses and the projects that use them. We hope it helps, but please keep in mind that we’re not lawyers (at least not most of us aren't) and that we make mistakes like everyone else. For that reason, GitHub provides the API on an “as-is” basis and makes no warranties regarding any information or licenses provided on or through it, and disclaims liability for damages resulting from using the API.

    'listLicenses' => array(
        //## List all licenses
        //
        //    GET /licenses
        //
        //### Response
        //
        //== headers 200 
        //== json(:licenses)  
        //
        //## Get an individual license
    ),
    'getLicense' => array(
        //    GET /licenses/mit
        //
        //### Response
        //
        //== headers 200 
        //== json(:mit)  
    ),
    'getRepoLicense' => array(
        //## Get a repository's license
        //
        //When passed the preview media type, requests to get a repository will also return the repository's license, if it can be detected from the repository's license file.
        //
        //It's important to note that the API simply attempts to identity the project's license by the contents of the a `LICENSE` file, if any, and does not take into account the licenses of project dependencies or other means of documenting a project's license such as references in the documentation.
        //
        //    GET /repos/:owner/:repo
        //
        //### Response
        //
        //== headers 200 
        //== json(:licensee)  
    ),

);