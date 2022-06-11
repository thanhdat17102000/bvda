(function ($) {
    var admin_category = function () {
        // $('.btn-load-form-edit').hide();
        this.hideNoti = function () {
            $('#sa-success').hide();
            $('#sa-params').hide();
        }
        var self = this;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        this.add = function () {
            var categoryTitle = $("#admin-category-add-name").val();
            // if (categoryTitle.length == 0) {
            //     $("#admin-category-add-status").addClass('error').text("Vui lòng nhập vào tên danh mục sản phẩm");
            //     return;
            // }
            var categoryIdParent = $("#admin-category-add-parent").val();
            var categoryIndex = $("#admin-category-add-index").val();
            $.ajax({
                url: "category_add",
                type: "post",
                data: {
                    categoryTitle: categoryTitle,
                    categoryIdParent: categoryIdParent,
                    categoryIndex: categoryIndex,
                },
                beforeSend: function () {
                    $(".btn.btn-close").click();
                },
                success: function (result) {
                    // console.log("++++ Admin category > add: ");
                    console.log(result);
                    $('#sa-success').click();
                    result = JSON.parse(result);
                    $("#admin-category-add-name").val("");
                    self.loadlist();
                },
                error: function () {
                    $("#admin-category-add-status").addClass('error').text("Có lỗi xảy ra, vui lòng thử lại sau");
                }
            });
        };
        this.loadlist = function () {
            $("#admin-category-list-content").html("");
            $.ajax({
                url: "category_loadlist",
                type: "get",
                beforeSend: function () {
                    // $("#admin-category-list-content").text("Đang xử lý, vui lòng chờ...");
                },
                success: function (result) {
                    console.log("++++ Admin category > load list: ");
                    console.log(result);
                    result = JSON.parse(result);
                    self.onLoadedList(result);
                },
                error: function () {
                    console.log("Có lỗi xảy ra");
                }
            });
        };
        this.onLoadedList = function (result) {
            var editIdParent = $("#admin-category-edit-parent").val();
            $("#admin-category-add-parent").html('<option value="0">Thư mục cha</option>');
            // $("#admin-category-edit-parent").html('<option value="0">----</option>');
            if (result.data.length == 0) {
                $("#admin-category-list-content").text("Chưa có danh mục nào");
            } else {
                var renderItems = function (items, space = "") {
                    var html = "";
                    items.forEach(function (item) {
                        var itemActions = "<span class='float-right'><a href='/admintrator/category/" + item.id + "/edit'><i class='fa fa-pencil-alt item-edit-btn text-primary' title='Sửa danh mục'></i></a>&nbsp;&nbsp;<i class='fa fa-trash item-delete-btn ml-2 mr-2 text-danger' title='Xóa danh mục'></i></span>";
                        itemActions += "<div class='clear_both'></div>";
                        html += "<li class='list-group-item mt-2' data-id='" + item.id + "'>" + item.m_title + itemActions + "</li>";

                        if (item.subCategory.length > 0) {
                            html += "<div class='subItems ml-5'>" + renderItems(item.subCategory, space += ' - ') + "</div>";
                        }

                        $("#admin-category-add-parent").append('<option value="' + item.id + '">' + space + item.m_title + '</option>');
                        $("#admin-category-edit-parent").append('<option value="' + item.id + '"> ' + item.m_title + '</option>');
                    });
                    return html;
                };
                $("#admin-category-list-content").html(renderItems(result.data));
                $("#admin-category-edit-parent").val(editIdParent);
                /*
                 * Event for list
                 */
                $("#admin-category-list-content .item-delete-btn").click(function () {
                    var idCategory = $(this).parents(".list-group-item").data('id');
                    $('#sa-params').click();
                    $('.btn.btn-confirm-delete').bind('click', function() {
                        self.delete(idCategory);
                      });

                });
                //edit
                // $("#admin-category-list-content .item-edit-btn").click(function () {


                // });
                // $("#admin-category-list-content .item-edit-btn").click(function () {
                //     var idCategory = $(this).parents(".list-group-item").data('id');
                //     self.loadFormEdit(idCategory);
                // });
            }
        };
        this.delete = function (idCategory) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "category_delete",
                type: "post",
                data: {
                    idCategory: idCategory
                },
                success: function (result) {
                    console.log("++++ Admin category > delete: ");
                    console.log(result);
                    self.loadlist();
                },
                error: function () {
                    alert("Có lỗi xảy ra, vui lòng thử lại sau");
                }
            });
        };
        this.loadFormEdit = function (idCategory) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".btn-load-form-edit").click();
            $.ajax({
                url: "category_loadDetail",
                type: "post",
                data: {
                    idCategory: idCategory
                },
                success: function (result) {
                    console.log("++++ Admin category > loadDetail: ");
                    console.log(result);
                    result = JSON.parse(result);
                    $("#admin-category-edit-status").html("");
                    $("#admin-category-edit-name").val(result.data.m_title);
                    $("#admin-category-edit-parent").val(result.data.m_id_parent);
                    $("#admin-category-edit-index").val(result.data.m_index);
                    $("#admin-category-edit-submit-btn").attr("data-id", result.data.id);

                },
                error: function () {
                    alert("Có lỗi xảy ra, vui lòng thử lại sau");
                }
            });
        };
        this.update = function (idCategory) {
            $("#admin-category-edit-status").removeClass('error').html("").show();
            var categoryTitle = $("#admin-category-edit-name").val();
            if (categoryTitle.length == 0) {
                $("#admin-category-edit-status").addClass('error').text("Vui lòng nhập vào tên danh mục sản phẩm");
                return;
            }
            var categoryIdParent = $("#admin-category-edit-parent").val();
            var categoryIndex = $("#admin-category-edit-index").val();
            $.ajax({
                url: "admin/ajaxcategory_update",
                type: "post",
                data: {
                    categoryTitle: categoryTitle,
                    idCategory: idCategory,
                    categoryIdParent: categoryIdParent,
                    categoryIndex: categoryIndex
                },
                beforeSend: function () {
                    $("#admin-category-edit-status").text("Đang xử lý, vui lòng chờ...");
                },
                success: function (result) {
                    console.log("++++ Admin category > update: ");
                    console.log(result);

                    result = JSON.parse(result);
                    $("#admin-category-edit-status").html(result.msg);
                    setTimeout(function () {
                        $("#admin-category-edit-status").hide();
                    }, 5000);
                    self.loadlist();
                },
                error: function () {
                    $("#admin-category-edit-status").addClass('error').text("Có lỗi xảy ra, vui lòng thử lại sau");
                }
            });
        };
        this.loadlist();
        this.hideNoti();
        /*
         * Event
         */
        $("#admin-category-add-btn").click(function () {
            self.add();
        });
        $("#admin-category-edit-submit-btn").click(function () {
            var idCategory = $(this).attr('data-id');
            self.update(idCategory);
        });
        $("#admin-category-edit-close-btn").click(function () {
            $("#admin-category-edit").hide();
        });
    };
    $(window).ready(function () {
        new admin_category();
    });
})($);
