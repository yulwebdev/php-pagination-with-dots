# PHP pagination with dots.
## Bootstrap 5.3
![alt text](https://yulweb.dev/img/bootstrap-pagination-with-dots-1.png)  
![alt text](https://yulweb.dev/img/bootstrap-pagination-with-dots-2.png)  
![alt text](https://yulweb.dev/img/bootstrap-pagination-with-dots-3.png)
### Example usage:
```php
require_once "pagination.php";

$total_pages = 9;
$current_page = 1;

if(isset($_GET["page"])) $current_page = $_GET["page"];

show_pagination($total_pages, $current_page);
```
Pagination links are managed automatically by adding/updating or removing page numbers from the current URL using the custom *get_url* function.
