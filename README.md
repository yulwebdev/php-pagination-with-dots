# PHP pagination with dots.
## Bootstrap 5.3
**1** 2 3 4 5 ... 9  
1 ... 4 **5** 6 ... 9  
1 ... 5 **6** 7 8 9   
### Example usage:
```php
require_once "pagination.php";

$total_pages = 9;
$current_page = 1;

if(isset($_GET["page_no"])) $current_page = $_GET["page_no"];

show_pagination($total_pages, $current_page);
```
