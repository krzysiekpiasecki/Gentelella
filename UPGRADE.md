# Manual upgrade


### 1. Copy new version of original gentelella template to app/Resources/template

### 2. Modify template files (use regular expressions)

Stylesheets:
```html
From: href=['"](.*).css['"]
To: href="{{ asset('$1') }}"
``` 

Links:
```html
From: href=['"](.*).html['"]
To: href="/template/$1"
``` 

Scripts:
```html
From: src=['"](js/.*.(js|json))['"]
To: src="{{ asset('$1') }}"
``` 

Images:
```html
From: src=['"](images/.*.(jpg|png))['"]
To: src="{{ asset('$1') }}”
``` 

### 3. Link templates with panel

In every template file

After:

```html
<div class="nav toggle”>                 
	<a id="menu_toggle"><i class="fa fa-bars"></i></a>               
</div>
```            

Paste:
```html           		
<div class="nav toggle”>               
	<a href="/admin">Site</a>
</div>
```

### 4. Copy plain_page.html template to app/Resources/admin.html.twig

Then replace all paths:

```html     
From: /template/
To: /admin/
```

and replace

```html  
Form: <a href="/admin">Site</a> 
To: <a href=“/template”>Template</a>
```

### Test
From root of the project run command

```base
$ phpunit
```



