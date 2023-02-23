@extends('layouts.user_type.auth')

@section('content')
    <div class="container-lg" dir="rtl">
        <div class="table-responsive" dir="rtl">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>فاتورة <b>مبيعات</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> أضافة</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>المنتج</th>
                            <th>الكمية</th>
                            <th>الافرادي</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" id="search" list="products" placeholder="أبحث عن منتج " />
                                <datalist id="products">
                                    @foreach ($products as $product)
                                        <option>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </datalist>

                            </td>
                            <td><input type="text" id="count" name="count"></td>
                            <td>200,000</td>
                            <td>
                                <a class="add" title="Add" data-toggle="tooltip"><i
                                        class="material-icons">&#xE03B;</i></a>
                                <a class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('dashboard')
    <script>
        $('#search').change(function(e) {






            $("#products").append(new Option(e.target.value, "id"));



        });



        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function() {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                    '<td><input type="text" class="form-control" name="department" id="department"></td>' +
                    '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
                    '<td>' + actions + '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function() {
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function() {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function() {
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function() {
                $(this).parents("tr").find("td:not(:last-child)").each(function() {
                    $(this).html('<input type="text" class="form-control" value="' + $(this)
                        .text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function() {
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });
    </script>
@endpush
