<?php

      function show_pagination($total_pages, $current_page) {
        echo '<nav aria-label="Page navigation example"><ul class="pagination">';

        if($total_pages > 7) {
          if($current_page == 1) {
            echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
            echo '<li class="page-item active" aria-current="page"><span class="page-link">1</span></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="'.get_url($current_page - 1).'">Previous</a></li>';
            echo '<li class="page-item"><a class="page-link" href="'.get_url(1).'">1</a></li>';
          }
    
          if($total_pages - $current_page > 3) {
            if($current_page > 4) {
              echo '<li class="page-item"><span class="page-link">...</span></li>';
              echo '<li class="page-item"><a class="page-link" href="'.get_url($current_page - 1).'">'.($current_page - 1).'</a></li>';
              echo '<li class="page-item active" aria-current="page"><span class="page-link">'.($current_page).'</span></li>';
              echo '<li class="page-item"><a class="page-link" href="'.get_url($current_page + 1).'">'.($current_page + 1).'</a></li>';
            } else {
              for($page_no = 2; $page_no <= 5; $page_no++) {
                if($current_page == $page_no) {
                  echo '<li class="page-item active" aria-current="page"><span class="page-link">'.($page_no).'</span></li>';
                } else {
                  echo '<li class="page-item"><a class="page-link" href="'.get_url($page_no).'">'.($page_no).'</a></li>';
                }
              }
            }
          }
    
          if($total_pages - $current_page < 4) {
            echo '<li class="page-item"><span class="page-link">...</span></li>';
            for($page_no = $total_pages - 4; $page_no <= $total_pages - 1; $page_no++) {
              if($current_page == $page_no) {
                echo '<li class="page-item active" aria-current="page"><span class="page-link">'.($page_no).'</span></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.get_url($page_no).'">'.($page_no).'</a></li>';
              }
            }
          } else {
            echo '<li class="page-item"><span class="page-link">...</span></li>';
          }
    
          if($current_page == $total_pages) {
            echo '<li class="page-item active" aria-current="page"><span class="page-link">'.($total_pages).'</span></li>';
            echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="'.get_url($total_pages).'">'.($total_pages).'</a></li>';
            echo '<li class="page-item"><a class="page-link" href="'.get_url($current_page + 1).'">Next</a></li>';
          }
        } else {
          if($current_page == 1) {
            echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="'.get_url($current_page - 1).'">Previous</a></li>';
          }
          for($page_no = 1; $page_no <= $total_pages; $page_no++) {
            if($current_page == $page_no) {
              echo '<li class="page-item active" aria-current="page"><span class="page-link">'.($page_no).'</span></li>';
            } else {
              echo '<li class="page-item"><a class="page-link" href="'.get_url($page_no).'">'.($page_no).'</a></li>';
            }
          }
          if($current_page == $total_pages) {
            echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="'.get_url($current_page + 1).'">Next</a></li>';
          }
        }
  
        echo '</ul></nav>';
      }

      function get_url($page_no) {

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      
        $parsed_url = parse_url($actual_link);
    
        if(isset($parsed_url["query"])) parse_str($parsed_url["query"], $query); else $query = array();
    
        if($page_no == 1) {
          unset($query["page"]);
        } else {
          $query["page"] = $page_no;
        }
        
        $query = htmlentities(http_build_query($query));

        return ($query) ? $parsed_url["path"] . "?" . $query : $parsed_url["path"];
    
      }
