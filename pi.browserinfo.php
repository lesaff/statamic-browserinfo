<?php
/**
 * Plugin_browserinfo
 * Browser detection
 *
 * @author     Rudy Affandi <rudy@adnetinc.com>
 * @copyright  2015
 * @link       https://github.com/lesaff
 * @license    http://opensource.org/licenses/MIT
 *
 * Versions
 * 1.0.1       Added slugify option, returns slugified output as default
 * 1.0.0       Initial release
 */

require __DIR__ . '/vendor/autoload.php';

use Browser\Language;
use UAParser\Parser;

class Plugin_browserinfo extends Plugin 
{
    private function getBrowserInfo() {
        $ua = $_SERVER['HTTP_USER_AGENT'];
        $parser = Parser::create();
        $result = $parser->parse($ua);
        $browser_info = array(
            "browser_name"          => $result->ua->family,
            "browser_version_major" => $result->ua->major,
            "browser_version_minor" => $result->ua->minor,
            "browser_version_patch" => $result->ua->patch,
            "os_name"               => $result->os->family,
            "os_version_major"      => $result->os->major,
            "os_version_minor"      => $result->os->minor,
            "os_version_patch"      => $result->os->patch,
            "device_type"           => $result->device->family,
            "device_brand"          => $result->device->brand,
            "device_model"          => $result->device->model,
            "browser_ua"            => $result->originalUserAgent
        );

        return $browser_info;
    }

    // Get language settings from visiting browser
    public function language()
    {
        $language = new Language;
        $data     = $language->getLanguage();
        return $data;
    }

    // Get browser info from visiting browser
    public function browser()
    {
        $slugify               = $this->fetchParam("slugify", TRUE, NULL, FALSE, TRUE);
        $browser_name          = $this->getBrowserInfo()['browser_name'];
        $browser_version_major = $this->getBrowserInfo()['browser_version_major'];
        if ($slugify)
        {
            return Slug::make($browser_name . ' ' . $browser_version_major);
        } else {
            return $browser_name . ' ' . $browser_version_major;
        }
    }

    // Get browser name from visiting browser
    public function browser_name()
    {
        $slugify      = $this->fetchParam("slugify", TRUE, NULL, FALSE, TRUE);
        $browser_name = $this->getBrowserInfo()['browser_name'];
        if ($slugify)
        {
            return Slug::make($browser_name);
        } else {
            return $browser_name;
        }
    }

    // Get browser version from visiting browser
    public function browser_version()
    {
        $show                  = $this->fetchParam("show", NULL, NULL, FALSE, TRUE);
        $browser_version_major = $this->getBrowserInfo()['browser_version_major'];
        $browser_version_minor = $this->getBrowserInfo()['browser_version_minor'];
        $browser_version_patch = $this->getBrowserInfo()['browser_version_patch'];
        $version               = $browser_version_major . '.' . $browser_version_minor . '.' . $browser_version_patch;

        switch ($show)
        {
            case 'major':
                return $browser_version_major;
                break;
            case 'minor':
                return $browser_version_minor;
                break;
            case 'patch':
                return $browser_version_patch;
                break;
            case 'all':
                return $version;
                break;
        }
    }

    // Get OS info from visiting browser
    public function os()
    {
        $slugify          = $this->fetchParam("slugify", TRUE, NULL, FALSE, TRUE);
        $os_name          = $this->getBrowserInfo()['os_name'];
        $os_version_major = $this->getBrowserInfo()['os_version_major'];
        if ($slugify)
        {
            return Slug::make($os_name . ' ' . $os_version_major);
        } else {
            return $os_name . ' ' . $os_version_major;
        }
    }

    // Get OS name from visiting browser
    public function os_name()
    {
        $slugify          = $this->fetchParam("slugify", TRUE, NULL, FALSE, TRUE);
        $os_name = $this->getBrowserInfo()['os_name'];
        if ($slugify)
        {
            return Slug::make($os_name);
        } else {
            return $os_name;
        }
    }

    // Get OS version from visiting browser
    public function os_version()
    {
        $show             = $this->fetchParam("show", NULL, NULL, FALSE, TRUE);
        $os_version_major = $this->getBrowserInfo()['os_version_major'];
        $os_version_minor = $this->getBrowserInfo()['os_version_minor'];
        $os_version_patch = $this->getBrowserInfo()['os_version_patch'];
        $version          = $os_version_major . '.' . $os_version_minor . '.' . $os_version_patch;

        switch ($show)
        {
            case 'major':
                return $os_version_major;
                break;
            case 'minor':
                return $os_version_minor;
                break;
            case 'patch':
                return $os_version_patch;
                break;
            case 'all':
                return $version;
                break;
        }
    }

    // Get device type from visiting browser
    public function device_type()
    {
        $slugify     = $this->fetchParam("slugify", TRUE, NULL, FALSE, TRUE);
        $device_type = $this->getBrowserInfo()['family'];
        if ($slugify)
        {
            return Slug::make($device_type);
        } else {
            return $device_type;
        }
    }

    // Get device brand from visiting browser
    public function device_brand()
    {
        $slugify     = $this->fetchParam("slugify", TRUE, NULL, FALSE, TRUE);
        $device_brand = $this->getBrowserInfo()['brand'];
        if ($slugify)
        {
            return Slug::make($device_brand);
        } else {
            return $device_brand;
        }
    }

    // Get device model from visiting browser
    public function device_model()
    {
        $slugify     = $this->fetchParam("slugify", TRUE, NULL, FALSE, TRUE);
        $device_model = $this->getBrowserInfo()['model'];
        if ($slugify)
        {
            return Slug::make($device_model);
        } else {
            return $device_model;
        }
    }
}