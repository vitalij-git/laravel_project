@extends('layouts.app')

@section('content')
<style>
.sort-form select{
    margin: 7px;
}
.sort-form{
    margin-bottom: 10px;
    margin-top:10px;
}
.search-block{
    display: flex;
}
.search-block button{
    margin-left: 10px;
}
.action-button button{
    margin:5px;
}
</style>
<div class="container">

    <div class="search-form row">
        <div class="col-md-8">
            <button class="test-delete btn btn-danger" type="button">Test delete</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTypeModal">
                Create New Type Modal
            </button>

        </div>
        <div class="col-md-4">
            <div class="search-block">
                <input type="text" class="form-control" id="search-field" name="search-field"/>
                <button type="button" class="btn btn-primary" id="search-button" >Search</button>
            </div>
            <span class="search-feedback">
            </span>
        </div>
    </div>
    <div class="sort-form row">
        <select id="sortCol" name="sortCol">
            <option value='id' selected="true">ID</option>
            <option value='title'>Title</option>
            <option value='description'>Description</option>
        </select>

        <select id="sortOrder" name="sortOrder">
            <option value='ASC' selected="true">ASC</option>
            <option value='DESC'>DESC</option>
        </select>
    <button type="button" id="filterTypes" class="btn btn-primary">Filter Types</button>

    </div>

<div class="alerts">
</div>

<div class="search-alert">
</div>

<table class="types table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    @foreach ($types as $type)
        <tr class="rowType{{$type->id}}">
            <td class="colTypeId">{{$type->id}}</td>
            <td class="colTypetitle">{{$type->title}}</td>
            <td class="coltypeDescription">{{$type->description}}</td>
            <td>
                <button type="button" class="btn btn-success show-type" data-typeid='{{$type->id}}'>Show</button>
                <button type="button" class="btn btn-secondary update-type" data-typeid='{{$type->id}}'>Update</button>

            </td>
        </tr>
    @endforeach
</table>


</div>
<div class="modal fade" id="createTypeModal" tabindex="-1" role="dialog" aria-labelledby="createTypeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="typeAjaxForm">
                <div class="form-group row">
                    <label for="typetitle" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
                    <div class="col-md-6">
                        <input id="typeTitle" type="text" class="form-control" name="typeTitle">
                        <span class="invalid-feedback typeTitle" role="alert"></span>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="typeDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="typeDescription" name="typeDescription" class="summernote form-control">

                        </textarea>
                        <span class="invalid-feedback typeDescription" role="alert"></span>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary addTypeModal">Add</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="showTypeModal" tabindex="-1" role="dialog" aria-labelledby="showTypeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title show-typeTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="show-typeDescription"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="editTypeModal" tabindex="-1" role="dialog" aria-labelledby="editTypeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="typeAjaxForm">
                <input type='hidden' id='edit-typeid'>
                <div class="form-group row">
                    <label for="typeTitle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="col-md-6">
                        <input id="edit-typeTitle" type="text" class="form-control" name="typeTitle">
                        <span class="invalid-feedback typeTitle" role="alert"></span>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="typeDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="edit-typeDescription" name="typeDescription" class="summernote form-control">

                        </textarea>
                        <span class="invalid-feedback typeDescription" role="alert"></span>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updateTypeModal">Update</button>
        </div>
      </div>
    </div>
</div>

