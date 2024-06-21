<?php
/**
 * The App details file
 */

namespace Extendify;

/**
 * Controller for handling various app data
 */
class Config
{

    /**
     * Plugin name
     *
     * @var string
     */
    public static $name = '';

    /**
     * Plugin slug
     *
     * @var string
     */
    public static $slug = '';

    /**
     * Plugin version
     *
     * @var string
     */
    public static $version = '';

    /**
     * Plugin API REST version
     *
     * @var string
     */
    public static $apiVersion = 'v1';

    /**
     * Whether this is the standalone plugin
     *
     * @var boolean
     */
    public static $standalone;

    /**
     * Whether to load Launch
     *
     * @var boolean
     */
    public static $showOnboarding = false;

    /**
     * Whether to load Assist
     *
     * @var boolean
     */
    public static $showAssist = false;

    /**
     * Plugin environment
     *
     * @var string
     */
    public static $environment = '';

    /**
     * The partner plugin/theme
     *
     * @var string
     */
    public static $sdkPartner = 'standalone';

    /**
     * Host plugin
     *
     * @var string
     */
    public static $requiredCapability = 'manage_options';

    /**
     * Plugin config
     *
     * @var array
     */
    public static $config = [];

    /**
     * Plugin completed status
     *
     * @var mixed
     */
    public static $launchCompleted = 0;

    /**
     * Process the readme file to get version and name
     *
     * @return void
     */
    public function __construct()
    {
        self::$launchCompleted = get_option('extendify_onboarding_completed', 0);

        if (isset($GLOBALS['extendify_sdk_partner']) && $GLOBALS['extendify_sdk_partner']) {
            self::$sdkPartner = $GLOBALS['extendify_sdk_partner'];
        }

        // Set up whether this is the standalone plugin instead of integrated.
        self::$standalone = self::$sdkPartner === 'standalone';

        // TODO: Previous way to set the partner name - can remove in future.
        if (defined('EXTENDIFY_PARTNER_NAME')) {
            self::$sdkPartner = constant('EXTENDIFY_PARTNER_NAME');
        }

        // Always use the partner ID if set as a constant.
        if (defined('EXTENDIFY_PARTNER_ID')) {
            self::$sdkPartner = constant('EXTENDIFY_PARTNER_ID');
        }

        // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
        $readme = file_get_contents(EXTENDIFY_PATH . 'readme.txt');

        preg_match('/=== (.+) ===/', $readme, $matches);
        self::$name = $matches[1];
        self::$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', self::$name), '-'));

        preg_match('/Stable tag: ([0-9.:]+)/', $readme, $matches);
        self::$version = $matches[1];

        // An easy way to check if we are in dev mode is to look for a dev specific file.
        $isDev = is_readable(EXTENDIFY_PATH . 'public/build/.devbuild');

        self::$environment = $isDev ? 'DEVELOPMENT' : 'PRODUCTION';
        self::$showOnboarding = $this->showOnboarding();
        self::$showAssist = $isDev || self::$launchCompleted;

        // Add the config.
        // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
        $config = file_get_contents(EXTENDIFY_PATH . 'config.json');
        self::$config = json_decode($config, true);
    }

    /**
     * Conditionally load Extendify Launch.
     *
     * @return boolean
     */
    private function showOnboarding()
    {
        // Always show it for dev mode.
        if (self::$environment === 'DEVELOPMENT') {
            return true;
        }

        // Currently we require a flag to be set.
        if (!defined('EXTENDIFY_SHOW_ONBOARDING')) {
            return false;
        }

        // Check if they disabled it and respect that.
        if (constant('EXTENDIFY_SHOW_ONBOARDING') === false) {
            return false;
        }

        // time() will be truthy and 0 falsy.
        if (get_option('extendify_onboarding_skipped', 0)) {
            return false;
        }

        // time() will be truthy and 0 falsy, so we reverse it.
        return !self::$launchCompleted;
    }
}
