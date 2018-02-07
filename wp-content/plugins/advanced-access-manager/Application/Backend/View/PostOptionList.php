<?php

/**
 * ======================================================================
 * LICENSE: This file is subject to the terms and conditions defined in *
 * file 'license.txt', which is part of this source code package.       *
 * ======================================================================
 */

/**
 * Post option list
 */
class AAM_Backend_View_PostOptionList {

    /**
     * Get post option list
     * 
     * @return array
     * 
     * @access public
     */
    public static function get() {
        return array(
            'frontend' => array(
                'list' => array(
                    'title'  => __('List', AAM_KEY),
                    'descr'  => __('Hide %s however access with a direct URL will be still allowed. When there are more than 500 posts, this option may not be applied immediately because, for performance reasons, AAM checks limited number of posts per request.', AAM_KEY) . sprintf(__(' %sSee in action.%s', AAM_KEY), "<a href='https://youtu.be/2jiu_CL6JJg' target='_blank'>", '</a>'),
                    'config' => 'check-post-visibility'
                ),
                'read' => array(
                    'title' => __('Read', AAM_KEY),
                    'descr' => __('Restrict access to read the %s. Any attempts to read, view or open the %s will be denied and redirected based on the Access Denied Redirect rule.', AAM_KEY) . sprintf(__(' %sSee in action.%s', AAM_KEY), "<a href='https://youtu.be/1742nVeGvgs' target='_blank'>", '</a>')
                ),
                'limit' => array(
                    'title' => __('Limit', AAM_KEY),
                    'sub' => __('Teaser message', AAM_KEY),
                    'option' => 'frontend.teaser',
                    'preview' => 'frontend-teaser-preview',
                    'descr' => __('When checked, show defined teaser message instead of the %s content.', AAM_KEY)
                ),
                'access_counter' => array(
                    'title' => __('Read Counter', AAM_KEY),
                    'sub' => __('Threshold', AAM_KEY),
                    'option' => 'frontend.access_counter_limit',
                    'preview' => 'frontend-access_counter_limit-preview',
                    'exclude' => array(AAM_Core_Subject_Visitor::UID),
                    'descr' => __('Define how many times the %s can be opened to read, view or download. After number of time exceeds the defined threshold, the access will be denied to the %s and redirected based on the Access Denied Redirect rule.', AAM_KEY)
                ),
                'comment' => array(
                    'title' => __('Comment', AAM_KEY),
                    'descr' => __('Restrict access to comment on %s when commenting feature is enabled.', AAM_KEY)
                ),
                'redirect' => array(
                    'title' => __('Redirect', AAM_KEY),
                    'sub' => __('Redirect Rule', AAM_KEY),
                    'option' => 'frontend.location',
                    'preview' => 'frontend-location-preview',
                    'descr' => sprintf(__('Redirect user based on the defined redirect rule when user tries to read the %s. The REDIRECT option will be ignored if READ option checked. For more information about this option please refer to the %sHelp Section%s.', AAM_KEY), '%s', '<a href="https://aamplugin.com/help#post-redirect" target="_blank">', '</a>')
                ),
                'protected' => array(
                    'title' => __('Password Protected', AAM_KEY),
                    'sub' => __('Password', AAM_KEY),
                    'option' => 'frontend.password',
                    'preview' => 'frontend-option-preview',
                    'descr' => __('Password protect the %s. Available with WordPress 4.7.0 or higher.', AAM_KEY)
                ),
                'expire' => array(
                    'title' => __('Access Expiration', AAM_KEY),
                    'sub' => __('Expires', AAM_KEY),
                    'option' => 'frontend.expire_datetime',
                    'preview' => 'frontend-expire_datetime-preview',
                    'descr' => __('Define when access expires for %s.', AAM_KEY) . sprintf(__('After expiration, the access to %s will be denied and user will be redirected based on the Access Denied Redirect rule. For more information %scheck this article%s or ', AAM_KEY), '%s', "<a href='https://aamplugin.com/help/how-to-set-expiration-date-for-any-wordpress-content' target='_blank'>", '</a>') . sprintf(__(' %ssee in action.%s', AAM_KEY), "<a href='https://youtu.be/IgtgVoWs35w' target='_blank'>", '</a>')
                ),
                'monetize' => array(
                    'title' => __('Monetized Access', AAM_KEY),
                    'sub' => __('E-Product', AAM_KEY),
                    'option' => 'frontend.eproduct',
                    'preview' => 'frontend-eproduct-preview',
                    'exclude' => array(AAM_Core_Subject_Visitor::UID),
                    'descr' => sprintf(AAM_Backend_View_Helper::preparePhrase('[Premium feature!] Start selling access to the %s. Access will be granted to read, view or download %s only if selected E-Product had been purchased. For more information %scheck this article%s.', 'b'), '%s', '%s', "<a href='https://aamplugin.com/help/how-to-monetize-access-to-the-wordpress-content' target='_blank'>", '</a>')
                ),
            ),
            'backend' => array(
                'list' => array(
                    'title' => __('List', AAM_KEY),
                    'exclude' => array(AAM_Core_Subject_Visitor::UID),
                    'descr' => __('Hide %s however access with a direct URL is still allowed. When there are more than 500 posts, this option may not be applied immediately because, for performance reasons, AAM checks limited number of posts per request.', AAM_KEY),
                    'config' => 'check-post-visibility'
                ),
                'edit' => array(
                    'title' => __('Edit', AAM_KEY),
                    'exclude' => array(AAM_Core_Subject_Visitor::UID),
                    'descr' => __('Restrict access to edit the %s. Any attempts to edit %s will result in redirecting user based on the Access Denied Redirect rule.', AAM_KEY)
                ),
                'delete' => array(
                    'title' => __('Delete', AAM_KEY),
                    'exclude' => array(AAM_Core_Subject_Visitor::UID),
                    'descr' => __('Restrict access to trash or permanently delete %s.', AAM_KEY)
                ),
                'publish' => array(
                    'title' => __('Publish', AAM_KEY),
                    'exclude' => array(AAM_Core_Subject_Visitor::UID),
                    'descr' => __('Restrict access to publish the %s. User will be allowed only submit the %s for review.', AAM_KEY)
                )
            )
        );
    }
}
