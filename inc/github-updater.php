<?php
/**
 * Latin Party Eventos - GitHub Automatic Theme Updater
 * Enables one-click updates directly inside WordPress admin (Apariencia > Temas / Escritorio > Actualizaciones)
 * fetching releases directly from GitHub.
 *
 * @package Latin_Party_Eventos
 */

if (!defined('ABSPATH')) {
    exit;
}

class Latin_Party_GitHub_Updater {

    private $slug;
    private $theme;
    private $github_repo; // format: "username/repository"
    private $access_token; // optional for private repositories

    public function __construct($github_repo, $access_token = '') {
        $this->theme        = wp_get_theme();
        $this->slug         = ($this->theme && method_exists($this->theme, 'get_stylesheet')) ? $this->theme->get_stylesheet() : 'latin-party-theme';
        $this->github_repo  = trim($github_repo, '/');
        $this->access_token = $access_token;

        if (!empty($this->github_repo)) {
            add_filter('pre_set_site_transient_update_themes', array($this, 'check_for_update'));
            add_filter('upgrader_source_selection', array($this, 'rename_github_folder'), 10, 3);
        }
    }

    /**
     * Check GitHub API for the latest release
     */
    public function check_for_update($transient) {
        if (empty($transient->checked)) {
            return $transient;
        }

        $current_version = $this->theme->get('Version');
        $release_info    = $this->get_latest_release();

        if ($release_info && !empty($release_info->tag_name)) {
            $latest_version = ltrim($release_info->tag_name, 'v');

            if (version_compare($latest_version, $current_version, '>')) {
                // Determine zip download package
                $package_url = '';
                if (!empty($release_info->assets)) {
                    foreach ($release_info->assets as $asset) {
                        if (substr($asset->name, -4) === '.zip') {
                            $package_url = $asset->browser_download_url;
                            break;
                        }
                    }
                }
                if (empty($package_url)) {
                    $package_url = $release_info->zipball_url;
                }

                if (!empty($this->access_token)) {
                    $package_url = add_query_arg('access_token', $this->access_token, $package_url);
                }

                $transient->response[$this->slug] = array(
                    'theme'       => $this->slug,
                    'new_version' => $latest_version,
                    'url'         => $release_info->html_url,
                    'package'     => $package_url,
                );
            }
        }

        return $transient;
    }

    /**
     * Fetch latest release from GitHub API
     */
    private function get_latest_release() {
        $cache_key = 'lp_gh_release_' . md5($this->github_repo);
        $cached    = get_transient($cache_key);

        if ($cached !== false) {
            return $cached;
        }

        $url = "https://api.github.com/repos/{$this->github_repo}/releases/latest";

        $args = array(
            'headers' => array(
                'Accept'     => 'application/vnd.github.v3+json',
                'User-Agent' => 'WordPress/' . get_bloginfo('version') . '; ' . home_url(),
            ),
            'timeout' => 10,
        );

        if (!empty($this->access_token)) {
            $args['headers']['Authorization'] = 'Bearer ' . $this->access_token;
        }

        $response = wp_remote_get($url, $args);

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            return false;
        }

        $body = json_decode(wp_remote_retrieve_body($response));

        if (!empty($body) && isset($body->tag_name)) {
            // Cache check for 3 hours
            set_transient($cache_key, $body, 3 * HOUR_IN_SECONDS);
            return $body;
        }

        return false;
    }

    /**
     * Rename extracted folder from "user-repo-hash" to "latin-party-theme"
     */
    public function rename_github_folder($source, $remote_source, $upgrader) {
        global $wp_filesystem;

        if (isset($upgrader->skin->theme_info)) {
            $theme_slug = $upgrader->skin->theme_info->get_stylesheet();
        } else {
            $theme_slug = $this->slug;
        }

        if (strpos($source, $this->slug) === false && $theme_slug === $this->slug) {
            $corrected_source = trailingslashit($remote_source) . trailingslashit($this->slug);
            if ($wp_filesystem->move($source, $corrected_source, true)) {
                return $corrected_source;
            }
        }

        return $source;
    }
}

/**
 * Initialize updater safely only in admin when repo is configured
 */
function latin_party_init_updater() {
    if (!is_admin()) {
        return;
    }

    $repo  = lp_get_setting('lp_github_repo', '');
    $token = lp_get_setting('lp_github_token', '');

    if (!empty($repo)) {
        new Latin_Party_GitHub_Updater($repo, $token);
    }
}
add_action('admin_init', 'latin_party_init_updater');
