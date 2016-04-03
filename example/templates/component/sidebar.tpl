
<nav class="bs-docs-sidebar hidden-print">
    {plugin type='GithubExample\GithubPlugin'}
    {inject name='context' type='GithubExample\Context\OauthContext'}
    
    {renderAuthStatus($context)}
    
    {showActionLinks($context)}
</nav>