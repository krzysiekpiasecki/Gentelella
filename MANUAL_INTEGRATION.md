### Manual integration of the Gentelella template into a Symfony 3.x


### Clone Gentelella repository

Clone Gentelella repository into var directory of your symfony project with the commands:

```
$ cd /PATH/TO/PROJECT
$ cd var
$ git clone https://github.com/puikinsh/gentelella.git vMAJOR.MINOR.PATCH
$ cd MAJOR.MINOR.PATCH
$ rm -rf .git
```

### Install front-end vendors into a web directory

Copy from the Gentellela repository bower.json and .bowerrc files.

Then edit .bowerrc file

```json
{
  "directory" : "web/assets/vendors"
}
```


From the root of the project run command:

```
$ cd /PATH/TO/PROJECT
$ bower install
```

* Always select versions resolved for Gentelella

### Install templates and assets

Copy from Gentelella directories css, images, js, less into a directory web/assets
Copy templates files into directory app/resources/gentelella
Rename template files to .html.twig with some kinds of Automator

### Rewrite templates

To rewrite assets files replace template files with regular expresion:

```html
(href|src)=['"](\.\./)?(.*).(css|js|json|png|jpg|jpeg)['"]
$1="{{ asset('assets/$3.$4') }}"
```

To rewrite page links use regular expression on templates files

```html
href=['"](.*).html['"]
href="{{ path('gentelella_page', {'page': '$1'}) }}"
```


 ### Link template with the admin panel  
 
 After:
 
 ```html
 <div class="nav toggle”>
    <a id="menu_toggle">
        <i class="fa fa-bars"></i></a>
        </div>
```             

Paste: 
```html
<div class="nav toggle”>
    <a href="/admin">Site</a>
</div>
```


Update smoke tests

### Copy plain_page.html template to admin.html.twig  
Then replace all paths   ```html      /template/ /admin/ ```   Replace ```html   <a href="/admin">Site</a> ```  ```html   <a href=“/template”>Template</a> ```  ### Test From root of the project run command  ```base $ phpunit ```