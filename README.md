# Laravel - Active menu helper 

Blade directives for Laravel 5.1+ to manage menu states in a clean and easy way.

## Install 

```bash 
# 1) Require it with composer
composer require activismebe/laravel-active-menu

# 2) Register the Service provider in your config. 
ActivismeBE\ActiveMenu\ActiveMenuServiceProvider::class,
```

## Usage 

Call `@actvate(...)` to specify the activated menu: 

```html
@activate('security_settings')
```

Now call `@active(...)` irective to know if a specified menu is active:

```html
<ul>
    <li>
        <a href="/settings">Settings</a>

        <ul class="dropdown">
            <li class="@active('security_settings')">
                <a href="/setings/security">Security</a>
            </li>
        </ul>
    </li>
</ul>
```

This directive will print the string `active` if the given menu is activated. The example above will result on the following HTML:

```html
<ul>
    <li>
        <a href="/settings">Settings</a>
        <ul class="dropdown">
            <li class="active">
                <a href="/settings/security">Security</a>
            </li>
        </ul>
    </li>
</ul>
```


Now just add a `li.active a { ... }` styles to your CSS and you're ready.

## Using dot-notation

Use dot-notation to activate the menu cascade up, for example, using this directive:

```blade
@activate('settings.security')
```

This will activate `settings` and `settings.security`, so the following directives will print the string `active`:

```blade
@active('settings')
@active('settings.security')
```

## Change the class name

You can change the class name passing it as a second parameter:

```blade
@active('user.account', 'link-active')
```

But I really recomend you stick to the convention and use the default value.