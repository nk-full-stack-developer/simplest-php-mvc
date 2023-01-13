# Simplest PHP MVC
This is the custom PHP MVC, the simplest form.

| Technologies|
| ------------|
| PHP         |
| HTML        |
| CSS         |
| Bootstrap   |
| MySql       |

## How to use?

#### How to configure?

Just clone the repository, the basic controllers and views are there.
It will be enough to make an informative website. If you want more pages follow the document.

#### How add new views?

Add view name to public/index.php
if you want to add about, add it to array below.
<pre>
$allowed = array(
    'index',
    'about'
);
</pre>
Now run open url /?p=about, and follow error messages.
Copy index.controller.php file to 
<pre>controllers/about.controller.php</pre>
and make required changes.

Copy index.view.php file to 
<pre>views/about.view.php</pre>
and make required changes, your about page is done!
