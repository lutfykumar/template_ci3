<div class="aside-menu flex-column-fluid">
  <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
      <?php
      foreach ($headers as $h) {
        echo '<div class="menu-item">
                <div class="menu-content pb-2">
                  <span class="menu-section text-muted text-uppercase fs-8 ls-1">' . $h->NAMA . '</span>
                </div>
              </div>';
        $sub_headers = $this->m_pengaturan->menu_sub_headers($h->ID_MENU);
        foreach ($sub_headers as $v) {
          if (!empty($v->LINK)) {
            if ($v->LINK == $active_url) {
              $active_class = 'active';
            } else {
              $active_class = '';
            }
            echo '<div class="menu-item">
                    <a class="menu-link ' . $active_class . '" href="' . base_url($v->LINK) . '">
                      <span class="menu-icon">' . $v->ICON . '</span>
                      <span class="menu-title">' . $v->NAMA . '</span>
                    </a>
                  </div>';
          } else {
            $menus = $this->m_pengaturan->menus($h->ID_MENU, $v->ID_MENU);
            $menu_single = '';
            $hover_title = '';
            foreach ($menus as $t) {
              $single_link = $t->LINK ? base_url($t->LINK) : '#';
              if ($t->LINK == $active_url) {
                $s_active_class = 'active';
                $hover_title = 'hover show';
              } else {
                $s_active_class = '';
              }
              $menu_single .= '<div class="menu-item">
                                <a href="' . $single_link . '" class="menu-link ' . $s_active_class . '">
                                  <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                  </span>
                                  <span class="menu-title">' . $t->NAMA . '</span>
                                </a>
                              </div>';
            }

            echo '<div data-kt-menu-trigger="click" class="menu-item menu-accordion ' . $hover_title . '">
                      <span class="menu-link">
                        <span class="menu-icon">' . $v->ICON . '</span>
                        <span class="menu-title">' . $v->NAMA . '</span>
                        <span class="menu-arrow"></span>
                      </span>
                      <div class="menu-sub menu-sub-accordion menu-active-bg">' . $menu_single . '</div>
                    </div>';
          }
        }
      }
      ?>
    </div>
  </div>
</div>
