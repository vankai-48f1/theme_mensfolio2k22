(function ($) {
  $(document).ready(function () {
    // Insert icon dropdown to sub menu panel bar
    $("#mobile-container .navbar-nav li.menu-item.menu-item-has-children > a").append("<span class=\"toggle-submenu\"></span>")
    // Drop down submenu panel bar
    $("#mobile-container .navbar-nav li.menu-item.menu-item-has-children a .toggle-submenu").on("click", function (e) {
      e.stopPropagation()
      $(this).closest(".menu-item").toggleClass("drop-menu")
      return false;
    })
    // Open sub menu
    $("#mobile-container .navbar-nav li.menu-item.menu-item-has-children > a").on("click", function (e) {
      e.stopPropagation();
    })

    $('.ctheme-search-icon').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).parent().toggleClass('show-form')
    })

    // Wrap img in content post
    $('.ctheme-post-content .entry_summary img:not([id^=attachment_] img)').wrap("<div class='ctheme-picture-wrap'></div>");
    $('[id^=attachment_]').wrap("<div class='ctheme-picture-wrap'></div>");

    // Action load more article in page author
    let offset = 6;
    $('.ajax-loadmore-btn').on('click', function (e) {
      e.preventDefault();
      const adminAjax = $('input[name=ctheme_wp_admin_ajax]').val();
      let author_id = $('input[name=ctheme_author_id]').val();

      $.ajax({ // Hàm ajax
        type: "post", //Phương thức truyền post hoặc get
        dataType: "html", //Dạng dữ liệu trả về xml, json, script, or html
        async: false,
        url: adminAjax, // Nơi xử lý dữ liệu
        data: {
          action: "loadmore", //Tên action, dữ liệu gởi lên cho server
          offset: offset, // gởi số lượng bài viết đã hiển thị cho server
          author_id: author_id, // gởi số lượng bài viết đã hiển thị cho server
        },
        beforeSend: function () {
          // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
        },
        success: function (response) {
          $('.ctheme-author-listmore').append(response);
          offset = offset + 6; // tăng bài viết đã hiển thị
        },
        error: function (jqXHR, textStatus, errorThrown) {
          //Làm gì đó khi có lỗi xảy ra
          console.log('The following error occured: ' + textStatus, errorThrown);
        }
      });
    })
  })
})(jQuery)