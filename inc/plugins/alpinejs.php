<?php

/**
 * Alpine.js
 * Allows you to use Alpine.js magics (`$el, $refs, $store, ...`) in templates.
 *
 * @author Medet "tedem" Erdal <hello@tedem.dev>
 */

// mybb
if (! defined('IN_MYBB')) {
    die('(-_*) This file cannot be accessed directly.');
}

// constants
define('ALPINE_JS_ID', 'alpinejs');
define('ALPINE_JS_NAME', 'Alpine.js');
define('ALPINE_JS_AUTHOR', 'tedem');
define('ALPINE_JS_VERSION', '1.0.0');

// hooks
if (! defined('IN_ADMINCP')) {
    $plugins->add_hook('global_intermediate', 'alpinejs_main');
}

function alpinejs_info(): array
{
    $description = <<<HTML
<p>Allows you to use Alpine.js magics (`\$el, \$refs, \$store, ...`) in templates.</p>
HTML;

    return [
        'name' => ALPINE_JS_NAME,
        'description' => $description . _alpinejs_bmc(),
        'website' => 'https://tedem.dev',
        'author' => ALPINE_JS_AUTHOR,
        'authorsite' => 'https://tedem.dev',
        'version' => ALPINE_JS_VERSION,
        'codename' => 'tedem_' . ALPINE_JS_ID,
        'compatibility' => '18*'
    ];
}

function alpinejs_install(): void
{
    global $cache;

    // add cache
    $plugins = $cache->read(ALPINE_JS_AUTHOR);

    $plugins[ALPINE_JS_ID] = [
        'name' => ALPINE_JS_NAME,
        'author' => ALPINE_JS_AUTHOR,
        'version' => ALPINE_JS_VERSION
    ];

    $cache->update(ALPINE_JS_AUTHOR, $plugins);
}

function alpinejs_is_installed(): bool
{
    global $cache;

    // has cache
    $plugins = $cache->read(ALPINE_JS_AUTHOR);

    if (isset($plugins[ALPINE_JS_ID])) {
        return true;
    }

    return false;
}

function alpinejs_uninstall(): void
{
    global $db, $cache;

    // remove cache
    $plugins = $cache->read(ALPINE_JS_AUTHOR);

    unset($plugins[ALPINE_JS_ID]);

    $cache->update(ALPINE_JS_AUTHOR, $plugins);

    if (count($plugins) == 0) {
        $db->delete_query('datacache', "title='" . ALPINE_JS_AUTHOR . "'");
    }
}

function alpinejs_activate(): void
{
    //
}

function alpinejs_deactivate(): void
{
    //
}

function alpinejs_main(): void
{
    global $alpinejs;

    // alpine.js triggers
    $alpinejs['_el'] = '$el';
    $alpinejs['_refs'] = '$refs';
    $alpinejs['_store'] = '$store';
    $alpinejs['_watch'] = '$watch';
    $alpinejs['_dispatch'] = '$dispatch';
    $alpinejs['_nextTick'] = '$nextTick';
    $alpinejs['_root'] = '$root';
    $alpinejs['_data'] = '$data';
    $alpinejs['_id'] = '$id';
}

function _alpinejs_bmc()
{
    return <<<HTML
<div>
    <script type="text/javascript"
            src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js"
            data-name="bmc-button"
            data-slug="tedem"
            data-color="#FFDD00"
            data-emoji=""
            data-font="Cookie"
            data-text="Buy me a coffee"
            data-outline-color="#000000"
            data-font-color="#000000"
            data-coffee-color="#ffffff"
    ></script>
</div>
HTML;
}