<script>
   $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
    function createTable(types){
        $(".types tbody").html("");
        $(".types tbody").append("<tr><th>ID</th><th>Title</th><th>Description</th><th>Type</th><th>Actions</th></tr>");
        $.each(types, function(key, type){
                var typeRow = "<tr class='rowType"+ type.id +"'>";
                typeRow += "<td class='colTypeId'>"+ type.id +"</td>";
                typeRow += "<td class='colTypeName'>"+ type.title +"</td>";
                typeRow += "<td class='colTypeDescription'>"+ type.description +"</td>";
                typeRow += "<td>";
                typeRow += "<div class='action-button'>";
                typeRow += "<button type='button' class='btn btn-success show-Type' data-Typeid='"+ type.id +"'>Show</button>";
                typeRow += "<button type='button' class='btn btn-secondary update-type' data-typeid='"+ type.id +"'>Update</button>";
                typeRow += "</div>";
                typeRow += "</td>";
                typeRow += "</tr>";
                $(".types tbody").append(typeRow);
        });
    }
    $(document).ready(function() {
        $(".addTypeModal").click(function() {
            var typeTitle = $("#typeTitle").val();
            var typeDescription = $("#typeDescription").val();
                $.ajax({
                        type: 'POST',
                        url: '{{route("type.storeAjax")}}',
                        data: {typeTitle:typeTitle, typeDescription:typeDescription},
                        success: function(data) {
                            if($.isEmptyObject(data.error)) {
                                console.log("veikas");
                                $(".invalid-feedback").css("display", 'none');
                                $("#createTypeModal").modal("hide");
                                var typeRow = "<tr class='rowtype"+ data.typeId +"'>";
                                    typeRow += "<td class='colTypeId'>"+ data.typeId +"</td>";
                                    typeRow += "<td class='colTypeTitle'>"+ data.typeTitle +"</td>";
                                    typeRow += "<td class='colTypeDescription'>"+ data.typeDescription +"</td>";
                                    typeRow += "<td>";
                                    typeRow += "<button type='button' class='btn btn-success show-type' data-typeid='"+ data.typeId +"'>Show</button>";
                                    typeRow += "<button type='button' class='btn btn-secondary update-type' data-typeid='"+ data.typeId +"'>Update</button>";
                                    typeRow += "</td>";
                                    typeRow += "</tr>";
                                $(".types").append(typeRow);
                                $(".alerts").append("<div class='alert alert-success'>"+ data.success +"</div");
                                $("#typeTitle").val('');
                                $("#typeDescription").val('');
                            } else {
                                $(".invalid-feedback").css("display", 'none');
                                $.each(data.error, function(key, error){
                                    var errorSpan = '.' + key;
                                    $(errorSpan).css('display', 'block');
                                    $(errorSpan).html('');

                                });
                            }
                        }
                })
         });
        $(document).on('click', '.update-type', function() {
        var typeid = $(this).attr('data-typeid');
        $("#editTypeModal").modal("show");
        $.ajax({
                type: 'GET',
                url: '/types/editAjax/' + typeid ,
                success: function(data) {
                $("#edit-typeid").val(data.typeId);
                  $("#edit-typeTitle").val(data.typeTitle);
                  $("#edit-typeDescription").val(data.typeDescription);
                }
            })
        });

        $(".updateTypeModal").click(function() {
            var typeid = $("#edit-typeid").val();
            var typeTitle = $("#edit-typeTitle").val();
            var typeDescription = $("#edit-typeDescription").val();
            $.ajax({
                    type: 'POST',
                    url: '/types/updateAjax/' + typeid ,
                    data: {typeTitle:typeTitle, typeDescription:typeDescription},
                    success: function(data) {
                        if($.isEmptyObject(data.error)) {
                            $(".invalid-feedback").css("display", 'none');
                            $("#editTypeModal").modal("hide");
                            $(".alerts").append("<div class='alert alert-success'>"+ data.success +"</div");
                            $(".rowType"+ typeid + " .colTypeTitle").html(data.typeTitle);
                            $(".rowType"+ typeid + " .colTypeDescription").html(data.typeDescription);
                        } else {
                            $(".invalid-feedback").css("display", 'none');
                            $.each(data.error, function(key, error){
                                var errorSpan = '.' + key;
                                $(errorSpan).css('display', 'block');
                                $(errorSpan).html('');
                                $(errorSpan).append('<strong>'+ error + "</strong>");
                            });
                        }
                    }
                })
        });
        $(document).on('click', '.show-type', function() {
        $('#showTypeModal').modal('show');
        var typeid = $(this).attr("data-typeid");

        $.ajax({
                    type: 'GET',
                    url: '/types/showAjax/' + typeid ,
                    success: function(data) {
                        $('.show-typeTitle').html('');
                        $('.show-typeDescription').html('');
                        $('.show-typeType').html('');
                        $('.show-typeTitle').append(data.typeId + '. ' + data.typeTitle );
                        $('.show-typeDescription').append(data.typeDescription);


                    }
            });
        });
        $(document).on('input', '#search-field', function() {
            var searchField = $("#search-field").val();
            var searchFieldCount = searchField.length;
            if(searchFieldCount != 0 && searchFieldCount < 3) {
                $(".search-feedback").css('display', 'block');
                $(".search-feedback").html("Min 3 symbols");
            } else {
                $(".search-feedback").css('display', 'none');
                $.ajax({
                    type: 'GET',
                    url: '/types/searchAjax/',
                    data: {searchField: searchField },
                    success: function(data) {
                        if($.isEmptyObject(data.error)) {
                            $(".search-alert").html("");
                            $(".search-alert").html(data.success);
                            createTable(data.types);
                        } else {
                            $(".types").css("display", "none");
                            $(".types tbody").html("");
                            $(".search-alert").html("");
                            $(".search-alert").append(data.error);
                            }
                    }
                });
             }
         })
        $(document).on('click', '#filterTypes', function() {
            var sortCol = $("#sortCol").val();
            var sortOrder = $("#sortOrder").val();
            $.ajax({
                    type: 'GET',
                    url: '/types/indexAjax/',
                    data: {sortCol: sortCol, sortOrder: sortOrder},
                    success: function(data) {
                        if($.isEmptyObject(data.error)) {
                            createTable(data.types);
                        } else {
                            console.log(data.error)
                        }
                    }
                });
        });
    });
</script>
@endsection
