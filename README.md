# MyBB Alpine.js

Allows you to use Alpine.js magics (`$el, $refs, $store, ...`) in templates.

## Details

- **Version:** 1.0.0
- **MyBB Versions:** 1.8.x

## Install

1. Download the plugin from [Github](https://github.com/tedem/mybb-alpinejs/releases) or [MyBB Extend](https://community.mybb.com/mods.php?action=view&pid=1538).
2. Upload the files in the "Upload" folder to the root directory of your forum with SSH (`scp` command.) or FTP (FileZilla, CuteFTP, etc.).
3. Install and activate the plugin named Alpine.js from the Admin KP → Configuration → (From left.) Plugins page.

## Usage

The variables you will use in templates for Alpine.js magics are as follows.

- `$el` → `$alpinejs['_el']`
- `$refs` → `$alpinejs['_refs']`
- `$store` → `$alpinejs['_store']`
- `$watch` → `$alpinejs['_watch']`
- `$dispatch` → `$alpinejs['_dispatch']`
- `$nextTick` → `$alpinejs['_nextTick']`
- `$root` → `$alpinejs['_root']`
- `$data` → `$alpinejs['_data']`
- `$id` → `$alpinejs['_id']`

## Versioning

I use [SemVer](https://semver.org/) for versioning.

## Authors

- **Medet Erdal** - _Initial work_ - [tedem](https://github.com/tedem)

## License

[MIT](LICENSE)
